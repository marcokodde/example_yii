<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
?>
<div class="card">
    <div class="card-title navbar-expand-md bg-info">
        <h2>Actualizar Producto</h2>
        <?php $model->id_producto ?>
    </div>

    <?php
    $this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id_producto, 'url' => ['view', 'id_producto' => $model->id_producto]];
    $this->params['breadcrumbs'][] = 'Update';
    ?>
    <div class="product-update">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>

    </div>
</div>