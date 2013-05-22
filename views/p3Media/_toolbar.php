<div class="btn-toolbar">
    <div class="btn-group">
        <?php  ?><?php
        switch ($this->action->id) {
            case "create":
                $this->widget("bootstrap.widgets.TbButton", array(
                                                                 "label" => Yii::t('P3MediaModule.crud', 'Manage'),
                                                                 "icon"  => "icon-list-alt",
                                                                 "url"   => array("admin")
                                                            ));
                break;
            case "admin":
                $this->widget("bootstrap.widgets.TbButton", array(
                                                                 "label" => Yii::t('P3MediaModule.crud', 'Create'),
                                                                 "icon"  => "icon-plus",
                                                                 "url"   => array("create")
                                                            ));
                break;
            case "view":
                $this->widget("bootstrap.widgets.TbButton", array(
                                                                 "label" => Yii::t('P3MediaModule.crud', 'Manage'),
                                                                 "icon"  => "icon-list-alt",
                                                                 "url"   => array("admin")
                                                            ));
                $this->widget("bootstrap.widgets.TbButton", array(
                                                                 "label" => Yii::t('P3MediaModule.crud', 'Update'),
                                                                 "icon"  => "icon-edit",
                                                                 "url"   => array("update", "id" => $model->id)
                                                            ));
                $this->widget("bootstrap.widgets.TbButton", array(
                                                                 "label" => Yii::t('P3MediaModule.crud', 'Create'),
                                                                 "icon"  => "icon-plus",
                                                                 "url"   => array("create")
                                                            ));
                $this->widget("bootstrap.widgets.TbButton", array(
                                                                 "label"       => Yii::t('P3MediaModule.crud', 'Delete'),
                                                                 "type"        => "danger",
                                                                 "icon"        => "icon-remove icon-white",
                                                                 "htmlOptions" => array(
                                                                     "submit"  => array("delete", "id" => $model->id,
                                                                                        "returnUrl"    => (isset($_GET['returnUrl']))?$_GET['returnUrl']:null),
                                                                     "confirm" => Yii::t('P3MediaModule.crud', 'Do you want to delete this item?'))
                                                            )
                );
                break;
            case "update":
                $this->widget("bootstrap.widgets.TbButton", array(
                                                                 "label" => Yii::t('P3MediaModule.crud', 'Manage'),
                                                                 "icon"  => "icon-list-alt",
                                                                 "url"   => array("admin")
                                                            ));
                $this->widget("bootstrap.widgets.TbButton", array(
                                                                 "label" => Yii::t('P3MediaModule.crud', 'View'),
                                                                 "icon"  => "icon-eye-open",
                                                                 "url"   => array("view", "id" => $model->id)
                                                            ));
                $this->widget("bootstrap.widgets.TbButton", array(
                                                                 "label"       => Yii::t('P3MediaModule.crud', 'Delete'),
                                                                 "type"        => "danger",
                                                                 "icon"        => "icon-remove icon-white",
                                                                 "htmlOptions" => array(
                                                                     "submit"  => array("delete", "id" => $model->id,
                                                                                        "returnUrl"    => (isset($_GET['returnUrl']))?$_GET['returnUrl']:null),
                                                                     "confirm" => Yii::t('P3MediaModule.crud', 'Do you want to delete this item?'))
                                                            )
                );
                break;
        }
        ?>    </div>
    <?php if ($this->action->id == 'admin'): ?>
        <div class="btn-group">
            <?php
            $this->widget("bootstrap.widgets.TbButton", array(
                                                             "label"       => Yii::t('P3MediaModule.crud', 'Search'),
                                                             "icon"        => "icon-search",
                                                             "htmlOptions" => array("class" => "search-button")
                                                        ));?>    </div>

        <div class="btn-group">
            <?php $this->widget('bootstrap.widgets.TbButtonGroup',
                                array(
                                     'buttons' => array(
                                         array('label' => Yii::t('P3MediaModule.crud', 'Relations'),
                                               'icon'  => 'icon-search',
                                               'items' => array(array('label' => 'metaData [P3MediaMeta]',
                                                                      'url'   => array('p3MediaMeta/admin')),
                                               )
                                         ),
                                     ),
                                ));
            ?>        </div>


    <?php endif; ?></div>

<?php if ($this->action->id == 'admin'): ?>
    <div class="search-form" style="display:none">
        <?php $this->renderPartial('_search', array(
                                                   'model' => $model,
                                              )); ?>
    </div>
<?php endif; ?>