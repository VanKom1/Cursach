<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\bs5dropdown\Dropdown;
use kartik\bs5dropdown\ButtonDropdown;
/** @var yii\web\View $this */
/** @var app\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
// echo Html::tag('span', 'Dropdown Span', [
//     'id' => 'dropdownMenuButton',
//     'class' => 'btn btn-link text-info dropdown-toggle',
//     'data-bs-toggle' => 'dropdown',
//     'aria-haspopup' => 'false',
//     'aria-expanded' => 'false'
//  ]);
// echo Dropdown::widget([
//     'items' => [
//         ['label' => 'Section 1', 'url' => '/'],
//         ['label' => 'Section 2', 'url' => '#'],
//         [
//              'label' => 'Section 3', 
//              'items' => [
//                  ['label' => 'Section 3.1', 'url' => '/'],
//                  ['label' => 'Section 3.2', 'url' => '#'],
//                  [
//                      'label' => 'Section 3.3', 
//                      'items' => [
//                          ['label' => "", 'url' => '/'],
//                          ['label' => 'Section 3.3.2', 'url' => '#'],
//                      ],
//                  ],
//              ],
//          ],
//     ],
//     'options' => ['aria-labelledby' => 'dropdownMenuButton']
// ]);

echo ButtonDropdown::widget([
    'label' => 'Button Dropdown', 
    'dropdown' => [
        'items' => [
            ['label' => 'Action', 'url' => '#'],
            ['label' => 'Submenu 1', 'items' => [
                ['label' => 'Action', 'url' => '#'],
                ['label' => 'Another action', 'url' => '#'],
                ['label' => 'Something else here', 'url' => '#'],
                '<div class="dropdown-divider"></div>',
                ['label' => 'Submenu 2', 'items' => [
                    ['label' => 'Action', 'url' => '#'],
                    ['label' => 'Another action', 'url' => '#', 'linkOptions'=>[ 'data'=>['inf' => 'a5']]],
                    ['label' => 'Something else here', 'url' => '#'],
                    '<div class="dropdown-divider"></div>',
                    ['label' => 'Separated link', 'url' => '#'],
                ]],
            ]],
            ['label' => 'Something else here', 'url' => '#'],
            '<div class="dropdown-divider"></div>',
            ['label' => 'Separated link', 'url' => '#'],
        ],
    ],
    'buttonOptions' => ['class' => 'btn-outline-secondary']
]);
?>
<!--
<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'parent_node')->dropDownList([1,2,[3,4],5,6,[7,[8,9]]]) ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
-->
</div>
