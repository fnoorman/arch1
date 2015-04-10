<?php
namespace common\components\Utility;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class BekaUtility extends Component{

  public $detect;

  public static function createSequence($filename){
    if($this->detect === 'space'){
      if(preg_match('/[\s,]+/',$filename))
      {
        // Remove the extension
        $fileWithNoExtension = explode(".",$filename)[0];
        //get the sequence
        $tempfile = preg_split('/[\s,]+/',$fileWithNoExtension);
        return intval(end($tempfile));
      }
    }

    if($this->detect === 'dash'){
      if(preg_match('/[\-,]+/',$filename))
      {
        // Remove the extension
        $fileWithNoExtension = explode(".",$filename)[0];
        //get the sequence
        $tempfile = preg_split('/[\-,]+/',$fileWithNoExtension);
        return intval(end($tempfile));
      }
    }

    return null;
  }

}

 ?>
