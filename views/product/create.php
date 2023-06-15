<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var app\models\Marca $marca */


?>
<div class="card">
    <div class="card-title navbar-expand-md bg-info">
        <h2>Crear Producto</h2>
    </div>
    <?php
    $this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    ?>
    <div class="product-create">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
            'marca' => $marca
        ]) ?>
    </div>
</div>