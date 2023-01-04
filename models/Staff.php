<?php

namespace app\models;

use borales\extensions\phoneInput\PhoneInputBehavior;
use borales\extensions\phoneInput\PhoneInputValidator;
use libphonenumber\PhoneNumberFormat;
use Yii;
use app\traits\{ SoftDeleteTrait, TimeStampsTrait, ValidationTrait };
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "{{%staff}}".
 *
 * @property int $id ID
 * @property string $staff_number Staff Number
 * @property string $staff_email Staff Email
 * @property string $first_name First Name
 * @property string $last_name Last Name
 * @property int $fk_user User ID
 * @property string $honorific Title/Honorific
 * @property string $full_name Full Name
 * @property string|null $staff_extension Staff Extension
 * @property string $country_code Country Code
 * @property int|null $phone_prefix Phone Prefix
 * @property int $phone_number Phone Number
 * @property int $fk_department Department ID
 * @property int $fk_position Job Position
 * @property int $fk_office Office ID
 * @property string $gender Gender
 * @property string $date_created Date Created
 * @property string|null $date_modified Date Modified
 * @property string|null $deleted_at Date Deleted
 *
 * @property Department $fkDepartment
 * @property Office $fkOffice
 * @property Position $fkPosition
 * @property User $fkUser
 * @property Gender $fkGender
 * @property-read array $allDepartments
 * @property-read array $allPositions
 * @property-read array $allOffices
 * @property-read array $allGenders
 * @property-read array $allHonorifics
 * @property Honorific $fkHonorific
 */
class Staff extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait, ValidationTrait;
    
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%staff}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => PhoneInputBehavior::className(),
                'phoneAttribute' => 'phone_number',
                'countryCodeAttribute' => 'country_code',
                'saveformat' => PhoneNumberFormat::INTERNATIONAL,
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['staff_number', 'staff_email', 'first_name', 'last_name', 'fk_user', 'honorific', 'full_name', 'country_code', 'phone_number', 'fk_department', 'fk_position', 'fk_office', 'gender'], 'required'],
            [['fk_user', 'phone_prefix', 'fk_department', 'fk_position', 'fk_office', 'country_code'], 'integer'],
            [['phone_number'], 'string'],
            [['phone_number'], PhoneInputValidator::class],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['staff_number'], 'string', 'max' => 6],
            [['staff_email', 'full_name'], 'string', 'max' => 50],
            [['first_name', 'last_name'], 'string', 'max' => 30],
            [['honorific'], 'string', 'max' => 10],
            [['staff_extension'], 'string', 'max' => 5],
//            [['country_code'], 'string', 'max' => 4],
            [['gender'], 'string', 'max' => 20],
            [['staff_number'], 'unique'],
            [['staff_email'], 'unique'],
//            [['country_code'], 'unique'],
            [['phone_number'], 'unique'],
//            [['phone_prefix'], 'unique'],
            [['fk_department'], 'exist', 'skipOnError' => true, 'targetClass' => Department::class, 'targetAttribute' => ['fk_department' => 'id']],
            [['gender'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::class, 'targetAttribute' => ['gender' => 'slug']],
            [['honorific'], 'exist', 'skipOnError' => true, 'targetClass' => Honorific::class, 'targetAttribute' => ['honorific' => 'abbreviation']],
            [['fk_office'], 'exist', 'skipOnError' => true, 'targetClass' => Office::class, 'targetAttribute' => ['fk_office' => 'id']],
            [['fk_position'], 'exist', 'skipOnError' => true, 'targetClass' => Position::class, 'targetAttribute' => ['fk_position' => 'id']],
            [['fk_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['fk_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => 'ID',
            'staff_number' => 'Staff Number',
            'staff_email' => 'Staff Email',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'fk_user' => 'User',
            'honorific' => 'Title/Honorific',
            'full_name' => 'Full Name',
            'staff_extension' => 'Staff Extension',
            'country_code' => 'Country Code',
            'phone_prefix' => 'Phone Prefix',
            'phone_number' => 'Phone Number',
            'fk_department' => 'Department',
            'fk_position' => 'Job Position',
            'fk_office' => 'Office',
            'gender' => 'Gender',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }

    /**
     * Gets query for [[FkDepartment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkDepartment(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Department::class, ['id' => 'fk_department']);
    }

    /**
     * Gets query for [[FkOffice]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkOffice(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Office::class, ['id' => 'fk_office']);
    }

    /**
     * Gets query for [[FkPosition]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkPosition(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Position::class, ['id' => 'fk_position']);
    }

    /**
     * Gets query for [[FkUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkUser(): \yii\db\ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'fk_user']);
    }

    /**
     * Gets query for [[Gender0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkGender(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Gender::class, ['slug' => 'gender']);
    }

    /**
     * Gets query for [[Honorific0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkHonorific(): \yii\db\ActiveQuery
    {
        return $this->hasOne(Honorific::class, ['abbreviation' => 'honorific']);
    }
    
    public function getAllDepartments(): array
    {
        $departments = ArrayHelper::map(Department::find()->all(), 'id', 'name');
        return ArrayHelper::merge(['' => ''], $departments);
    }
    
    public function getAllOffices(): array
    {
        $offices = ArrayHelper::map(Office::find()->all(), 'id', 'office_name');
        return ArrayHelper::merge(['' => ''], $offices);
    }
    
    public function getAllGenders(): array
    {
        $genders = ArrayHelper::map(Gender::find()->all(), 'slug', 'name');
        return ArrayHelper::merge(['' => ''], $genders);
    }
    
    public function getAllHonorifics(): array
    {
        $genders = ArrayHelper::map(Honorific::find()->all(), 'abbreviation', function ($data){
            return "{$data['name']} - {$data['abbreviation']}";
        });
        return ArrayHelper::merge(['' => ''], $genders);
    }

    public function getAllPositions(): array
    {
        $genders = ArrayHelper::map(Position::find()->all(), 'id', 'name');
        return ArrayHelper::merge(['' => ''], $genders);
    }

}
