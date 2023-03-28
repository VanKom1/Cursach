<div class="card my-1">
  <img src="/img/<?= $model->photo ?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><a href="/catalog/view?id=<?= $model->id ?>"><?= $model->title ?> </a></h5>
    <p><?= $model->price ?> руб.</p>
    <?php if (!Yii::$app->user->isGuest && !Yii::$app->user->identity->isAdmin) : ?>
        <a data-id="<?= $model->id ?>" class="btn btn-primary btn-cart-add">В корзину</a>
    <?php endif ?>
  </div>
</div>
