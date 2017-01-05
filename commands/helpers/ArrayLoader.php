<?php

namespace app\commands\helpers;

use Dotenv\Loader;

/**
 * ArrayLoader is used to read .env configuration as array.
 */
class ArrayLoader extends Loader
{
    /**
     * Returns data as array.
     * @return array
     */
    public function asArray()
    {
        $this->ensureFileIsReadable();
        $config = [];

        foreach ($this->readLinesFromFile($this->filePath) as $line) {
            if (!$this->isComment($line) && $this->looksLikeSetter($line)) {
                list($name, $value) = $this->normaliseEnvironmentVariable($line, null);
                $config[$name] = $value;
            }
        }

        return $config;
    }
}