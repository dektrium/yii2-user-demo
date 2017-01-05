<?php

/**
 * @var $this yii\web\View
 * @var $name string
 * @var $message string
 * @var $exception Exception
 */

use yii\helpers\Html;

$this->title = $name;

?>

<h1><?= Html::encode($this->title) ?></h1>

<?php if ($message): ?>
    <div class="alert alert-danger">
        <?= nl2br(Html::encode($message)) ?>
    </div>
<?php endif ?>

<p>
    The error occurred while the Web server was processing your request.
</p>
<p>
    Please contact us if you think this is a server error. Thank you.
</p>