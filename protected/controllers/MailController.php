<?php

class MailController extends Controller {

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
                'actions' => array('index', 'view', 'reply', 'compose', 'sent'),
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
     * Lists all models.
     */
    public function actionIndex() {
        $loggedInUserId = Yii::app()->session['userid'];
        $pageSize = 100;
        $successMsg = "";
        $dataProvider = new CActiveDataProvider('Mail', array(
            'criteria' => array('condition' => 'to_user_id = ' . $loggedInUserId, 'order' => 'updated_at DESC'),
            'pagination' => array('pageSize' => $pageSize)));

        $this->render('index', array(
            'dataProvider' => $dataProvider,'successMsg'=>$successMsg
        ));
    }

    /**
     * Lists all models.
     */
    public function actionSent() {
        $loggedInUserId = Yii::app()->session['userid'];
        $pageSize = 100;
        $dataProvider = new CActiveDataProvider('Mail', array(
            'criteria' => array('condition' => 'from_user_id = ' . $loggedInUserId, 'order' => 'updated_at DESC'),
            'pagination' => array('pageSize' => $pageSize)));
        $this->render('sent', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /*public function actionCompose() {
        $emailObject = User::model()->findAll(array('condition' => 'role_id=2'));
        if ($_POST) {
            //$emailArray = $_POST['to_email'];


            $loggedInUserId = Yii::app()->session['userid'];

            $pageSize= 100;
            $successMsg = "";
            $dataProvider = new CActiveDataProvider('Mail', array(
                        'criteria'=>array('condition' => 'to_user_id = '.$loggedInUserId,'order'=>'updated_at DESC'),
                        'pagination' => array('pageSize' => $pageSize)));
            
            $this->render('index',array(
                'dataProvider'=>$dataProvider,'successMsg'=>$successMsg
            ));
	}*/
        /**
	 * Lists all models.
	 */
	/*public function actionSent()
	{  
             $loggedInUserId = Yii::app()->session['userid']; 
            $pageSize= 100;
            $dataProvider = new CActiveDataProvider('Mail', array(
                        'criteria'=>array('condition' => 'from_user_id = '.$loggedInUserId,'order'=>'updated_at DESC'),
                        'pagination' => array('pageSize' => $pageSize)));
            $this->render('sent',array(
                'dataProvider'=>$dataProvider,
            ));
	}*/
        public function actionCompose(){
            $emailObject = User::model()->findAll(array('condition'=>'role_id=2'));
            if($_POST){  
             $loggedInUserId = Yii::app()->session['userid'];
             $to_email = $_POST['to_email'];
            $userObject = User::model()->findByAttributes(array('id' => $to_email));
            if (empty($userObject)) {
                //$this->render('compose',array('error'=>'User Does Not Exist'));
                $this->render('compose', array('error' => 'User Does Not Exist', 'emailObject' => $emailObject));
            } else {
                if(!empty($_FILES['attachment']['name']))
                        {
                        $fname = time() . $_FILES['attachment']['name'];
                        $path = Yii::getPathOfAlias('webroot') . "/upload/attachement/";
                        $uploadSize = $_FILES['attachment']["size"];
                        if($uploadSize > 2097152)
                        {
                          $this->render('compose', array('error' => 'File can not be greater than 2MB', 'emailObject' => $emailObject));   
                        }else{
                        BaseClass::uploadFile($_FILES['attachment']['tmp_name'], $path, $fname);
                        }
                        }
                        else if(!empty($_FILES['attachment1']['name']))
                        {
                          $fname = $_POST['attachment1'];  
                        }
                        else{
                         $fname = "";   
                        }
                        
                $path = Yii::getPathOfAlias('webroot') . "/upload/attachement/";
                BaseClass::uploadFile($_FILES['attachment']['tmp_name'], $path, $fname);
                $mailObject = new Mail();
                $mailObject->to_user_id = $_POST['to_email'];
                $mailObject->from_user_id = $loggedInUserId; //Yii::app()->params['adminId'];
                $mailObject->subject = $_POST['email_subject'];
                $mailObject->message = $_POST['email_body'];
                $mailObject->attachment = $fname;
                $mailObject->status = 0;
                $mailObject->created_at = new CDbExpression('NOW()');
                $mailObject->updated_at = new CDbExpression('NOW()');
                $mailObject->save(false);

            }
            $this->redirect(array('/mail?successMsg=1'));

            $this->redirect(array('/mail?successMsg=1'));
        }
        //$emailObject = User::model()->findAll(array('condition'=>'role_id=2'));
//            var_dump($emailObject);exit;
        $this->render('compose', array('error' => '', 'emailObject' => $emailObject));
    }

    public function actionReply() {
        if ($_GET) {
            $emailObject = User::model()->findAll(array('condition' => 'role_id=2'));
            $mailObject = Mail::model()->findByPk($_GET['id']);
            if(Yii::app()->session['userid'] != $mailObject->from_user_id) {
                $mailObject->status = 1;
            }
            $mailObject->save(false);
            $this->render('compose', array('error' => '', 'mailObject' => $mailObject, 'emailObject' => $emailObject));
        }
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $loggedInUserId = Yii::app()->session['userid'];
        if ($id) {
            $mailObject = Mail::model()->findByPk($id);
            $toUserId = $mailObject->to_user_id;
            if ($loggedInUserId == $toUserId) {
                $mailObject->status = 1;
                $mailObject->save(false);
            }
            $this->render('view', array(
                'mailObject' => $mailObject,
            ));
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Mail;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Mail'])) {
            $model->attributes = $_POST['Mail'];
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

        if (isset($_POST['Mail'])) {
            $model->attributes = $_POST['Mail'];
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
     * Get the reservation status
     * 
     * @param type $data 
     * @param type $row
     */
    public function convertDate($data, $row) {
        echo date("d M Y g:i A", strtotime($data->updated_at));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Mail('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Mail']))
            $model->attributes = $_GET['Mail'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Mail the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Mail::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Mail $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'mail-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
