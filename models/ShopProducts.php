<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_products".
 *
 * @property int $id
 * @property int $prior
 * @property string $name_ru
 * @property string $name_ua
 * @property string $h1_ua
 * @property string $id_1c
 * @property string $seo_title_ua
 * @property string $article
 * @property string $alias
 * @property int $prod_view
 * @property string $path
 * @property string $description_ru
 * @property string $description_ua
 * @property string $long_description_ru
 * @property string $long_description_ua
 * @property string $seo_description_ua
 * @property int $id_price
 * @property int $quantity
 * @property string $seo_title_ru
 * @property string $seo_description_ru
 * @property string $seo_keywords_ru
 * @property string $seo_keywords_ua
 * @property string $seo_text_ru
 * @property string $seo_text_ua
 * @property string $created
 * @property string $updated
 * @property string $visible
 * @property string $deleted
 * @property string $img_path
 * @property string $img_path_thumb
 * @property string $name_en
 * @property string $description_en
 * @property string $long_description_en
 * @property string $seo_title_en
 * @property string $seo_description_en
 * @property string $seo_keywords_en
 * @property string $seo_text_en
 * @property string $h1_ru
 * @property string $h1_en
 */
class ShopProducts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prior', 'name_ru', 'name_ua', 'h1_ua', 'id_1c', 'seo_title_ua', 'article', 'alias', 'id_price', 'quantity'], 'required'],
            [['prior', 'prod_view', 'id_price', 'quantity'], 'integer'],
            [['path', 'description_ru', 'description_ua', 'long_description_ru', 'long_description_ua', 'seo_description_ua', 'seo_description_ru', 'seo_keywords_ru', 'seo_keywords_ua', 'seo_text_ru', 'seo_text_ua', 'visible', 'deleted', 'description_en', 'long_description_en', 'seo_description_en', 'seo_keywords_en', 'seo_text_en'], 'string'],
            [['created', 'updated'], 'safe'],
            [['name_ru', 'name_ua', 'h1_ua', 'id_1c', 'seo_title_ua', 'article', 'img_path', 'img_path_thumb', 'name_en', 'h1_ru', 'h1_en'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 100],
            [['seo_title_ru', 'seo_title_en'], 'string', 'max' => 455],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'prior' => 'Prior',
            'name_ru' => 'Name Ru',
            'name_ua' => 'Name Ua',
            'h1_ua' => 'H1 Ua',
            'id_1c' => 'Id 1c',
            'seo_title_ua' => 'Seo Title Ua',
            'article' => 'Article',
            'alias' => 'Alias',
            'prod_view' => 'Prod View',
            'path' => 'Path',
            'description_ru' => 'Description Ru',
            'description_ua' => 'Description Ua',
            'long_description_ru' => 'Long Description Ru',
            'long_description_ua' => 'Long Description Ua',
            'seo_description_ua' => 'Seo Description Ua',
            'id_price' => 'Id Price',
            'quantity' => 'Quantity',
            'seo_title_ru' => 'Seo Title Ru',
            'seo_description_ru' => 'Seo Description Ru',
            'seo_keywords_ru' => 'Seo Keywords Ru',
            'seo_keywords_ua' => 'Seo Keywords Ua',
            'seo_text_ru' => 'Seo Text Ru',
            'seo_text_ua' => 'Seo Text Ua',
            'created' => 'Created',
            'updated' => 'Updated',
            'visible' => 'Visible',
            'deleted' => 'Deleted',
            'img_path' => 'Img Path',
            'img_path_thumb' => 'Img Path Thumb',
            'name_en' => 'Name En',
            'description_en' => 'Description En',
            'long_description_en' => 'Long Description En',
            'seo_title_en' => 'Seo Title En',
            'seo_description_en' => 'Seo Description En',
            'seo_keywords_en' => 'Seo Keywords En',
            'seo_text_en' => 'Seo Text En',
            'h1_ru' => 'H1 Ru',
            'h1_en' => 'H1 En',
        ];
    }
}
