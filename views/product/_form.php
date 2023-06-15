<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Product $model */
/** @var app\models\Marca $marca */
/** @var yii\widgets\ActiveForm $form */
?>

<?php /* Reutilizacion de formulario para actualizar y crear productos */ ?>
<div class="product-form">

    <?php $form = yii\widgets\ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-3">
            <div class="form-control m-1">
                <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-control  m-1">
                <?= $form->field($model, 'sku')->textInput(['maxlength' => true]) ?>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="form-control  m-1">
                <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="form-control  m-1">
                <?= $form->field($model, 'id_marca')->dropdownList(
                    \app\models\Marca::find()
                        ->select(['marca', 'id_marca'])
                        ->indexBy('id_marca')
                        ->column(),
                    ['prompt' => 'select marca']
                ) ?>
            </div>

        </div>
        <div class="col-lg-3">
            <div class="form-control  m-1">
                <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="form-control  m-1">
                <?= $form->field($model, 'stock')->textInput() ?>
            </div>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php yii\widgets\ActiveForm::end(); ?>

</div>