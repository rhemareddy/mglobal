<?php

class BuildTempController extends Controller
{
   
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='user';

 	
    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'templates','usertemplates','managewebsite'),
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
    
     public function actionIndex()
	{
		$this->render('index');
	}
        
        /*
         * Function to fetch templates
         */
        
        public function actionTemplates()
        {
            $builderObject = BuildTemp::model()->findAll(array('condition'=>'screenshot != ""'));
            $this->render('templates',array('builderObject'=> $builderObject));
        }
        
        public function actionUserTemplates()
        {
            $builderObject = BuildTemp::model()->findByAttributes(array('template_id'=>'35'));
            $this->renderPartial('user_templates',array('builderObject'=> $builderObject));
        }
        
        public function actionManageWebsite()
        {
            
            
        }
    
             
        

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}