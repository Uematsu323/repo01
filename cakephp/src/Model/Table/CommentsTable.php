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
class CommentsTable extends AppTable
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->setTable('comments');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        parent::initialize($config);
    }

    public function getList()
    {
        return $this->find()
            ->where(['flag' => 2]);
    }

    public function getData($id)
    {
        return $this->find()
            ->where(['thread_id' => $id]);
    }

    public function getLikeData($id)
    {
        return $this->find()
            ->select(['flag','like'])
            ->where(['id' => $id])->first();
    }

    public function plusGoodsAndGetGoods($id)
    {
        $data = $this->find()
            ->where(['id' => $id])->first();
        $data->goods++;
        $this->save($data);
        return $data->goods;
    }

    public function register($entity)
    {
        // $entity = $this->newEntity($data);
        $this->save($entity);
    }

    public function validationDefault(Validator $validator)
    {
        $validator
            ->notEmpty('text','本文を入力してください');
        return $validator;
    }

}
