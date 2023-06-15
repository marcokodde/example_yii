<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\searchs\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<?php /* Vista utilizada para las busquedas de ciertos campos */ ?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_producto') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'sku') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'id_marca') ?>

    <?php // echo $form->field($model, 'descripcion') 
    ?>

    <?php // echo $form->field($model, 'stock') 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>