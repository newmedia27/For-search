<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\ShopProductsSearch;

/**
 * LoginForm is the model behind the login form.
 *
 * @property User|null $user This property is read-only.
 *
 */
class SearchForm extends Model
{
    public $keyword;


    public function rules()
    {
        return [

            ['keyword','trim'],
            ['keyword','required'],
            ['keyword','string', 'min'=> 5],
        ];
    }
    public function seacrh()
    {
        if ($this->validate()){
            $model = new ShopProductsSearch();
            return $model->fullTextSearch($this->keyword);
        }
    }


}