<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'titular',
            [
                'attribute'=>'activo',
                'format'=>'raw',
                'value'=>function($model){
                    if ($model->activo==1)
                        return '<i class="check"></i>Sí';
                    return 'No';
                },
                'filter'=>[0=>'No activo', 1=>'Activo']
            ],
            [
                'attribute'=>'idCategoria',
                'value'=>function($model){
                    return $model->categoria->nombre;
                },
                'filter'=>ArrayHelper::map($categorias,'id','nombre')
            ],
             [
                'attribute'=>'idUser',
                'value'=>function($model){
                    return $model->user->username;
                },
                'filter'=>ArrayHelper::map($users,'id','username')
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
