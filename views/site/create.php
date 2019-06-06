<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\Car */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->params['breadcrumbs'][] = ['label' => 'Список книг',];
$this->title = 'Добавить новую книги';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
	<h1><?= Html::encode($this->title) ?></h1>
	<?= $this->render('book', [
		'model' => $model,
	]) ?>
</div>