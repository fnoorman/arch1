<?php  
namespace console\controllers;

use yii\console\Controller;
use console\components\Parser\SimpleHtmlDom;

class ParserController extends Controller
{

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
		echo "\n";
		
		return 0;		
	}

	private function showAttributes($element)
	{
		foreach ($element->attr as $key => $value) {
			# code...
			echo $key."=".$value;
			echo "\n";
		}

	
		foreach ($element->children() as $e) {
			if(!($e->tag === 'comment'))
				var_dump($e->attr);

		}
	}

}

?>