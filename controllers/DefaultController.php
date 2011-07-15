<?php

class DefaultController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionMultiple()
	{
		$this->render('multiple');
	}

	public function actionUpload()
	{
		echo '[{"name":"picture1.jpg","size":902604,"url":"\/\/example.org\/files\/picture1.jpg","thumbnail_url":"\/\/example.org\/thumbnails\/picture1.jpg","delete_url":"\/\/example.org\/upload-handler?file=picture1.jpg","delete_type":"DELETE"},{"name":"picture2.jpg","size":841946,"url":"\/\/example.org\/files\/picture2.jpg","thumbnail_url":"\/\/example.org\/thumbnails\/picture2.jpg","delete_url":"\/\/example.org\/upload-handler?file=picture2.jpg","delete_type":"DELETE"}]';
	}

}