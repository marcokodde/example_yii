<?php

use app\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\searchs\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

?>
<?php /* Se enlistan los productos no se tiene la certeza de varios puntos como lo son:
1.- Como mostrar la relacion con id_marca y poder mostrar el nombre en este caso Truper o Pretul
2.- No se encontro como mostrar los valores de Pagina, Trupper y Telefono */ ?>

<div class="card">
    <div class="card-title navbar-expand-md bg-info">
        <h2>Productos</h2>
        <?php
        $this->params['breadcrumbs'][] = $this->title;
        ?>
    </div>
    <div class="product-index">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Crear Producto', ['create'], ['class' => 'btn btn-success']) ?>
        </p>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'codigo',
                'sku',
                'nombre',
                'id_marca',
                [
                    'class' => 'yii\grid\DataColumn',
                    'label' => 'Pagina'
                ],

                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Product $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id_producto' => $model->id_producto]);
                    }
                ],
            ],
        ]); ?>
    </div>
</div>