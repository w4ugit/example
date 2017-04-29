<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class Awards extends  ActiveRecord{

    public function nameTable(){
        return 'Награды';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'srt'=>'Порядок вывода',
            'year'=>'Год',
            'name'=>'Название',
            'place'=>'Место',
            'descr'=>'Описание',
            'image'=>'Картинка',
            'url_to_work'=>'Ссылка на кейс',
            'name_url'=>'Название ссылки',
            'picture'=>'Слайдер',
            'button_name'=>'Текст возле места',
        ];
    }

    public function rules()
    {
        return [
            [['srt', 'name'],'required'],
            [['year', 'place', 'descr', 'image', 'url_to_work', 'name_url', 'picture', 'button_name'], 'safe']
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
                'name'=>'srt',
                'type'=>'input',
                'display'=>true,
                'attr'=>[
                    'liveedit'=>true
                ]
            ],
            [
                'name'=>'year',
                'type'=>'input',
                'display'=>true
            ],
            [
                'name'=>'name',
                'type'=>'input',
                'display'=>true,
            ],
            [
                'name'=>'place',
                'type'=>'input',
                'display'=>false,
            ],
            [
                'name'=>'descr',
                'type'=>'editor',
                'display'=>false,
            ],
            [
                'name'=>'image',
                'type'=>'file',
                'display'=>false,
            ],
            [
                'name'=>'url_to_work',
                'type'=>'input',
                'display'=>false,
            ],
            [
                'name'=>'name_url',
                'type'=>'input',
                'display'=>false,
            ],
            [
                'name'=>'picture',
                'type'=>'file',
                'display'=>false,
            ],
            [
                'name'=>'button_name',
                'type'=>'input',
                'display'=>false,
            ],
            [
                'name'=>'premia',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'premia',
                    'value'=>'id',
                    'text'=>'name'
                ]
            ],
        ];
    }

}