<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class Articles extends  ActiveRecord{

    public function nameTable(){
        return 'Статьи';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'author'=>'Автор',
            'category'=>'Категория',
            'data'=>'Дата',
            'view'=>'Просмотров',
            'read'=>'Читать',
            'name'=>'Название',
            'intro'=>'Краткое описание',
            'text'=>'Текст',
            'subauthor'=>'Соавтор',
            'image'=>'Фото',
            'rubrics'=>'Рубрики',
            'pref'=>'URL',
            'status'=>'Опубликовать'
        ];
    }

    public function rules()
    {
        return [
            [['author', 'data', 'view', 'name', 'intro', 'text', 'pref', 'category'],'required'],
            [['subauthor', 'read', 'image', 'rubrics', 'status'], 'safe']
        ];
    }

    public function rows(){
        return [
            [
                'name'=>'legend',
                'type'=>'legend',
                'display'=>false,
                'list'=>[
                    0 => 'Для вставки цитаты используйте код [quote:#], где # - это ID цитаты',
                    1 => 'Для вставки слайдера используйте код [slide:#], где # - это ID слайдера',
                ]
            ],
            [
                'name'=>'id',
                'type'=>'input',
                'display'=>true,
                'attr'=>[
                    'disabled'=>'disabled'
                ]
            ],
            [
                'name'=>'author',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'employees',
                    'value'=>'id',
                    'text'=>'fio'
                ]
            ],
            [
                'name'=>'category',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'article_category',
                    'value'=>'id',
                    'text'=>'name'
                ]
            ],
            [
                'name'=>'data',
                'type'=>'datepicker',
                'display'=>true
            ],
            [
                'name'=>'view',
                'type'=>'input',
                'display'=>true
            ],
            [
                'name'=>'read',
                'type'=>'input',
                'display'=>true
            ],
            [
                'name'=>'name',
                'type'=>'input',
                'display'=>true,
                'attr'=>[
                    'data-pref'=>'out'
                ]
            ],
            [
                'name'=>'intro',
                'type'=>'editor',
                'display'=>false,
            ],
            [
                'name'=>'text',
                'type'=>'editor',
                'display'=>false,
            ],
            [
                'name'=>'subauthor',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'employees',
                    'value'=>'id',
                    'text'=>'fio'
                ],
                'attr'=>[
                    'multiple'=>true
                ]
            ],
            [
                'name'=>'image',
                'type'=>'file',
                'display'=>false,
            ],
            [
                'name'=>'rubrics',
                'type'=>'input',
                'display'=>false,
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
                'name'=>'status',
                'type'=>'checkbox',
                'display'=>false,
            ],
        ];
    }

}