<?php
/**
 * Created by ssiva on 05/11/2022
 */
namespace app\models\query;

use yii\db\QueryBuilder;
use yii\db\ActiveQuery as BaseActiveQuery;

/**
 *
 * @property-read int $trashed
 */
class ActiveQuery extends BaseActiveQuery
{
    const WITH_TRASHED = 0;
    const WITHOUT_TRASHED = 1;
    const ONLY_TRASHED = 2;
    
    /**
     * @var string
     */
    public string $deletedAtAttribute = 'deleted_at';
    /**
     * @var int
     */
    private $_trashed;
    
    /**
     * @param QueryBuilder $builder
     * @return $this|\yii\db\Query
     */
    public function prepare($builder)
    {
        $query = parent::prepare($builder);
        switch ($this->getTrashed()) {
            case static::WITHOUT_TRASHED:
                $query->andWhere(['is', $this->deletedAtAttribute, null]);
                break;
            case static::ONLY_TRASHED:
                $query->andWhere(['!=', $this->deletedAtAttribute, '']);
                break;
            case static::WITH_TRASHED: // No break;
            default:
                break;
        }
        
        return $query;
    }
    
    public function withTrashed()
    {
        $this->_trashed = static::WITH_TRASHED;
        
        return $this;
    }
    
    public function withoutTrashed()
    {
        $this->_trashed = static::WITHOUT_TRASHED;
        
        return $this;
    }
    
    public function onlyTrashed()
    {
        $this->_trashed = static::ONLY_TRASHED;
        
        return $this;
    }
    
    public function getTrashed()
    {
        if ($this->_trashed === null) {
            $this->_trashed = static::WITHOUT_TRASHED;
        }
        
        return $this->_trashed;
    }
}