<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use app\models\Product;
use app\models\Marca;
use app\models\searchs\ProductSearch;
use yii\web\NotFoundHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\Login;

// Creacion de Clase Productos en el controlador
class ProductController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['POST'],
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    //Creacion de login para iniciar sesion
    public function actionLogin()
    {

        $model = new Login();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect('index');
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    //Mostrar los registros de los productos.
    public function actionIndex()
    {

        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel'   => $searchModel,
            'dataProvider'  => $dataProvider,
        ]);
    }

    // Mostrar un solo producto
    public function actionView($id_producto)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_producto),
        ]);
    }

    // Creacion de un nuevo producto
    public function actionCreate()
    {
        $model = new Product();
        $marca = new Marca();
        if ($this->request->isPost) {
            if ($model->validate()) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id_producto' => $model->id_producto]);
                }
            } else {
                $errors = $model->errors;
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'marca' => $marca,
        ]);
    }

    // Actualizacion de un registro, pasamos como parametro el id del producto a actualizar
    public function actionUpdate($id_producto)
    {
        $model = $this->findModel($id_producto);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_producto' => $model->id_producto]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    // Eliminar producto con el id seleccionado
    public function actionDelete($id_producto)
    {
        $this->findModel($id_producto)->delete();

        return $this->redirect(['index']);
    }

    // Busqueda de producto por id
    protected function findModel($id_producto)
    {
        if (($model = Product::findOne(['id_producto' => $id_producto])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    // Busqueda de producto por sku
    protected function findSkuModel($sku)
    {
        if (($model = Product::findOne(['sku' => $sku])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
