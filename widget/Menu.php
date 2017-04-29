<?php
namespace backend\widget;

use yii\base\Widget;
use yii\helpers\Html;

class Menu extends Widget
{
    private $menu;
    public $active;

    public function init()
    {
        parent::init();

        $tmp=explode('?', $this->active);
        $tmp=explode('/', $tmp[0]);
        $this->active=!isset($tmp[2])?'':'/'.$tmp[2];

        $arr=[
            [
                'name'=>'Главная',
                'pref'=>'',
                'icon'=>'fa-home'
            ],
            [
                'name'=>'Страницы',
                'pref'=>'pages',
                'icon'=>'fa-file-o'
            ],
            [
                'name'=>'Услуги',
                'pref'=>'services',
                'icon'=>'fa-briefcase'
            ],
            [
                'name'=>'Услуги на главную',
                'pref'=>'servicestar',
                'icon'=>'fa-briefcase'
            ],
            [
                'name'=>'Работы',
                'pref'=>'works',
                'icon'=>'fa-briefcase'
            ],
            [
                'name'=>'Клиенты',
                'pref'=>'clients',
                'icon'=>'fa-users'
            ],
            [
                'name'=>'Сотрудники',
                'pref'=>'employees',
                'icon'=>'fa-users',
                'sub'=>[
                    'director'=>'Руководство'
                ]
            ],
            [
                'name'=>'Отзывы',
                'pref'=>'reviews',
                'icon'=>'fa-comment'
            ],
            [
                'name'=>'Рейтинги',
                'pref'=>'rating_place',
                'icon'=>'fa-trophy'
            ],
            [
                'name'=>'Вакансии',
                'pref'=>'vacancies',
                'icon'=>'fa-user'
            ],
            [
                'name'=>'Премии',
                'pref'=>'premia',
                'icon'=>'fa-star'
            ],
            [
                'name'=>'Награды',
                'pref'=>'awards',
                'icon'=>'fa-star'
            ],
            [
                'name'=>'Сервисы',
                'pref'=>'app',
                'icon'=>'fa-diamond'
            ],
            [
                'name'=>'Статьи',
                'pref'=>'articles',
                'icon'=>'fa-newspaper-o',
                'sub'=>[
                    'quotes'=>'Цитаты',
                    'sliders'=>'Слайдеры',
                ]
            ],
            [
                'name'=>'Категории статей',
                'pref'=>'article_category',
                'icon'=>'fa-list'
            ],
            [
                'name'=>'Сферы клиентов',
                'pref'=>'sfers',
                'icon'=>'fa-list'
            ],
            [
                'name'=>'SEO',
                'pref'=>'seo',
                'icon'=>'fa-bar-chart'
            ]
        ];

        foreach ($arr as $row){
            $sub=[];
            foreach ($row['sub'] as $k=>$v){
                array_push($sub, $k);
            }
            $class=$this->active==$row['pref']||in_array($this->active, $sub)?'active':'';
            if (!empty($row['sub'])){
                $this->menu.='<li class="'.$class.'"><a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">'.$row['name'].'</span><span class="fa arrow"></span></a><ul class="nav nav-second-level collapse"><li><a href="'.\Yii::$app->homeUrl.$row['pref'].'">'.$row['name'].'</a></li>';
                foreach ($row['sub'] as $key=>$value) {
                    $this->menu .= '<li><a href="'.\Yii::$app->homeUrl.$key.'">'.$value.'</a></li>';
                }

                $this->menu.='</ul></li>';
            } else {
                $this->menu .= '<li class="' . $class . '"><a href="' . \Yii::$app->homeUrl . $row['pref'] . '"><i class="fa ' . $row['icon'] . '"></i> <span class="nav-label">' . $row['name'] . '</span></a></li>';

            }
        }
    }

    public function run()
    {
        return $this->menu;
    }
}
?>