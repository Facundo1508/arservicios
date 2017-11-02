<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Usuarios Model
 *
 * @property \App\Model\Table\RolsTable|\Cake\ORM\Association\BelongsTo $Rols
 * @property \App\Model\Table\GenerosTable|\Cake\ORM\Association\BelongsTo $Generos
 * @property \App\Model\Table\UsuarioserviciosTable|\Cake\ORM\Association\HasMany $Usuarioservicios
 *
 * @method \App\Model\Entity\Usuario get($primaryKey, $options = [])
 * @method \App\Model\Entity\Usuario newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Usuario[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Usuario|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Usuario patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Usuario findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsuariosTable extends Table
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

        $this->setTable('usuarios');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Rols', [
            'foreignKey' => 'rol_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Generos', [
            'foreignKey' => 'genero_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Usuarioservicios', [
            'foreignKey' => 'usuario_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('nombre')
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->scalar('apellido')
            ->requirePresence('apellido', 'create')
            ->notEmpty('apellido');

        $validator
            ->integer('telefono')
            ->requirePresence('telefono', 'create')
            ->notEmpty('telefono');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('nombre_usuario')
            ->requirePresence('nombre_usuario', 'create')
            ->notEmpty('nombre_usuario');

        $validator
            ->scalar('contraseña')
            ->requirePresence('contraseña', 'create')
            ->notEmpty('contraseña');

        $validator
            ->boolean('activo')
            ->requirePresence('activo', 'create')
            ->notEmpty('activo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['rol_id'], 'Rols'));
        $rules->add($rules->existsIn(['genero_id'], 'Generos'));

        return $rules;
    }
}
