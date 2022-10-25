<?php


/**
 * Created by ssiva on 23/10/2022
 */


namespace app\widgets;

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

class DataTable extends GridView
{
    
    /**
     * @var array the HTML attributes for the container tag of the datatables view.
     * The "tag" element specifies the tag name of the container element and defaults to "div".
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];
    
    /**
     * @var array the HTML attributes for the datatables table element.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $clientOptions = [];
    
    /**
     * @var array the HTML attributes for the datatables table element.
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $tableOptions = ["class"=>"table table-striped table-bordered","cellspacing"=>"0", "width"=>"100%"];
    
    public function run()
    {
        $clientOptions = $this->getClientOptions();
        $view = $this->getView();
        $id = $this->tableOptions['id'];
        $options = Json::encode($clientOptions);
        $view->registerJs("jQuery('#$id').DataTable($options);");
        
        //base list view run
        if ($this->showOnEmpty || $this->dataProvider->getCount() > 0) {
            $content = preg_replace_callback("/{\\w+}/", function ($matches) {
                $content = $this->renderSection($matches[0]);
                
                return $content === false ? $matches[0] : $content;
            }, $this->layout);
        } else {
            $content = $this->renderEmpty();
        }
        $tag = ArrayHelper::remove($this->options, 'tag', 'div');
        echo Html::tag($tag, $content, $this->options);
    }
    
    /**
     * Initializes the datatables widget disabling some GridView options like
     * search, sort and pagination and using DataTables JS functionalities
     * instead.
     */
    public function init()
    {
        parent::init();
        //disable filter model by grid view
        $this->filterModel = null;
        //disable sort by grid view
        $this->dataProvider->sort = false;
        //disable pagination by grid view
        $this->dataProvider->pagination = false;
        //layout showing only items
        $this->layout = "{items}";
        //the table id must be set
        if (!isset($this->tableOptions['id'])) {
            $this->tableOptions['id'] = 'datatables_'.$this->getId();
        }
    }
    /**
     * Returns the options for the datatables view JS widget.
     * @return array the options
     */
    protected function getClientOptions()
    {
        return $this->clientOptions;
    }
    
    public function renderTableBody()
    {
        $models = array_values($this->dataProvider->getModels());
        if (count($models) === 0) {
            return "<tbody>\n</tbody>";
        } else {
            return parent::renderTableBody();
        }
    }
}