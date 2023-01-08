<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use app\traits\{SoftDeleteTrait, TimeStampsTrait};

/**
 * This is the model class for table "{{%auth}}".
 *
 * @property int $id ID
 * @property int $fk_user
 * @property string $source
 * @property string $source_id
 *
 * @property User $fkUser
 */
class Auth extends ActiveRecord
{
    use SoftDeleteTrait, TimeStampsTrait;
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%auth}}';
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['fk_user', 'source', 'source_id'], 'required'],
            [['fk_user'], 'integer'],
            [['date_created', 'date_modified', 'deleted_at'], 'safe'],
            [['source', 'source_id'], 'string', 'max' => 255],
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
            'fk_user' => 'Fk User',
            'source' => 'Source',
            'source_id' => 'Source ID',
            'date_created' => 'Date Created',
            'date_modified' => 'Date Modified',
            'deleted_at' => 'Date Deleted',
        ];
    }
    
    /**
     * Gets query for [[FkUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFkUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'fk_user']);
    }
}
