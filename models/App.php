<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class App extends  ActiveRecord{

    public function nameTable(){
        return 'Сервисы';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'name'=>'Название',
            'url'=>'Ссылка',
            'text'=>'Текст',
            'image'=>'Фото',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'url', 'text'],'required'],
            [['image'], 'safe']
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
                'name'=>'url',
                'type'=>'input',
                'display'=>true
            ],
            [
                'name'=>'text',
                'type'=>'editor',
                'display'=>false,
            ],
            [
                'name'=>'image',
                'type'=>'file',
                'display'=>false,
            ]
        ];
    }

}