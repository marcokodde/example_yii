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

        <?php // echo $this->render('_search', ['model' => $searchModel]); 
        ?>

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
                    'class' => 'yii\grid\DataColumn',  // Se puede omitir, ya que es la predefinida.
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