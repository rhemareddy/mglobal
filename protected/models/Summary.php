<?php

/**
 * This is the model class for table "summary".
 *
 * The followings are the available columns in table 'summary':
 * @property integer $id
 * @property integer $user_id
 * @property string $date
 * @property integer $transaction_id
 * @property integer $wallet_type
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Summary extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'summary';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, date, transaction_id, wallet_type, status, created_at, updated_at', 'required'),
			array('user_id, transaction_id, wallet_type, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, date, transaction_id, wallet_type, status, created_at, updated_at', 'safe', 'on'=>'search'),
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
                    'transaction' => array(self::BELONGS_TO, 'Transaction', 'transaction_id'),
                    'moneytransfer' => array(self::BELONGS_TO, 'MoneyTransfer', 'money_transfer_id'),
                    'wallet' => array(self::BELONGS_TO, 'Wallet', 'wallet_id'),
                    'package' => array(self::BELONGS_TO, 'Package', 'package_id'),
                    'order' => array(self::BELONGS_TO, 'Order', 'user_id'),
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
			'date' => 'Date',
			'transaction_id' => 'Transaction',
			'wallet_type' => 'Wallet Type',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('transaction_id',$this->transaction_id);
		$criteria->compare('wallet_type',$this->wallet_type);
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
	 * @return Summary the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
