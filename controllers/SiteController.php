<?php
namespace backend\controllers;

use backend\models\BlockInput;
use backend\models\PageBlocks;
use backend\models\User;
use common\models\Orders;
use Yii;
use yii\db\Query;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public function beforeAction($action)
    {
        // ...set `$this->enableCsrfValidation` here based on some conditions...
        // call parent method that will check CSRF if such property is true.
        if ($action->id === 'delete-order') {
            # code...
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'delete', 'active', 'deactive', 'archive', 'generate-box', 'ledit', 'delete-order'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $this->layout='main';
        return $this->render('index', [
            'orders'=>Orders::find()->all()
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {

//        $user = new User();
//        $user->email = 'admin@web4u.in.ua';
//        $user->setPassword('root');
//        $user->generateAuthKey();
//        $user->username='admin';
//        $user->status=10;
//
//        $user->save();
        $this->layout='login';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new \backend\models\LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionDelete(){
        foreach ($_POST['id'] as $q){
            $class='\backend\models\\'.ucfirst($_POST['table']);
            $model=$class::findOne($q);
            $model->delete();
        }
    }

    public function actionActive(){
        foreach ($_POST['id'] as $q){
            $class='\backend\models\\'.ucfirst($_POST['table']);
            $model=$class::findOne($q);
            $model->status=1;
            $model->save();
        }
    }

    public function actionDeactive(){
        foreach ($_POST['id'] as $q){
            $class='\backend\models\\'.ucfirst($_POST['table']);
            $model=$class::findOne($q);
            $model->status=0;
            $model->save();
        }
    }

    public function actionArchive(){
//        foreach ($_POST['id'] as $q){
//            $class='\backend\models\\'.ucfirst($_POST['table']);
//            $model=$class::findOne($q);
//            $model->status=0;
//            $model->save();
//        }
    }

    public function actionGenerateBox(){
        $error='';
        $model=new PageBlocks();
        $model->name=$_POST['name'];
        $model->code=$_POST['code'];
        $model->page_id=$_POST['page_id'];
        if ($model->save()){
            $block_id=Yii::$app->db->getLastInsertID();
            for ($i=0;$i<count($_POST['input_name']);$i++){
                $input=new BlockInput();
                $input->name=$_POST['input_name'][$i];
                $input->pref=$_POST['input_pref'][$i];
                $input->block_id=$block_id;
                $input->type=$_POST['input_type'][$i];
                if (!$input->save()){
                    $error.=json_encode($input->getErrors());
                    return $error;
                }
            }
        } else {
            $error.=json_encode($model->getErrors());
            return $error;
        }
    }

    public function actionLedit(){
        $table_origin=$_POST['table'];
        $table=explode('_', $_POST['table']);
        if ($table[1]==''){
            $table_real=ucfirst($table[0]);
        } else {
            $table_real='';
            foreach ($table as $tab){
                $table_real.=ucfirst($tab);
            }
        }
        $class='\backend\models\\'.$table_real;
        $model=$class::findOne($_POST['id']);
        $model->$_POST['input']=$_POST['value'];
        $model->save();
    }

    public function actionDeleteOrder(){
        $order=Orders::findOne($_POST['id']);
        $order->delete();
        return Yii::$app->response->redirect('/admin/');
    }
}
