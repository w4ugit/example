<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class BlockInput extends  ActiveRecord{

    public function nameTable(){
        return 'Поля блоков';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'block_id'=>'ID блока',
            'name'=>'Название',
            'pref'=>'Код',
            'type'=>'Тип'

        ];
    }

    public function rules()
    {
        return [
            [['name', 'pref'],'required'],
            ['block_id', 'integer'],
            ['type', 'string']
        ];
    }

    public function rows(){
        return [
            [
                'name'=>'id',
                'type'=>'input',
                'display'=>true,
                'attr'=>[
                    'disabled'=>'disabled'
                ]
            ],
            [
                'name'=>'name',
                'type'=>'input',
                'display'=>true
            ],
            [
                'name'=>'code',
                'type'=>'code',
                'display'=>true,
            ]
        ];
    }

}