<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\Login $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="card">
        <div class="card-title navbar-expand-md bg-info">
            <h2>Admin Trupper</h2>
        </div>
        <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

        <p class="text-center">Por favor agrega tus credenciales para poder acceder:</p>

        <div class="row">
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8">
                <?php $form = ActiveForm::begin([
                    'id' => 'login-form',
                    'fieldConfig' => [
                        'template' => "{label}\n{input}\n{error}",
                        'labelOptions' => ['class' => 'col-lg-2 col-form-label mr-lg-4'],
                        'inputOptions' => ['class' => 'col-lg-6 form-control'],
                        'errorOptions' => ['class' => 'col-lg-6 invalid-feedback'],
                    ],
                ]); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox([
                    'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                ]) ?>

                <div class="form-group">
                    <div>
                        <?= Html::submitButton('Acceder', ['class' => 'btn btn-success', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
            <div class="col-lg-2">
            </div>
        </div>
    </div>
</div>