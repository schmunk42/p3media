<li class="span3">
    <a class="thumbnail" rel="tooltip" data-title="Tooltip">
        <?php echo CHtml::image(
			Yii::app()->controller->createUrl(
				"/p3media/file/image",
				array("id"=>$data->id,"preset"=>"p3media-ckbrowse")), $data->title,
				array("class"=>"280x180","onclick"=>"select(".$data->id.",'".$data->title."');"))
			?>
		<h5><?php echo $data->title ?></h5>
    </a>
</li>