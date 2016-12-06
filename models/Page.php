<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $meta_description
 * @property string $content
 * @property string $image
 * @property string $alias
 * @property integer $main
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'title', 'content', 'alias', 'main'], 'required'],
            [['content'], 'string'],
            [['main'], 'integer'],
            [['name', 'title', 'meta_description', 'image', 'alias'], 'string', 'max' => 255],
            [['alias'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'title' => 'Title',
            'meta_description' => 'Meta Description',
            'content' => 'Content',
            'image' => 'Image',
            'alias' => 'Alias',
            'main' => 'Main',
        ];
    }
}
