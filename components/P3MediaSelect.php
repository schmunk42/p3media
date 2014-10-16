<?php

/**
 * Created by JetBrains PhpStorm.
 * User: tobias
 * Date: 25.02.13
 * Time: 17:11
 * To change this template use File | Settings | File Templates.
 *
 * @property $preset
 */
class P3MediaSelect extends CWidget
{
    public $model;
    public $attribute;
    /**
     * set the tree_parent_id
     * @var integer
     */
    public $tree_parent_id = null;
    /**
     * looking for the Model name
     * @var null
     */
    public $tree_parent_name_id = null;
    /**
     * @var string preset for image preview in admin view
     */
    public $preset = null;

    function run()
    {
        $selectedModel = $this->getMediaModel();
        $selectedTitle = $selectedModel ? $selectedModel->title : '';

        if ($selectedModel && $this->preset !== null) {
            echo $selectedModel->image($this->preset);
        }

        $url = Yii::app()->controller->createUrl('/p3media/p3Media/ajaxSearch');

        // Get only images form a specific folder
        if (!is_null($this->tree_parent_id)) {
            $url = Yii::app()->controller->createUrl(
                '/p3media/p3Media/ajaxSearch',
                array('tree_parent_id' => $this->tree_parent_id)
            );
        } elseif (!is_null($this->tree_parent_name_id)) {
            $model = P3Media::model()->findByAttributes(array('name_id' => $this->tree_parent_name_id));

            if (!is_null($model)) {
                $url = Yii::app()->controller->createUrl(
                    '/p3media/p3Media/ajaxSearch',
                    array('tree_parent_id' => $model->id)
                );
            } else {
                throw new CHttpException(500, "Folder with name_id : {$this->tree_parent_name_id} does not exist!");
            }

        }

        $this->widget(
            'TbSelect2',
            array(
                'model' => $this->model,
                'attribute' => $this->attribute,
                'asDropDownList' => false,
                'options' => array(
                    'width' => '100%',
                    'height' => '500px',
                    'placeholder' => 'Search Media File',
                    'allowClear' => true,
                    'minimumInputLength' => 0,
                    'ajax' => array(
                        'url' => $url,
                        'dataType' => 'jsonp',
                        'data' => 'js: function(term,page) {
                                                        return {
                                                            q: term,
                                                            page_limit: 10,
                                                        };
                                                  }',
                        'results' => 'js: function(data,page){
                                                      return {results: data};
                                                  }',
                    ),
                    'formatResult' => 'js:function(data){
                                    var markup = "<table class=\"data-result\"><tr>";
                                    if (data.image !== undefined) {
                                        markup += "<td class=\"data-image\">" + data.image.replace(/\&amp;/, "&") + "</td>";
                                    }
                                    markup += "<td class=\"data-info\"><div class=\"data-title\">" + data.title + "</div>";
                                    markup += "</td></tr></table>";
                                    return markup;
                                }',
                    'formatSelection' => 'js: function(data) {
                                    return data.title;
                                }',
                    'initSelection' => 'js: function(element, callback) {
                                    callback({"title":"' . $selectedTitle . '"});
                               }'
                ),
            )
        );
    }

    private function getMediaModel()
    {
        $model = P3Media::model()->findByPk($this->model->{$this->attribute});
        return $model;
    }
}
