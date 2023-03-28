<?php

/** @var yii\web\View $this */
use yii\bootstrap5\Html;
use yii\bootstrap5\Carousel;

$this->title = 'My Yii Application';
?>
<div class="site-index">
<?php
        $items = [];
        foreach($products as $product) {
            $items[] = ['caption' => "<h3 class='text-dark slide-title'>{$product['title']}</h3>",
                        'content' => "<img src='img/{$product['photo']}' class='d-block slider-photo mx-auto img-fluid'>",
                        
            ];
        }
    ?>

    <h4>Новинки компании:</h4>
    <div class="row carousel-holder">
        <div class="col-md-4">
            <?= Carousel::widget([
                'items' => $items,
                'options' => ['class' => 'carousel-fade d-inline-block',
                    'data-bs-ride' => 'carousel',
                    'data-bs-interval' => '5000',
                    ],
                ]);
            ?>
        </div>
    </div>


</div>
