<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class Services extends  ActiveRecord{

    public function nameTable(){
        return 'Услуги';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'name'=>'Название',
            'intro'=>'Краткое описание',
            'desc'=>'Описание',
            'price'=>'Цена от',
            'icon'=>'Иконка',
            'sub'=>'Подуслуги',
            'cover'=>'Обложка'

        ];
    }

    public function rules()
    {
        return [
            [['name', 'desc', 'price', 'intro'],'required'],
            [['icon', 'sub', 'cover'], 'safe']
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
                'display'=>true,
                'attr'=>[
                    'data-pref'=>'out'
                ]
            ],
            [
                'name'=>'intro',
                'type'=>'editor',
                'display'=>true,
            ],
            [
                'name'=>'desc',
                'type'=>'editor',
                'display'=>false,
            ],
            [
                'name'=>'price',
                'type'=>'input',
                'display'=>true,
            ],
            [
                'name'=>'icon',
                'type'=>'file',
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
                'name'=>'sub',
                'type'=>'select',
                'display'=>false,
                'table'=>[
                    'name'=>'services',
                    'value'=>'id',
                    'text'=>'name'
                ],
                'attr'=>[
                    'multiple'=>true
                ]
            ],
            [
                'name'=>'cover',
                'type'=>'file',
                'display'=>false,
            ],
        ];
    }

}