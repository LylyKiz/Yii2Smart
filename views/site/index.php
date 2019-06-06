<?php
use app\models\Genre;
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Список книг';
$this->params['breadcrumbs'][] = $this->title;
?>
	<h1><?= Html::encode($this->title) ?></h1>
<table class="table">
	<thead>
	<tr>
		<th>#</th>
		<th>Название</th>
		<th>Автор</th>
		<th>Жанр</th>
		<th>Год выпуска</th>
		<th>Действия</th>
	</tr>
	</thead>
	<tbody>
<?php
$i=1;
foreach ($books as $book){?>
	<tr>
		<th scope="row"><?=$i?></th>
		<td><?=$book->name?></td>
		<td><?=$book->author?></td>
		<td><?php
			$social = Genre::findOne(['id' => $book->id_genre]);
			echo $social->name;
			?>
		</td>
		<td><?=$book->date?></td>
		<td>
			<?= Html::a('<i class="glyphicon glyphicon-trash" aria-hidden="true" title="Удалить"></i>',['/delete','id'=>$book->id]) ?>
			<?= Html::a('<i class="glyphicon glyphicon-pencil" aria-hidden="true" title="Редактировать"></i>',['/update','id'=>$book->id]) ?>
			<?= Html::a('<i class="glyphicon glyphicon-zoom-in" aria-hidden="true" title="Просмотр"></i>',['/view','id'=>$book->id]) ?>
		</td>
	</tr>
<?php
	$i++;
} ?>
</tbody>
</table>
<?= Html::a('Создать новую', ['create'], ['class' => 'btn btn-success']) ?>