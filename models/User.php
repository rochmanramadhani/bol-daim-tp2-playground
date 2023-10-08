<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property int|null $role_id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $phone_number
 * @property string|null $sex
 * @property string|null $address
 * @property string|null $date_of_birth
 * @property string|null $password_hash
 *
 * @property Role $role
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['role_id'], 'integer'],
            [['address'], 'string'],
            [['date_of_birth'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['email'], 'string', 'max' => 50],
            [['phone_number'], 'string', 'max' => 14],
            [['sex'], 'string', 'max' => 10],
            [['password_hash'], 'string', 'max' => 30],
            [['role_id'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['role_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => 'Role ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'sex' => 'Sex',
            'address' => 'Address',
            'date_of_birth' => 'Date Of Birth',
            'password_hash' => 'Password Hash',
        ];
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'role_id']);
    }
}
