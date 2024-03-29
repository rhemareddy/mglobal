<?php

/**
 * This is the model class for table "wallet".
 *
 * The followings are the available columns in table 'wallet':
 * @property integer $id
 * @property integer $user_id
 * @property double $fund
 * @property integer $type
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class Wallet extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'wallet';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' user_id, fund, status, created_at, updated_at', 'required'),
			array('id, user_id, type, status', 'numerical', 'integerOnly'=>true),
			array('fund', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, fund, type, status, created_at, updated_at', 'safe', 'on'=>'search'),
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
			'fund' => 'Fund',
			'type' => '1:cash,2:RP Wallet,3:Commission',
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
		$criteria->compare('fund',$this->fund);
		$criteria->compare('type',$this->type);
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
	 * @return Wallet the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function findWalletByUserId($userid){
            return Wallet::model()->findAllByAttributes(array('user_id' => $userid));
        }
        
        public function create($userId,$fund,$type){
            $walletObject = new Wallet;
            $walletObject->user_id = $userId;
            $walletObject->fund = $fund;
            $walletObject->type = $type;
            $walletObject->status = 1;
            $walletObject->created_at = new CDbExpression('NOW()');
            $walletObject->updated_at = new CDbExpression('NOW()');
            if (!$walletObject->save()) {
                echo "<pre>";
                print_r($walletObject->getErrors());
                exit;
            }
            return $walletObject;
        }
}
