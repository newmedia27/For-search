<?php
/**
 * Created by PhpStorm.
 * User: jart
 * Date: 11.03.2018
 * Time: 14:20
 */

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;

class ShopProductsSearch
{
    public function fullTextSearch($keyword)
    {
        $sql = "SELECT * FROM idx_shop_products_content WHERE MATCH ('$keyword') OPTION ranker = WORDCOUNT";
        $data = Yii::$app->sphinx->createCommand($sql)->queryAll();


        $ids = ArrayHelper::map($data, 'id', 'id');

        $data = ShopProducts::find()->where(['id' => $ids])->asArray()->all();


        $data = ArrayHelper::index($data, 'id');

        $result = [];
        foreach ($ids as $element) {


            $result[] = [
                'id' => $element,
                'name_ru' => $data[$element]['name_ru'],
                'description_ru' => $data[$element]['description_ru'],
            ];
        }
//        echo '<pre>';
//        print_r($result);
//        echo '</pre>';die;

        return $result;
    }
}