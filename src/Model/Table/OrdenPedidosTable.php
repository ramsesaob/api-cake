<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdenPedidos Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\OrdenItemsTable&\Cake\ORM\Association\HasMany $OrdenItems
 *
 * @method \App\Model\Entity\OrdenPedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdenPedido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrdenPedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdenPedido|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdenPedido saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdenPedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdenPedido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdenPedido findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdenPedidosTable extends Table
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

        $this->setTable('orden_pedidos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->hasMany('OrdenItems', [
            'foreignKey' => 'orden_pedido_id',
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
            ->integer('numero_ped')
            ->allowEmptyString('numero_ped');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 50)
            ->allowEmptyString('descripcion');

        $validator
            ->scalar('enviada')
            ->maxLength('enviada', 50)
            ->allowEmptyString('enviada');

        $validator
            ->scalar('Status_aprobada')
            ->maxLength('Status_aprobada', 50)
            ->allowEmptyString('Status_aprobada');

        $validator
            ->scalar('aprobada')
            ->maxLength('aprobada', 50)
            ->allowEmptyString('aprobada');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
