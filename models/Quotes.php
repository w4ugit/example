<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class Quotes extends  ActiveRecord{

    public function nameTable(){
        return 'Цитаты';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'photo'=>'Фото',
            'fio'=>'ФИО',
            'position'=>'Должность',
            'text'=>'Текст',
        ];
    }

    public function rules()
    {
        return [
            [['fio', 'position', 'text'],'required'],
            [['photo'], 'safe']
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
                'name'=>'photo',
                'type'=>'file',
                'display'=>false
            ],
            [
                'name'=>'fio',
                'type'=>'input',
                'display'=>true
            ],
            [
                'name'=>'position',
                'type'=>'input',
                'display'=>true,
            ],
            [
                'name'=>'text',
                'type'=>'editor',
                'display'=>false,
            ]
        ];
    }

}