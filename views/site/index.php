<?php

/**
 * @var $this yii\web\View
 */

use app\helpers\GuideMarkdownHelper;
use dektrium\user\Module;

$this->title = 'Yii2-user';

?>

<div class="alert alert-info">
    This site is fully functional demo of Yii2-user (except admin functions). Try to register and log in.
</div>

<main class="jumbotron" role="main">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Yii2-user</h1>
                <p class="lead">
                    Most of web applications provide a way for users to register, log in or reset their forgotten passwords. Rather than re-implementing this on each application, you can use Yii2-user which is a flexible user management module for Yii2 that handles common tasks such as registration, authentication and password retrieval.
                </p>
                <p>
                    <iframe src="https://ghbtns.com/github-btn.html?user=dektrium&repo=yii2-user&type=watch&count=true&size=large&v=2" frameborder="0" scrolling="0" width="160px" height="30px"></iframe>
                    <iframe src="https://ghbtns.com/github-btn.html?user=dektrium&repo=yii2-user&type=star&count=true&size=large" frameborder="0" scrolling="0" width="160px" height="30px"></iframe>
                    <iframe src="https://ghbtns.com/github-btn.html?user=dektrium&repo=yii2-user&type=fork&count=true&size=large" frameborder="0" scrolling="0" width="160px" height="30px"></iframe>
                </p>
            </div>
        </div>
    </div>
</main>

<div class="alert alert-success">
    Latest stable version is <strong><?= Module::VERSION ?></strong>
</div>

<div class="container">
    <?= (new GuideMarkdownHelper())->parse(file_get_contents(Yii::getAlias('@dektrium/user/docs/getting-started.md'))) ?>
</div>