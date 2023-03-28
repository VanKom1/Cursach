<?php

use yii\bootstrap5\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Товары', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div id="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php if (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin) : ?>
            <?= Html::a('В корзину', null, ['data-id' => $model->id, 'class' => 'btn btn-primary btn-cart-add']) ?>
        <?php endif ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            [
                'attribute' => 'category_id',
                'value' => $category[$model->category_id],
            ],
            'year',
            'price',
            'country',
            'model',
            [
                'attribute' => 'photo',
                'format' => 'image',
            ],
        ],
    ]) ?>

</div>
