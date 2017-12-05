<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "register_1".
 *
 * @property integer $id
 * @property string $tel
 * @property string $pwd
 * @property string $qpwd
 */
class Reg extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'register_1';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tel', 'pwd', 'qpwd'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tel' => 'Tel',
            'pwd' => 'Pwd',
            'qpwd' => 'Qpwd',
        ];
    }
}
