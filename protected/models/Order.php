<?php

/**
 * This is the model class for table "order".
 *
 * The followings are the available columns in table 'order':
 * @property integer $id
 * @property integer $user_id
 * @property integer $package_id
 * @property integer $transaction_id
 * @property string $web_builder_url
 * @property string $start_date
 * @property string $end_date
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Order extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, package_id, transaction_id, web_builder_url,domain,domain_price, start_date, end_date, created_at, updated_at', 'required'),
			array('user_id, package_id, transaction_id, status,templateId', 'numerical', 'integerOnly'=>true),
			array('web_builder_url', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, package_id, transaction_id, web_builder_url,domain,domain_price, start_date, end_date, status, created_at, updated_at,templateId', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array( 
                    'package' => array(self::BELONGS_TO, 'Package', 'package_id'),
                    'transaction' => array(self::BELONGS_TO, 'Transaction', 'transaction_id'),
		    'gateway' => array(self::BELONGS_TO, 'Gateway', 'gateway_id'),
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                    'builder' => array(self::BELONGS_TO, 'UserHasTemplate', 'order_id'),
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'package_id' => 'Package',
			'transaction_id' => 'Transaction',
			'web_builder_url' => 'Web Builder Url',
                        'domain' => 'Domain',
                        'domain_price' => 'Domain Price',
                        'templateId'=>'templateId',
			'start_date' => 'Start Date',
			'end_date' => 'End Date',
			'status' => 'Status',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('package_id',$this->package_id);
		$criteria->compare('transaction_id',$this->transaction_id);
		$criteria->compare('web_builder_url',$this->web_builder_url,true);
                $criteria->compare('domain',$this->domain,true);
                $criteria->compare('domain_price',$this->domain_price,true);
                $criteria->compare('templateId',$this->templateId,true);
                $criteria->compare('start_date',$this->start_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('created_at',$this->created_at,true);
		$criteria->compare('updated_at',$this->updated_at,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Order the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getOrderById($id){
             return Order::model()->findByPk($id);
        }
        public function getOrderByValue($field, $value){
             return Order::model()->findByAttributes(array($field => $value ));
        }
        
        public function addEdit($orderObject,$orderArray) {
             
            try {
                if($orderArray['transaction_id']){
                    $transactionId = $orderArray['transaction_id'];
                }
                if($orderArray['user_id']){
                    $userId = $orderArray['user_id'];
                }
                $domainPrice = 0;
                if($orderArray['domain_price']){
                    $domainPrice = $orderArray['domain_price'];
                }
                if($orderArray['domain']){
                    $domain = $orderArray['domain'];
                }
                if($orderArray['package_id']){
                    $packageId = $orderArray['package_id'];
                }
                $templateId = "";
                if($orderArray['templateId']){
                    $templateId = $orderArray['templateId'];
                }
            
                $orderObject->user_id = $userId;
                $orderObject->package_id = $packageId;
                $orderObject->domain = $domain;
                $orderObject->domain_price = $domainPrice;
                $orderObject->transaction_id = $transactionId;
                $orderObject->status = 0;
                $orderObject->templateId = $templateId;
                $orderObject->start_date = new CDbExpression('NOW()');
                $orderObject->end_date = new CDbExpression('NOW()');
                $orderObject->created_at = new CDbExpression('NOW()');
                $orderObject->updated_at = new CDbExpression('NOW()');
                $orderObject->save(false);
            } catch (Exception $ex) {
                echo $ex->getMessage();exit;
            }
        }
            
           public function fetchTotalAmount($records)
           {
             $total=0;
             foreach($records as $record)
             $total += $record->package->amount*5/100;
             return $total;
           }  
            
         
}
