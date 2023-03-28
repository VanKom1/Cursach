<?php

use app\models\Category;
use yii\bootstrap5\Html;
use yii\bootstrap5\LinkPager;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\DetailView;
use yii\widgets\ListView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
$this->params['breadcrumbs'][] = $this->title;
?>
<div id='' class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(['id'=>'product-index', 'timeout' => 5000, 'enablePushState' => false]); ?>
    <?php echo $this->render('_search', ['model' => $searchModel, 'category' => $category, 'dataProvider' => $dataProvider]); ?>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return $this->render('item', ['model' => $model]);
        },
        'layout' => '{pager}<div class="row">{items}</div>{pager}',
        'pager' => ['class' => LinkPager::class]
    ]) ?>

    <?php Pjax::end(); ?>

</div>
