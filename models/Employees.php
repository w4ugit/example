<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class Employees extends  ActiveRecord{

    public function nameTable(){
        return 'Сотрудники';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'srt'=>'Порядок вывода',
            'fio'=>'ФИО',
            'position'=>'Должность',
            'date_start'=>'Дата начала работы',
            'date_end'=>'Дата окончания работы',
            'descr'=>'Описание',
            'image'=>'Фото',
            'service_id'=>'Участие в проектах',
            'client_id'=>'Работа с клиентами',
            'article_id'=>'Статьи автора',
            'article_author_id'=>'Соавторство',
            'award'=>'Награды',
        ];
    }

    public function rules()
    {
        return [
            [['srt', 'fio', 'position', 'image'],'required'],
            ['srt', 'integer'],
            [['date_start', 'date_end', 'descr', 'service_id', 'client_id', 'article_id', 'article_author_id', 'award'], 'safe']
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
                'display'=>true
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
                'name'=>'date_start',
                'type'=>'datepicker',
                'display'=>false
            ],
            [
                'name'=>'date_end',
                'type'=>'datepicker',
                'display'=>false
            ],
            [
                'name'=>'descr',
                'type'=>'editor',
                'display'=>false
            ],
            [
                'name'=>'image',
                'type'=>'file',
                'display'=>false,
            ],
            [
                'name'=>'service_id',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'works',
                    'value'=>'id',
                    'text'=>'name'
                ],
                'attr'=>[
                    'multiple'=>true
                ]
            ],
            [
                'name'=>'client_id',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'clients',
                    'value'=>'id',
                    'text'=>'name'
                ],
                'attr'=>[
                    'multiple'=>true
                ]
            ],
            [
                'name'=>'article_id',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'articles',
                    'value'=>'id',
                    'text'=>'name'
                ],
                'attr'=>[
                    'multiple'=>true,
                ]
            ],
            [
                'name'=>'article_author_id',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'articles',
                    'value'=>'id',
                    'text'=>'name'
                ],
                'attr'=>[
                    'multiple'=>true,
                ]
            ],
            [
                'name'=>'award',
                'type'=>'file',
                'display'=>false,
            ]
        ];
    }

}