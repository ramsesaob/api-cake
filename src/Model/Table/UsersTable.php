<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @property \App\Model\Table\BODEGAPEDSTable&\Cake\ORM\Association\HasMany $BODEGAPEDS
 * @property \App\Model\Table\BODEGAPEDSAuxTable&\Cake\ORM\Association\HasMany $BODEGAPEDSAux
 * @property \App\Model\Table\RecibopedsTable&\Cake\ORM\Association\HasMany $Recibopeds
 * @property \App\Model\Table\BodegaRespaldoTable&\Cake\ORM\Association\HasMany $BodegaRespaldo
 * @property \App\Model\Table\OrdensTable&\Cake\ORM\Association\HasMany $Ordens
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UsersTable extends Table
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

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Sucursales', [
            'foreignKey' => 'sucursale_id',
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
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('username')
            ->maxLength('username', 50)
            ->requirePresence('username', 'create')
            ->notEmptyString('username');

        $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->notEmptyString('password');

        $validator
            ->scalar('password_confirm')
            ->maxLength('password_confirm', 255)
            ->requirePresence('password_confirm', 'create')
            ->notEmptyString('password_confirm');

        $validator
            ->scalar('role')
            ->maxLength('role', 20)
            ->allowEmptyString('role');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->scalar('nombre')
            ->maxLength('nombre', 50)
            ->requirePresence('nombre', 'create')
            ->notEmptyString('nombre');

        $validator
            ->scalar('vendedor')
            ->maxLength('vendedor', 50)
            ->requirePresence('vendedor', 'create')
            ->notEmptyString('vendedor');

        $validator
            ->scalar('telefonovend')
            ->maxLength('telefonovend', 50)
            ->allowEmptyString('telefonovend');

        $validator
            ->scalar('telefonoana')
            ->maxLength('telefonoana', 50)
            ->allowEmptyString('telefonoana');

        $validator
            ->scalar('userbod')
            ->maxLength('userbod', 50)
            ->allowEmptyString('userbod');

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
        $rules->add($rules->isUnique(['username']));

        return $rules;
    }
}
