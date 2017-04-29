<?php
/**
 * Created by PhpStorm.
 * User: gebruiker
 * Date: 20.01.17
 * Time: 13:59
 */

namespace backend\models;

use yii\db\ActiveRecord;


class RatingPlace extends  ActiveRecord{

    public function yearList(){
        $year=[];
        for ($i=2000;$i<=2030;$i++){
            $year[$i]=$i;
        }
        return $year;
    }

    public function nameTable(){
        return 'Места в рейтинге';
    }

    public function attributeLabels()
    {
        return [

            'id'=>'ID',
            'rating'=>'Рейтинг',
            'year'=>'Год',
            'place'=>'Место',
        ];
    }

    public function rules()
    {
        return [
            [['rating', 'year', 'place'],'required'],
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
                'name'=>'rating',
                'type'=>'input',
                'display'=>true,
            ],
            [
                'name'=>'year',
                'type'=>'select',
                'display'=>true,
                'data'=>self::yearList()
            ],
            [
                'name'=>'place',
                'type'=>'input',
                'display'=>true
            ]
        ];
    }

    public function year(){
        $res=RatingPlace::find()->select(['year'=>'distinct(year)'])->all();
        $year=[];
        foreach ($res as $row){
            array_push($year, $row['year']);
        }
        rsort($year);
        return $year;
    }

}