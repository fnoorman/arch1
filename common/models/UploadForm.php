<?php  
namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
	public $file;

	public function rules()
	{
		return [
			[['file'],'file','skipOnEmpty'=> false,'extensions' => 'gif, jpg','png']
		];
	}
}

?>