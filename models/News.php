<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class News extends  ActiveRecord{

    static $status=[
        0 => 'не активна',
        1 => 'активна'
    ];

    public function nameTable(){
        return 'Новини';
    }

    public function actionRow(){
        return [
            'delete'=>'Видалити',
            'active'=>'Активувати',
            'deactive'=>'Деактивувати',
            'archive'=>'Арх'
        ];
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'category'=>'Категорія',
            'title'=>'Заголовок',
            'text'=>'Текст',
            'desc'=>'Короткий опис',
            'data'=>'Дата та час',
            'main_news'=>'Головна новина',
            'top'=>'Топ новина',
            'slider_top'=>'Показувати на головній в слайдері',
            'recommend'=>'Рекомендована',
            'pref'=>'Url',
            'tag'=>'Теги',
            'img'=>'Фото',
            'status'=>'Статус'

        ];
    }

    public function rules()
    {
        return [
//            [['category', 'title','text', 'desc', 'data','status'],'required'],
            ['category','required','message'=>'Поле \'категорія\' не може бути пустим'],
            ['title','required','message'=>'Поле \'заголовок\' не може бути пустим'],
            ['text','required','message'=>'Поле \'текст\' не може бути пустим'],
            ['desc','required','message'=>'Поле \'короткий опис\' не може бути пустим'],
            ['data','required','message'=>'Поле \'дата\' не може бути пустим'],
            ['status','required','message'=>'Поле \'cтатус\' не може бути пустим'],
            ['img','required','message'=>'Додайте зображення']

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
                'name'=>'category',
                'type'=>'select',
                'display'=>true,
                'table'=>[
                    'name'=>'category',
                    'value'=>'id',
                    'text'=>'category'
                ]
            ],
            [
                'name'=>'title',
                'type'=>'input',
                'display'=>true,
                'attr'=>[
                    'data-pref'=>'out'
                ]
            ],
            [
                'name'=>'desc',
                'type'=>'editor',
                'display'=>false
            ],
            [
                'name'=>'text',
                'type'=>'editor',
                'display'=>false
            ],
            [
                'name'=>'data',
                'type'=>'datetimepicker',
                'display'=>true
            ],
            [
                'name'=>'status',
                'type'=>'select',
                'display'=>true,
                'data'=>self::$status
            ],
            [
                'name'=>'main_news',
                'type'=>'checkbox',
                'display'=>false
            ],
            [
                'name'=>'top',
                'type'=>'checkbox',
                'display'=>false
            ],
            [
                'name'=>'slider_top',
                'type'=>'checkbox',
                'display'=>false
            ],
            [
                'name'=>'recommend',
                'type'=>'checkbox',
                'display'=>false
            ],
            [
                'name'=>'pref',
                'type'=>'input',
                'display'=>false,
                'attr'=>[
                    'data-pref'=>'in'
                ]
            ],
            [
                'name'=>'tag',
                'type'=>'input',
                'display'=>false
            ],
            [
                'name'=>'img',
                'type'=>'file',
                'display'=>false
            ],
        ];
    }

}