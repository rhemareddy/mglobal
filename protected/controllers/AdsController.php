<?php

class AdsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = 'inner';

  public function init() {
        BaseClass::isLoggedIn();
    }
    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view','yearadslist'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    public function getSocialButton($data) {        
        $this->renderPartial('shareoptions', array('data' => $data), false, true);
       
    }
    
    public function isShared($data, $row) {
        
        $userid = Yii::app()->session['userid'];
        $existingShareObject = UserSharedAd::model()->findByAttributes(array('user_id'=>$userid, 'ad_id'=>$data->id,'created_at'=>date('Y-m-d')));
        if(!empty($existingShareObject)){
            echo "Earned";
        }
    }

    /* Next One Year Insertion */
    
    public function actionYearAdsList(){
        $userId = Yii::app()->session['userid'];
        $next_year = strtotime('+1 year');
        $current_time = time();
        $i = 1 ;
        $userAdsObject = UserSharedAd::model()->findByAttributes(array('user_id' => $userId));
        
        if(count($userAdsObject) == 0 ){
            while($current_time < $next_year){  
                
                $randAds = Ads::model()->find(array('select'=>'*', 'limit'=>'1', 'order'=>'rand()'));        
                if($i == 1){
                    $current_time = strtotime('+0 day', $current_time);                        
                }else{
                    $current_time = strtotime('+1 day', $current_time);
                }
                $modelUserShareAd = new UserSharedAd();
                $modelUserShareAd->user_id = Yii::app()->session['userid'];
                $modelUserShareAd->date = date('Y-m-d', $current_time);
                $modelUserShareAd->ad_id = $randAds->id;
                $modelUserShareAd->status = 0;
                $modelUserShareAd->created_at = date('Y-m-d');
                $modelUserShareAd->save(false);               
                $i++;
            }
        }
    }



    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Ads;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Ads'])) {
            $model->attributes = $_POST['Ads'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Ads'])) {
            $model->attributes = $_POST['Ads'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $successMsg = "";
        $dataProviderArray = "";
        $orderObject = Order::model()->findAll(array('condition' => 'user_id = '. Yii::app()->session['userid']));
//        echo "<pre>";
//        print_r($orderObject); die;
        foreach($orderObject as $orderObjectList){           
            $userSharedAdObject = UserSharedAd::model()->findAll(array('condition' => ' order_id = '.$orderObjectList->id ));
            if(count($userSharedAdObject)){
                $dataProviderArray[] = $userSharedAdObject;
            }
        }
        $this->render('list', array(
            'dataProviderArray' => $dataProviderArray, 'successMsg' => $successMsg
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Ads('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Ads']))
            $model->attributes = $_GET['Ads'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Ads the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Ads::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Ads $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'ads-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
