
<?php
    $showDeleteButton = (Yii::app()->request->getParam("id"))?true:false;
    $showManageButton = true;
    $showCreateButton = true;
    $showUpdateButton = true;
    $showCancelButton = true;
    $showSaveButton = true;
    $showViewButton = true;

    switch($this->action->id){
        case "admin":
            $showCancelButton = false;
            $showCreateButton = true;
            $showSaveButton = false;
            $showViewButton = false;
            $showUpdateButton = false;
            break;
        case "create":
            $showCreateButton = false;
            $showViewButton = false;
            $showUpdateButton = false;
            break;
        case "view":
            $showViewButton = false;
            $showSaveButton = false;
            $showCreateButton = false;
            break;
        case "update":
            $showCreateButton = false;
            $showUpdateButton = false;
            break;
    }
?>
<div class="clearfix">
    <div class="btn-toolbar pull-right">
        <!-- relations -->
                    <div class="btn-group">
                <?php $this->widget('bootstrap.widgets.TbButtonGroup', array(
                       'size'=>'large',
                       'buttons' => array(
                               array(
                                #'label'=>Yii::t('crud','Relations'),
                                'icon'=>'icon-random',
                                'items'=>array(array(
                    'icon' => 'circle-arrow-left','label' => Yii::t('p3MediaModule.model','P3Media'), 'url' =>array('/p3media/p3Media/admin')),
            )
          ),
        ),
    ));
?>            </div>

        
        <div class="btn-group">
            <?php
             $this->widget("bootstrap.widgets.TbButton", array(
                           "label"=>Yii::t("crud","Manage"),
                           "icon"=>"icon-list-alt",
                           "size"=>"large",
                           "url"=>array("admin"),
                           "visible"=>$showManageButton && Yii::app()->user->checkAccess("P3media.P3MediaTranslation.View")
                        ));
         ?>        </div>
    </div>

    <div class="btn-toolbar pull-left">
        <div class="btn-group">
            <?php
                   $this->widget("bootstrap.widgets.TbButton", array(
                       #"label"=>Yii::t("crud","Cancel"),
                       "icon"=>"chevron-left",
                       "size"=>"large",
                       "url"=>(isset($_GET["returnUrl"]))?$_GET["returnUrl"]:array("{$this->id}/admin"),
                       "visible"=>$showCancelButton && Yii::app()->user->checkAccess("P3media.P3MediaTranslation.View")
                    ));
                   $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("crud","Create"),
                        "icon"=>"icon-plus",
                        "size"=>"large",
                        "type"=>"success",
                        "url"=>array("create"),
                        "visible"=>$showCreateButton && Yii::app()->user->checkAccess("P3media.P3MediaTranslation.Create")
                   ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        "label"=>Yii::t("crud","Delete"),
                        "type"=>"danger",
                        "icon"=>"icon-remove icon-white",
                        "size"=>"large",
                        "htmlOptions"=> array(
                            "submit"=>array("delete","id"=>$model->{$model->tableSchema->primaryKey}, "returnUrl"=>(Yii::app()->request->getParam("returnUrl"))?Yii::app()->request->getParam("returnUrl"):$this->createUrl("admin")),
                            "confirm"=>Yii::t("crud","Do you want to delete this item?")
                        ),
                        "visible"=> $showDeleteButton && Yii::app()->user->checkAccess("P3media.P3MediaTranslation.Delete")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        #"label"=>Yii::t("crud","Update"),
                        "icon"=>"icon-edit",
                        "size"=>"large",
                        "url"=>array("update","id"=>$model->{$model->tableSchema->primaryKey}),
                        "visible"=> $showUpdateButton && Yii::app()->user->checkAccess("P3media.P3MediaTranslation.Update")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                        #"label"=>Yii::t("crud","View"),
                        "icon"=>"icon-eye-open",
                        "size"=>"large",
                        "url"=>array("view","id"=>$model->{$model->tableSchema->primaryKey}),
                        "visible"=>$showViewButton && Yii::app()->user->checkAccess("P3media.P3MediaTranslation.View")
                    ));
                    $this->widget("bootstrap.widgets.TbButton", array(
                       "label"=>Yii::t("crud","Save"),
                       "icon"=>"save",
                       "size"=>"large",
                       "type"=>"primary",
                       "htmlOptions"=> array(
                            "onclick"=>"$('.crud-form form').submit();",
                       ),
                       "visible"=>$showSaveButton && Yii::app()->user->checkAccess("P3media.P3MediaTranslation.View")
                    ));
             ?>        </div>
        <?php if($this->action->id == 'admin'): ?>        <div class="btn-group">
            
            <?php
                $this->widget(
                       "bootstrap.widgets.TbButton",
                       array(
                           #"label"=>Yii::t("crud","Search"),
                                   "icon"=>"icon-search",
                                   "size"=>"large",
                                   "htmlOptions"=>array("class"=>"search-button")
                           )
                       );
                    ?>
                            </div>
        <?php endif; ?>
    </div>


</div>


<?php if($this->action->id == 'admin'): ?><div class="search-form" style="display:none">
    <?php $this->renderPartial('_search',array('model' => $model,)); ?>
</div>
<?php endif; ?>