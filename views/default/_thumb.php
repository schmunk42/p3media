<li class="span3">
    <h5><?php echo $data->title ?></h5>
    <a class="thumbnail" rel="tooltip" data-title="<?php echo "#".$data->id ?>" href="<?php echo $this->createUrl('p3Media/update', array('id'=>$data->id)) ?>">
        <?php echo CHtml::image(
			Yii::app()->controller->createUrl(
				"/p3media/file/image",
				array("id"=>$data->id,"preset"=>"p3media-ckbrowse")), $data->title,
				array("class"=>"280x180"))
			?>
    </a>
</li>