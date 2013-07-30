<?php
/**
 * Created by JetBrains PhpStorm.
 * User: tobias
 * Date: 25.02.13
 * Time: 17:11
 * To change this template use File | Settings | File Templates.
 */
class P3MediaSelect extends CWidget
{
    public $model;
    public $attribute;

    function run()
    {
        $selectedModel = $this->getMediaModel();
        $selectedTitle = $selectedModel ? $selectedModel->title : '';

        $this->widget('TbSelect2',
                      array(
                           'model'=> $this->model,
                           'attribute'=> $this->attribute,
                           'asDropDownList' => false,
                           'options'  => array(
                               'width'              => '100%',
                               'height'             => '500px',
                               'placeholder'        => 'Search Media File',
                               'allowClear'         => true,
                               'minimumInputLength' => 0,
                               'ajax'               => array(
                                   'url'      => Yii::app()->controller->createUrl('/p3media/p3Media/ajaxSearch'),
                                   'dataType' => 'jsonp',
                                   'data'     => 'js: function(term,page) {
                                                        return {
                                                            q: term,
                                                            page_limit: 10,
                                                        };
                                                  }',
                                   'results'  => 'js: function(data,page){
                                                      return {results: data};
                                                  }',
                               ),
                               'formatResult'       => 'js:function(data){
                                    var markup = "<table class=\"data-result\"><tr>";
                                    if (data.image !== undefined) {
                                        markup += "<td class=\"data-image\">" + data.image.replace(/\&amp;/, "&") + "</td>";
                                    }
                                    markup += "<td class=\"data-info\"><div class=\"data-title\">" + data.title + "</div>";
                                    markup += "</td></tr></table>";
                                    return markup;
                                }',
                               'formatSelection'    => 'js: function(data) {
                                    return data.title;
                                }',
                               'initSelection'      => 'js: function(element, callback) {
                                    callback({"title":"' . $selectedTitle . '"});
                               }'
                           ),
                      ));
    }

    private function getMediaModel()
    {
        $model = P3Media::model()->findByPk($this->model->{$this->attribute});
        return $model;
    }
}
