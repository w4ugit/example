<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class Festivals extends  ActiveRecord{

    public function nameTable(){
        return 'Фестивали';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'name'=>'Название',
            'icon'=>'Иконка',
            'srt'=>'Порядок вывода',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'icon', 'srt'],'required'],
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
                'name'=>'icon',
                'type'=>'file',
                'display'=>false,
            ],
            [
                'name'=>'srt',
                'type'=>'input',
                'display'=>false,
            ]
        ];
    }

}