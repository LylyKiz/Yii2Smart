<?php

namespace app\models;

use yii\db\ActiveRecord;


class Book extends ActiveRecord {

	public function getGenre()
	{
		return $this->hasOne(Genre::className(), ['id' => 'id_genre']);
	}

	public function getYearsList() {
		$currentYear = date('Y');
		$yearFrom = 2013;
		$yearsRange = range($yearFrom, $currentYear);
		return array_combine($yearsRange, $yearsRange);
	}
}