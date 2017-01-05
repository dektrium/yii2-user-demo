<?php

namespace app\controllers;

use app\helpers\GuideMarkdownHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\ViewAction;

/**
 * Default site controller.
 */
class SiteController extends Controller
{
    /**
     * @return array
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'page' => [
                'class' => ViewAction::class,
            ],
        ];
    }

    /**
     * Homepage
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Renders docs.
     *
     * @param  string $title
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionDocs($title = 'README')
    {
        if (!is_string($title) || !preg_match('~^\w(?:(?!\/\.{0,2}\/)[\w\/\-\.])*$~', $title)) {
            throw new NotFoundHttpException('Page is not found');
        }

        $file = \Yii::getAlias('@dektrium/user/docs/' . $title . '.md');

        if (!file_exists($file)) {
            throw new NotFoundHttpException('Page is not found');
        }

        $markdown = (new GuideMarkdownHelper())->parse(file_get_contents($file));
        preg_match('/<h1.*?>(.*)<\/h1>/', $markdown, $matches);
        $title = $matches[1];

        return $this->render('docs', [
            'markdown' => $markdown,
            'title' => $title,
        ]);
    }
}
