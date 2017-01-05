<?php

namespace app\commands;

use app\commands\helpers\ArrayLoader;
use yii\console\Controller;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;
use yii\helpers\FileHelper;

/**
 * Init command. It will copy .env.example to .env and create needed directories.
 * Feel free to adjust it for your needs.
 */
class InitController extends Controller
{
    /**
     * Environment dependent settings. You can adjust them to your needs.
     * @var array
     */
    private $_environments = [
        'dev' => [
            'YII_DEBUG' => 'true',
            'YII_ENV' => 'dev',
        ],
        'prod' => [
            'YII_DEBUG' => 'false',
            'YII_ENV' => 'prod',
        ],
    ];

    /**
     * Directories that need to be created.
     * @var array
     */
    private $_directories = [
        '@app/runtime',
        '@app/web/assets',
    ];

    /**
     * Changes environment.
     * @param string $env
     */
    public function actionEnv($env)
    {
        if (!array_key_exists($env, $this->_environments)) {
            Console::error("Invalid environment");
        }

        $env = ArrayHelper::merge($this->getCurrentEnv(), $this->_environments[$env]);
        $this->writeEnv($env);

        Console::output("Environment has been changed");
    }

    /**
     * This action will be performed after executing `composer install` command.
     */
    public function actionIndex()
    {
        $this->createDirectories();

        if ($this->isInitialized()) {
            Console::output("Updating " . $this->getEnvPath());
            $this->writeEnv(ArrayHelper::merge(
                $this->getExampleEnv(),
                $this->getCurrentEnv()
            ));
        } else {
            Console::output("Initializing " . $this->getEnvPath());
            $this->writeEnv(ArrayHelper::merge(
                $this->getExampleEnv(),
                ['COOKIE_VALIDATION_KEY' => \Yii::$app->security->generateRandomString()]
            ));
            Console::output("Make sure to change environment to production if needed");
        }
    }

    /**
     * Creates needed directories.
     */
    private function createDirectories()
    {
        foreach ($this->_directories as $directory) {
            if (!is_dir(\Yii::getAlias($directory))) {
                Console::output("Created directory $directory");
                FileHelper::createDirectory(\Yii::getAlias($directory), 0777);
            }
        }
    }

    /**
     * @return bool
     */
    private function isInitialized()
    {
        return file_exists($this->getEnvPath());
    }

    /**
     * Writes env to file.
     *
     * @param array $env
     */
    private function writeEnv($env = [])
    {
        $file = fopen($this->getEnvPath(), 'w');

        foreach ($env as $key => $value) {
            fwrite($file, "$key=\"$value\"\n");
        }

        fclose($file);
    }

    /**
     * Returns current .env configuration.
     * @return array
     */
    private function getCurrentEnv()
    {
        return (new ArrayLoader($this->getEnvPath()))->asArray();
    }

    /**
     * Returns example .env data.
     * @return array
     */
    private function getExampleEnv()
    {
        return (new ArrayLoader($this->getConfigPath() . '/.env.example'))->asArray();
    }

    /**
     * @return string
     */
    private function getEnvPath()
    {
        return $this->getConfigPath() . '/.env';
    }

    /**
     * @return string
     */
    private function getConfigPath()
    {
        return dirname(__DIR__) . '/config';
    }
}