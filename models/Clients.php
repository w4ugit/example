<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class Clients extends  ActiveRecord{

    public function nameTable(){
        return 'Клиенты';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'name'=>'Название',
            'descr'=>'Описание',
            'logo'=>'Логотип',
            'image'=>'Фото',
            'sfera'=>'Сфера',
            'service'=>'Услуга'
        ];
    }

    public function rules()
    {
        return [
            [['name', 'logo'],'required'],
            [['descr', 'image', 'sfera', 'service'], 'safe']
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
                'type'=>'editor',
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
                'display'=>false,
                'table'=>[
                    'name'=>'sfers',
                    'value'=>'id',
                    'text'=>'name'
                ],
                'attr'=>[
                    'multiple'=>true
                ]
            ],
            [
                'name'=>'service',
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
        ];
    }

}