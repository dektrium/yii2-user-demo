<?php
/**
 * @var yii\web\View $this
 * @var string $markdown
 * @var string $title
 */
$this->title = $title;
$this->params['breadcrumbs'][] = ['label' => 'Docs', 'url' => ['site/docs']];
$this->params['breadcrumbs'][] = yii\helpers\Html::encode($this->title);
?>

<?= purify($markdown) ?>