<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatalogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="col-md-6">
        <div>Сортировать по:</div>
        <div class="row sort">
            <div class="sort-item first-item"><?= $dataProvider->sort->link('title') ?></div>
            <div class="sort-item"><?= $dataProvider->sort->link('price') ?></div>
            <div class="sort-item last-item"><?= $dataProvider->sort->link('year') ?></div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="product-search">

            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
                'options' => [
                    'data-pjax' => 1
                ],
            ]); ?>

            <?= $form->field($model, 'category_id')->dropDownList($category,
                ['prompt' => 'Все категории']
            ) ?>

            <div class="form-group">
                <?= Html::submitButton('Показать', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <?= Html::a('Сбросить все', ['/catalog'], ['class' => 'btn btn-outline-secondary my-3']) ?>
    </div>
</div>
