<?php

namespace app\controllers;
use yii\web\Controller;
use app\modules\admin\models\Page;
use Yii;
class PageController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionView($alias)
    {
        return $this->render('view', [
            'model' => $this->findModel($alias),
        ]);
    }
    protected function findModel($alias)
    {
        $page = Yii::$app->cache->get('page'.$alias);
        if($page) return $page;
        if (($model = Page::find()->where(['alias'=>$alias])->asArray()->one()) !== null) {
            Yii::$app->cache->set('page'.$alias, $model, 60);
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
