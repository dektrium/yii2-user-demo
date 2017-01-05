<?php

/**
 * @var $this yii\web\View
 * @var $content string
 */

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <?php NavBar::begin(['brandLabel' => Yii::$app->name]) ?>
        <?= Nav::widget([
            'items' => [
                ['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'About', 'url' => ['/site/page', 'view' => 'about']],
                ['label' => 'Community', 'url' => ['/site/page', 'view' => 'community']],
                ['label' => 'Documentation', 'url' => ['/site/docs']],
                ['label' => 'Github', 'url' => 'https://github.com/dektrium/yii2-user'],
            ],
            'options' => ['class' => 'navbar-nav'],
        ]) ?>
        <?= Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'My profile', 'url' => ['/user/profile'], 'visible' => !isGuest()],
                ['label' => 'Settings', 'url' => ['/user/settings/profile'], 'visible' => !isGuest()],
                isGuest() ?
                    ['label' => 'Sign in', 'url' => ['/user/security/login']] :
                    ['label' => 'Sign out (' . h(Yii::$app->user->identity->username) . ')',
                        'url' => ['/user/security/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                ['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => isGuest()]
            ],
        ]) ?>
        <?php NavBar::end() ?>
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= $content ?>
        </div>
        <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>