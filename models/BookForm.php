<?php

namespace app\models;


//use yii\base\Model;
use yii\db\ActiveRecord;

class BookForm extends ActiveRecord {

	public static function tableName() {
		return 'book';
	}

	public function attributeLabels() {
		return [
			'id_genre'=> 'Жанр',
		    'author'=>'Автор',
		    'date'=>'Год',
			'name'=>'Название'
		];
	}

	public function rules()
	{
		return [
			[['id_genre', 'author', 'date', 'name'], 'required','message' => 'Заполните поле'],
		    [['author','name'],'trim'],
		];
	}
	public function getYearsList() {
		$currentYear = date('Y');
		$yearFrom = 2013;
		$yearsRange = range($yearFrom, $currentYear);
		return array_combine($yearsRange, $yearsRange);
	}
}