<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $title
 * @property string $year
 * @property int $price
 * @property int $count
 * @property string $country
 * @property string $model
 * @property string $photo
 * @property int $category_id
 *
 * @property Category $category
 * @property OrderItem[] $orderItems
 * @property Order[] $orders
 */
class Product extends \yii\db\ActiveRecord
{   
   public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'year', 'price', 'count', 'country', 'model', 'photo', 'category_id'], 'required'],
            [['year'], 'safe'],
            [['price', 'count', 'category_id'], 'integer'],
            [['title', 'country', 'model', 'photo'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            //[['photo'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'year' => 'Year',
            'price' => 'Price',
            'count' => 'Count',
            'country' => 'Country',
            'model' => 'Model',
            'photo' => 'Photo',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['prod_id' => 'id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['id' => 'order_id'])->viaTable('order_item', ['prod_id' => 'id']);
    }


    public static function getLastItems() {
        return static::find()->orderBy('id DESC')->limit(5)->select('title, photo')->all();
    }


    public function upload() {
        if ( $this->validate() ) {
            $fileName = Yii::$app->user->id . '_' . time() . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs(Yii::getAlias('@app') . '/web/img/' . $fileName);
            $this->photo = $fileName;
            return true;
        } else {
            return false;
        }
    }
    
}
