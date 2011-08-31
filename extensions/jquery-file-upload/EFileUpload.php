<?php

class EFileUpload extends CWidget {
	
	public function init(){
		$this->registerClientScripts();
	}
	
	public function run(){
		$this->render('fileUpload');
	}

	private function registerClientScripts(){
		$assetsPath = dirname(__FILE__).DIRECTORY_SEPARATOR.'vendor-v5';

		$cs = Yii::app()->clientScript;
		$am = Yii::app()->assetManager;

		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');

		$cs->registerScriptFile('//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js', CClientScript::POS_END);
		$cs->registerCssFile('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.13/themes/base/jquery-ui.css');



		$cs->registerScriptFile($am->publish($assetsPath.DIRECTORY_SEPARATOR.'jquery.fileupload.js'), CClientScript::POS_END);
		$cs->registerScriptFile($am->publish($assetsPath.DIRECTORY_SEPARATOR.'jquery.fileupload-ui.js'), CClientScript::POS_END);
		$cs->registerScriptFile($am->publish($assetsPath.DIRECTORY_SEPARATOR.'jquery.iframe-transport.js'), CClientScript::POS_END);

        #$cs->registerScriptFile($am->publish($assetsPath.DIRECTORY_SEPARATOR.'jquery.fileupload-uix.js'), CClientScript::POS_END);
		$cs->registerCssFile($am->publish($assetsPath.DIRECTORY_SEPARATOR.'jquery.fileupload-ui.css'));
		$cs->registerCssFile($am->publish($assetsPath.DIRECTORY_SEPARATOR.'example/style.css'));
		
		$cs->registerScriptFile($am->publish($assetsPath.DIRECTORY_SEPARATOR.'init.js'), CClientScript::POS_END);
		
		#$cs->registerScriptFile($am->publish($assetsPath.DIRECTORY_SEPARATOR.'init.js'), CClientScript::POS_END);
	}
}
/*
 * <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.15/jquery-ui.min.js"></script>
<script src="//ajax.aspnetcdn.com/ajax/jquery.templates/beta1/jquery.tmpl.min.js"></script>
<script src="../jquery.iframe-transport.js"></script>
<script src="../jquery.fileupload.js"></script>
<script src="../jquery.fileupload-ui.js"></script>
<script src="application.js"></script>

 */
?>
