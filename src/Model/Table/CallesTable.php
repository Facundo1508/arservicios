<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calles Model
 *
 * @property \App\Model\Table\DireccionsTable|\Cake\ORM\Association\HasMany $Direccions
 *
 * @method \App\Model\Entity\Calle get($primaryKey, $options = [])
 * @method \App\Model\Entity\Calle newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Calle[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Calle|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Calle patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Calle[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Calle findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CallesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('calles');

        $this->addBehavior('Timestamp');

        $this->hasMany('Direccions', [
            'foreignKey' => 'calle_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->requirePresence('id', 'create')
            ->notEmpty('id');

        $validator
            ->scalar('nombre')
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        return $validator;
    }
}
