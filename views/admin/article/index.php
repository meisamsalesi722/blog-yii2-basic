<?php

use app\models\Article;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
<?php if (Yii::$app->user->can('createArticle')): ?>
    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php endif; ?>
    <?php
    //  echo $this->render('_search', ['model' => $searchModel]);   
     ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            // 'id',
            // 'user_id',
            // 'category_id',
            [
                'attribute'=>'user_id',
                'value'=>'user.username',
            ],
            [
                'attribute'=>'category_id',
                'value'=>'category.title',
            ],
            'title',

            'slug',
            //'summary:ntext',
            //'content:ntext',
            //'image',
            //'pdf',
            //'status',
            //'created_at',
            //'updated_at',
            [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{view} {update} {delete}',

    'buttons' => [
        'view' => function ($url, $model) {
            $url = ['admin/article/view', 'slug' => $model->slug];

            return Html::a('<i class="fas fa-eye"></i>', $url);
        },

        'update' => function ($url, $model) {
            $url = ['admin/article/update', 'slug' => $model->slug];

            return (Yii::$app->user->can('updateArticle') && $model->user_id == Yii::$app->user->id) || (Yii::$app->user->can('admin') || Yii::$app->user->can('editor'))
                ? Html::a('<i class="fas fa-edit"></i>', $url)
                : '';
        },

        'delete' => function ($url, $model) {
            $url = ['admin/article/delete', 'slug' => $model->slug];
            return Yii::$app->user->can('deleteArticle')
                ? Html::a('<i class="fas fa-trash"></i>', $url, [
                    'data-method' => 'post',
                    'data-confirm' => 'Are you sure?'
                ])
                : '';
        },
    ],
],
        ],
    ]); ?>



</div>
