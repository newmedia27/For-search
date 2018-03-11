<?php
/**
 * Created by PhpStorm.
 * User: jart
 * Date: 11.03.2018
 * Time: 2:06
 */

namespace app\controllers;

use app\models\SearchForm;
use yii\web\Controller;

class SearchController extends Controller
{
    public function actionIndex()
    {
        $model = new SearchForm();
        $results = null;

        if ($model->load(\Yii::$app->request->post())){
            $results = $model->seacrh();
        }

        return $this->render('index',[
            'model'=>$model,
            'results'=> $results,
        ]);
    }
}