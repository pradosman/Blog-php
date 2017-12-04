<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $id
 * @property string $titular
 * @property string $texto
 * @property string $creado
 * @property integer $activo
 * @property integer $idCategoria
 * @property integer $idUser
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titular', 'texto', 'activo', 'idCategoria', 'idUser'], 'required'],
            [['texto'], 'string'],
            [['creado'], 'safe'],
            [['activo', 'idCategoria', 'idUser'], 'integer'],
            [['titular'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titular' => 'Titular',
            'texto' => 'Texto',
            'creado' => 'Creado',
            'activo' => 'Activo',
            'idCategoria' => 'Categoría',
            'idUser' => 'Creado por',
        ];
    }

    public function getUser(){
        return $this->hasOne(User::className(), ['id'=>'idUser']);
    }

    public function getCategoria(){
        return $this->hasOne(Categoria::className(), ['id'=>'idCategoria']);
    }
}
