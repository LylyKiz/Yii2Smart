<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Genre;
use app\models\Book;

$this->title = 'Просмотр книги: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;


/*$this->params['breadcrumbs'][] = ['label' => 'Список книг', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Просмотр';*/
?>
<div class="car-view">
	<h1><?= Html::encode($this->title) ?></h1>
	<p>
		<?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
		<?= Html::a('Удалить', ['delete', 'id' => $model->id], [
			'class' => 'btn btn-danger',
			'data' => [
				'confirm' => 'Вы уверены, что хотите удалить эту машину?',
				'method' => 'post',
			],
		]) ?>
	</p>
	<?= DetailView::widget([
		'model' => $model,
		'attributes' => [
			[
				'label' => 'Название',
				'attribute' => 'name',
			]
			,
			[
				'label' => 'Автор',
				'attribute' => 'author',
			],
	[
	         'label' => 'Жанр',
				'attribute' => 'genre.name',
			],
	[
	         'label' => 'Год выпуска',
				'attribute' => 'date',
			]


		],
	]) ?>
</div>