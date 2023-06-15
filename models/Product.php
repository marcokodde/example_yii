<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "productos".
 *
 * @property int $id_producto
 * @property string|null $codigo
 * @property string|null $sku
 * @property string|null $nombre
 * @property int|null $id_marca
 * @property string|null $descripcion
 * @property int|null $stock
 *
 * @property Fotos[] $fotos
 * @property Marcas $marca
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'productos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'sku'], 'required'],
            [['nombre', 'descripcion'], 'string', 'max' => 255],
            [['stock'], 'integer'],
            [['id_marca'], 'exist', 'skipOnError' => true, 'targetClass' => Marca::class, 'targetAttribute' => ['id_marca' => 'id_marca']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_producto' => 'Id Producto',
            'codigo' => 'Codigo',
            'sku' => 'Sku',
            'nombre' => 'Nombre',
            'id_marca' => 'Id Marca',
            'descripcion' => 'Descripcion',
            'stock' => 'Stock',
        ];
    }


    /**
     * Gets query for [[Marca]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marca::class, ['id_marca' => 'id_marca', 'marca' => 'marca']);
    }
}
