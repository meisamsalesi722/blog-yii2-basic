<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Category', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            // 'parent_id',
            [
                'attribute'=>'parent_id',
                'value'=> function($model) {
        return $model->parent ? $model->parent->title : 'دسته اصلی';
    },
            ],
            [
                'attribute'=>'created_at',
                'value'=> function($model) {
                    return date('Y-m-d H:i:s', $model->created_at);
                }
            ],
            [
                'attribute'=>'updated_at',
                'value'=> function($model) {
                    return date('Y-m-d H:i:s', $model->updated_at);
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Category $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
