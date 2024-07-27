<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sucursales Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\HasMany $Users
 *
 * @method \App\Model\Entity\Sucursale get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sucursale newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Sucursale[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sucursale|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sucursale saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sucursale patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sucursale[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sucursale findOrCreate($search, callable $callback = null, $options = [])
 */
class SucursalesTable extends Table
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

        $this->setTable('sucursales');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Users', [
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
            ->scalar('codigo')
            ->maxLength('codigo', 150)
            ->allowEmptyString('codigo');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 50)
            ->allowEmptyString('descripcion');

        return $validator;
    }
}
