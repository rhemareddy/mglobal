<?php

/**
 * This is the model class for table "user_profile".
 *
 * The followings are the available columns in table 'user_profile':
 * @property integer $id
 * @property integer $user_id
 * @property string $address
 * @property string $street
 * @property integer $city_id
 * @property integer $state_id
 * @property integer $country_id
 * @property string $zip_code
 * @property string $id_proof
 * @property string $address_proff
 * @property integer $referral_banner_id
 * @property string $testimonials
 * @property integer $status
 * @property string $created_at
 * @property string $updated_at
 */
class UserProfile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user_profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, street, city_name, state_name, country_id, zip_code, id_proof, address_proff, referral_banner_id, testimonials,testimonial_status,document_status, status, created_at, updated_at', 'required'),
			array('user_id, city_name, state_name, country_id, referral_banner_id, status', 'numerical', 'integerOnly'=>true),
			array('address', 'length', 'max'=>255),
			array('street, id_proof, address_proff', 'length', 'max'=>100),
			array('zip_code', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, user_id, address, street, city_name, state_name, country_id, zip_code, id_proof, address_proff, referral_banner_id, testimonials,testimonial_status,document_status, status, created_at, updated_at', 'safe', 'on'=>'search'),
		        array('image', 'file','types'=>'jpg, gif, png', 'allowEmpty'=>false, 'on'=>'insert,update'),
                    );
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
                    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		    'country' => array(self::BELONGS_TO, 'Country', 'id'),
                   
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
			'address' => 'Address',
			'street' => 'Street',
			'city_name' => 'City',
			'state_name' => 'State',
			'country_id' => 'Country',
			'zip_code' => 'Zip Code',
			'id_proof' => 'Id Proof',
			'address_proff' => 'Address Proff',
			'referral_banner_id' => 'Referral Banner',
			'testimonials' => 'Testimonials',
                        'testimonial_status'=> 'Testimonial Status',
                        'document_status'=> 'Document Status',
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
		$criteria->compare('address',$this->address,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('city_name',$this->city_name);
		$criteria->compare('state_name',$this->state_name);
		$criteria->compare('country_id',$this->country_id);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('id_proof',$this->id_proof,true);
		$criteria->compare('address_proff',$this->address_proff,true);
		$criteria->compare('referral_banner_id',$this->referral_banner_id);
		$criteria->compare('testimonials',$this->testimonials,true);
                $criteria->compare('testimonial_status',$this->testimonial_status,true);
                $criteria->compare('document_status',$this->document_status,true);
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
	 * @return UserProfile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
