<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "demo".
 *
 * @property integer $id
 * @property string $name
 * @property string $default
 * @property string $leixing
 * @property string $xuanxiang
 * @property string $bitian
 * @property string $yanzheng
 * @property string $small
 * @property string $big
 */
class Demo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'demo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'default', 'leixing', 'xuanxiang', 'bitian', 'yanzheng'], 'string', 'max' => 50],
            [['small', 'big'], 'string', 'max' => 30],
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
            'default' => 'Default',
            'leixing' => 'Leixing',
            'xuanxiang' => 'Xuanxiang',
            'bitian' => 'Bitian',
            'yanzheng' => 'Yanzheng',
            'small' => 'Small',
            'big' => 'Big',
        ];
    }
}
