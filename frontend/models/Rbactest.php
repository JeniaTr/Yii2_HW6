<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rbactest".
 *
 * @property integer $id
 * @property string $title
 * @property string $text_all
 * @property integer $id_ouner
 */
class Rbactest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rbactest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text_all'], 'string'],
            [['id_ouner'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text_all' => 'Text All',
            'id_ouner' => 'Id Ouner',
        ];
    }
}
