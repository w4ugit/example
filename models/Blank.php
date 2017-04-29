<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class Blank extends  ActiveRecord{

    public function nameTable(){
        return 'tmp';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
        ];
    }

    public function rules()
    {
        return [
            [['name'],'required'],
            [['descr'], 'safe']
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
                'name'=>'descr',
                'type'=>'input',
                'display'=>true
            ],
            [
                'name'=>'logo',
                'type'=>'file',
                'display'=>false,
            ],
            [
                'name'=>'image',
                'type'=>'file',
                'display'=>false,
            ],
            [
                'name'=>'sfera',
                'type'=>'select',
                'display'=>true,
                'data'=>self::$sfera
            ],
            [
                'name'=>'service',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'services',
                    'value'=>'id',
                    'text'=>'name'
                ]
            ],
        ];
    }

}