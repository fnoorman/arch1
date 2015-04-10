<?php  
namespace console\controllers;
use Yii;
use yii\console\Controller;
use console\components\Parser\SimpleHtmlDom;
use console\models\ElementAttribute;

class ParserController extends Controller
{

	public $attrCollections = [];

	
	public function actionParse()
	{
		$html = SimpleHtmlDom::file_get_html('http://m.bekazon.com');
		//$ret = $html->find('ul.tp-revslider-mainul');
		$ret = $html->find('div.tp-banner');
		// $li = $ret[0]->first_child()->children(1);
		// foreach ($li->attr as $key => $value) {
		// 	# code...
		// 	echo $key."=".$value;
		// 	echo "\n";
		// }
		$levels = $ret[0]->first_child()->children();
		foreach ($levels as $level) {
			if ($level->tag === 'li') {
				$this->showAttributes($level);
			}
			
		}
		foreach ($this->attrCollections as $key => $value) {
			$this->saveAttribute($value,'unify');
		}
		echo "\n";
		
		return 0;		
	}

	private function saveAttribute($name,$theme)
	{

		
		Yii::$app->db->createCommand('SET TRANSACTION ISOLATION LEVEL SERIALIZABLE');

		$trn = Yii::$app->db->beginTransaction();

		try {
		    // Try to load model with available id i.e. unique key
		    // Since we're in serializable isolation level, even if
		    // the record does not exist the RDBMS will lock this key
		    // so nobody can insert it until you commit.
		    // The same shold for the (most usual) case of findByAttributes()
		    $model = ElementAttribute::find()->where(['name'=>$name])->one();

		    //now check if the model is null
		    if (!$model) {
		        $model = new ElementAttribute();
		    }

		    //Apply you new changes
		    $model->name = $name;
		    $model->theme = $theme;

		    //save
		    $model->save();
		    //clear
		    unset($model);

		    // Commit changes
		    $trn->commit();

		} catch (Exception $e) {
		    // Rollback transaction
		    $trn->rollback();

		    echo $e->getMessage();
		}

		//clear
		unset($trn);
	}




	private function showAttributes($element)
	{
		foreach ($element->attr as $key => $value) {
			# code...
			if(!(in_array($key,$this->attrCollections)))
			{
				
				$this->attrCollections[] = $key; 
				// echo $key."=".$value;
				// echo "\n";
			}
			
		}

	
		// foreach ($element->children() as $e) {
		// 	if(!($e->tag === 'comment'))
		// 		var_dump($e->attr);

		// }
	}

}

?>