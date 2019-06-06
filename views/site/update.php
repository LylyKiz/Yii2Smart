<?php
use yii\helpers\Html;

$this->title = 'Изменение книги: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список книг', 'url' => ['index']];
/*$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';*/
?>
<div class="car-update">
	<h1><?= Html::encode($this->title) ?></h1>
	<?= $this->render('book', [
		'model' => $model,
	]) ?>
</div>