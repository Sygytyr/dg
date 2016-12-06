<?php
/**
 * Created by PhpStorm.
 * User: Andrey
 * Date: 15.05.2016
 * Time: 15:53
 */

namespace app\modules\admin\controllers;
use yii\web\Controller;
use yii\filters\AccessControl;


class AppAdminController extends Controller{

    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }


    public function beforeAction($action)
    {
        $this->layout = 'admin'; //your layout name
        return parent::beforeAction($action);
    }
}