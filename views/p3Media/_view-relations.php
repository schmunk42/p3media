<h2>
    <?php echo Yii::t('crud', 'Relations') ?></h2>


<?php 
        echo '<h3>';
            echo Yii::t('p3MediaModule.model','P3MediaTranslations').' ';
            $this->widget(
                'bootstrap.widgets.TbButtonGroup',
                array(
                    'type' => '', // '', 'primary', 'info', 'success', 'warning', 'danger' or 'inverse'
                    'size' => 'mini',
                    'buttons' => array(
                        array(
                            'icon' => 'icon-list-alt',
                            'url' =>  array('//p3media/p3MediaTranslation/admin')
                        ),
                        array(
                'icon' => 'icon-plus',
                'url' => array(
                    '//p3media/p3MediaTranslation/create',
                    'P3MediaTranslation' => array('p3_media_id' => $model->{$model->tableSchema->primaryKey})
                )
            ),
            
                    )
                )
            );
        echo '</h3>' ?>
<ul>

    <?php
    $records = $model->p3MediaTranslations(array('limit' => 250, 'scopes' => ''));
    if (is_array($records)) {
        foreach ($records as $i => $relatedModel) {
            echo '<li>';
            echo CHtml::link(
                '<i class="icon icon-arrow-right"></i> ' . $relatedModel->itemLabel,
                array('/p3media/p3MediaTranslation/view', 'id' => $relatedModel->id)
            );
            echo CHtml::link(
                ' <i class="icon icon-pencil"></i>',
                array('/p3media/p3MediaTranslation/update', 'id' => $relatedModel->id)
            );
            echo '</li>';
        }
    }
    ?>
</ul>

