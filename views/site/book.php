<!--<ul>
<?php /*foreach ($books as $book){*/?>
<li><b><?/*=$book->name*/?></b></li>

<?php /*} */?>
</ul>-->
<?php
use yii\bootstrap\Dropdown;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\models\Genre;


//$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="row">
	<div class="col-lg-5">

		<?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
	
		<?= $form->field($model, 'id_genre')->dropDownList(
			ArrayHelper::map(
				Genre::find()->select(['name', 'id'])->orderBy('name')->all(),
				'id',
				'name'),
			['class' => 'form-control inline-block'])->label('Жанр');
			?>

		<?=$form->field($model, 'date')->dropDownList( $model->getYearsList())->label('Год выпуска');?>

		<?= $form->field($model, 'author') ->label('Автор')?>


		<?= $form->field($model, 'name')->textarea(['rows' => 6])->label('Название') ?>

		<div class="form-group">
			<?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
		</div>

		<?php ActiveForm::end(); ?>

	</div>
</div>