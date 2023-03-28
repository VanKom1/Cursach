<?php

namespace app\models;

use Yii;
use yii\helpers\VarDumper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_node
 * @property string $title
 */
class Category extends \yii\db\ActiveRecord
{
    public $items;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_node', 'title'], 'required'],
            [['parent_node'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_node' => 'Parent Node',
            'title' => 'Title',
        ];
    }

    public function getAllCategory($parent_node)
    {
        $items = [];
        $list = Category::find()->asArray()->all();

        foreach($list as $node){
            if($node["parent_node"] == $parent_node){

                $items[] = [
                'label' => $node['title'],
                'linkOptions'=>['data'=>['name' => $node["title"]]],
                "items" => $this -> getAllCategory($node['id'])
            ];
            }
        }
        //VarDumper::dump($items,10,true);die;

        return $items;
    }
}
