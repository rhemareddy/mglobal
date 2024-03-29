<?php

/**
 * This is the model class for table "transaction".
 *
 * The followings are the available columns in table 'transaction':
 * @property integer $id
 * @property integer $user_id
 * @property string $mode
 * @property integer $gateway_id
 * @property integer $actual_amount
 * @property integer $paid_amount
 * @property integer $total_rp
 * @property integer $used_rp
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Transaction extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'transaction';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, transaction_id,mode, gateway_id, actual_amount, paid_amount,coupon_discount, status, created_at, updated_at', 'required'),
			array('user_id, gateway_id, status', 'numerical', 'integerOnly'=>true),
			array('mode', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id,transaction_id, mode, gateway_id, actual_amount, paid_amount,coupon_discount,coupon_code, total_rp, used_rp, status, created_at, updated_at', 'safe', 'on'=>'search'),
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
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
                    'moneytransfer' => array(self::BELONGS_TO, 'MoneyTransfer', 'id'),
                    'gateway' => array(self::BELONGS_TO, 'Gateway', 'gateway_id'),
                     
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
                        'transaction_id'=>'Transaction ID',
			'mode' => 'Mode',
			'gateway_id' => 'Gateway',
			'actual_amount' => 'Actual Amount',
			'paid_amount' => 'Paid Amount',
                        'coupon_code'=>'Coupon Code',
                        'coupon_discount'=>'Coupon',
			'total_rp' => 'Total Rp',
			'used_rp' => 'Used Rp',
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
                $criteria->compare('transaction_id',$this->transaction_id);
		$criteria->compare('mode',$this->mode,true);
		$criteria->compare('gateway_id',$this->gateway_id);
		$criteria->compare('actual_amount',$this->actual_amount);
		$criteria->compare('paid_amount',$this->paid_amount);
                $criteria->compare('coupon_code',$this->coupon_code);
                $criteria->compare('coupon_discount',$this->coupon_discount);
                $criteria->compare('total_rp',$this->total_rp);
		$criteria->compare('used_rp',$this->used_rp);
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
	 * @return Transaction the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
         
        public function createTransaction($postDataArray, $userObject,$role=''){
            $transferAmount = $postDataArray['paid_amount'];
            $percentage = 0;
            $status = 0;
            if(empty($role)) {
                $percentage = BaseClass::getPercentage($transferAmount,1);
            }
            
            if(!empty($role)) {
                $status = 1;
            }
            
            $discountAmount = 0;
            if(!empty($postDataArray['discount'])){
               $discountAmount = $postDataArray['discount'];
            }
            $gatewayId = 1;
            if(!empty($postDataArray['gatewayId'])){
                $gatewayId = $postDataArray['gatewayId'];
            }
            $userRp = 0;
            if(!empty($postDataArray['used_rp'])){
                $userRp = $postDataArray['used_rp'];
            }
            $mode = 'transfer';
            if(!empty($postDataArray['mode'])){
                $mode = $postDataArray['mode'];
            }
            $createdTime = new CDbExpression('NOW()');
            $tarnsactionID = BaseClass::gettransactionID();
            $transactionObjuser = new Transaction;
            $transactionObjuser->user_id = $userObject->id;
            $transactionObjuser->transaction_id = $tarnsactionID;
            $transactionObjuser->mode = $mode;
            $transactionObjuser->gateway_id = $gatewayId;
            $transactionObjuser->coupon_discount = $discountAmount;
            $transactionObjuser->actual_amount = $transferAmount;
            $transactionObjuser->paid_amount = ($transferAmount+$percentage);
            $transactionObjuser->used_rp = $userRp; //change this to current Used RPs
            $transactionObjuser->status = $status;//pending
            $transactionObjuser->created_at = $createdTime;
            $transactionObjuser->updated_at = $createdTime;
            if (!$transactionObjuser->save()) {
                echo "<pre>";
                print_r($transactionObjuser->getErrors());
                exit;
            }
            return $transactionObjuser;
        }
        
        public function createTransactionPackage($transactionObject,$transactionArray){
             
            try {
                if($transactionArray['transactionId']){
                    $transactionId = $transactionArray['transactionId'];
                }
                
                if($transactionArray['userId']){
                    $userId = $transactionArray['userId'];
                }
                if($transactionArray['mode']){
                    $mode = $transactionArray['mode'];
                }
                if($transactionArray['actualAmount']){
                    $actualAmount = $transactionArray['actualAmount'];
                }
                if($transactionArray['paidAmount']){
                    $paidAmount = $transactionArray['paidAmount'];
                }
                $couponDiscount = 0;
                if($transactionArray['couponDiscount']){
                    $couponDiscount = $transactionArray['couponDiscount'];
                }
                $couponId = 0;
                if($transactionArray['couponId']){
                    $couponId = $transactionArray['couponId'];
                }
            $transactionObject->user_id = $userId;
            $transactionObject->transaction_id = $transactionId;
            $transactionObject->mode = $mode;
            $transactionObject->actual_amount = $actualAmount;
            $transactionObject->paid_amount = $paidAmount;
            $transactionObject->coupon_discount = $couponDiscount;
            $transactionObject->coupon_code = $couponId;
            $transactionObject->total_rp = 0;
            $transactionObject->used_rp = 0;
            $transactionObject->status = 0;
            $transactionObject->gateway_id = 1;
            $transactionObject->created_at = new CDbExpression('NOW()');
            $transactionObject->save(false);  
            }catch (Exception $ex) {
                echo $ex->getMessage();exit;
            }
        }
}
