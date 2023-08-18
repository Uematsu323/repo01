<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\ORM\TableRegistry;
use Cake\Validation\Validator;
use Cake\Datasource\ConnectionManager;

/**
 * Homes Model
 *
 * @method \App\Model\Entity\Home get($primaryKey, $options = [])
 * @method \App\Model\Entity\Home newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Home[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Home|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Home patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Home[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Home findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ThreadsTable extends AppTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->setTable('threads');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        parent::initialize($config);
    }