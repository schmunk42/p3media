<div class="btn-toolbar">
    <div class="btn-group">
        <?php  ?><?php
            switch($this->action->id) {
                case "admin":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Create",
                        "icon"=>"icon-plus",
                        "url"=>array("create")
                    ));
                    break;
                case "view":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Manage",
                        "icon"=>"icon-list-alt",
                        "url"=>array("admin")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Update",
                        "icon"=>"icon-edit",
                        "url"=>array("update","id"=>$files->id)
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Delete",
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","id"=>$files->id),
                            "confirm"=>"Do you want to delete this item?")
                         )
                    );
                    break;
                case "update":
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Manage",
                        "icon"=>"icon-list-alt",
                        "url"=>array("admin")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"View",
                        "icon"=>"icon-eye-open",
                        "url"=>array("view","id"=>$files->id)
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Delete",
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","id"=>$files->id),
                            "confirm"=>"Do you want to delete this item?")
                         )
                    );
                    break;
            }
        ?>    </div>
    <?php if($this->action->id == 'admin'): ?>    <div class="btn-group">
        <?php
    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>"Search",
                        "icon"=>"icon-search",
                        "htmlOptions"=>array("class"=>"search-button")
                    ));?>    </div>

    <div class="btn-group">
        <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
        'buttons'=>array(
                array('label'=>'Relations', 'icon'=>'icon-search', 'items'=>array(array('label'=>'P3Media', 'url' =>array('p3Media/admin')),array('label'=>'P3MediaMeta', 'url' =>array('p3MediaMeta/admin')),array('label'=>'P3MediaMeta', 'url' =>array('p3MediaMeta/admin')),
            )
          ),
        ),
    ));
?>
        <ul class="dropdown-menu">
            <li><?php echo CHtml::link(
        Yii::t("app", "P3Media"),
        array("p3Media/admin")) ?> </li>
<li><?php echo CHtml::link(
        Yii::t("app", "P3MediaMeta"),
        array("p3MediaMeta/admin")) ?> </li>
<li><?php echo CHtml::link(
        Yii::t("app", "P3MediaMeta"),
        array("p3MediaMeta/admin")) ?> </li>
        </ul>
    </div>

    <?php endif; ?></div>

<div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array(
	'model'=>$files,
)); ?>
</div>