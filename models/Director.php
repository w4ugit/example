<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class Director extends  ActiveRecord{

    public function nameTable(){
        return 'Руководство';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'fio'=>'ФИО',
            'position'=>'Должность',
            'text'=>'Текст',
            'photo'=>'Фото',
            'url'=>'Ссылка',
        ];
    }

    public function rules()
    {
        return [
            [['fio', 'position', 'url'],'required'],
            [['text', 'photo'], 'safe']
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
                'name'=>'fio',
                'type'=>'input',
                'display'=>true
            ],
            [
                'name'=>'position',
                'type'=>'input',
                'display'=>true
            ],
            [
                'name'=>'text',
                'type'=>'editor',
                'display'=>false,
            ],
            [
                'name'=>'photo',
                'type'=>'file',
                'display'=>false,
            ],
            [
                'name'=>'url',
                'type'=>'input',
                'display'=>false,
            ]
        ];
    }

}