<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
class Message extends ActiveRecord

{
	/*public $title;
	public $content;

	public function rules()
	{
		return [
			[['title','content'],'mess'],
		];
	}*/
	public static function tableName()
	{
		return 'mess';
	}

}
?>