<?php

namespace app\controllers;

use app\models\Category;
use app\models\Article;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CategoryController extends Controller
{
    public function actionView($id)
    {
        echo 'hi';
        $category = $this->findModel($id);
        
        // مقالات این دسته
        $articles = Article::find()
            ->where(['category_id' => $id, 'status' => 1])
            ->orderBy(['created_at' => SORT_DESC])
            ->all();
        
        return $this->render('view', [
            'category' => $category,
            'articles' => $articles,
        ]);
    }
    
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }
        
        throw new NotFoundHttpException('دسته‌بندی مورد نظر پیدا نشد.');
    }
}