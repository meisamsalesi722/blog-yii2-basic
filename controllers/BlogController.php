<?php

namespace app\controllers;

use app\models\Article;
use app\models\Comment;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

class BlogController extends Controller
{
    public function actionIndex()
    {

        $dataProvider = new ActiveDataProvider([
            'query' => Article::find()
                ->where(['status' => 1])
                ->orderBy(['id' => SORT_DESC]),
            'pagination' => [
                'pageSize' => 9,
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($slug)
    {

        $model = Article::findOne(['slug' => $slug]);

        if (!$model) {
            throw new \yii\web\NotFoundHttpException();
        }
        $commentModel = new Comment();

        return $this->render('view', [
            'model' => $model,
            'commentModel' => $commentModel,
            'isFavorite' => $model->isFavorite(),
        ]);
    }

    
}