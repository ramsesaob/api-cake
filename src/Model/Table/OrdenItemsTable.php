<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdenItems Model
 *
 * @property \App\Model\Table\ArticulosTable&\Cake\ORM\Association\BelongsTo $Articulos
 * @property \App\Model\Table\OrdenPedidosTable&\Cake\ORM\Association\BelongsTo $OrdenPedidos
 *
 * @method \App\Model\Entity\OrdenItem get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdenItem newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\OrdenItem[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdenItem|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdenItem saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdenItem patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdenItem[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdenItem findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OrdenItemsTable extends Table
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

        $this->setTable('orden_items');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Articulos', [
            'foreignKey' => 'articulo_id',
        ]);
        $this->belongsTo('OrdenPedidos', [
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
            ->scalar('comentario')
            ->maxLength('comentario', 50)
            ->allowEmptyString('comentario');

        $validator
            ->integer('cantidad')
            ->allowEmptyString('cantidad');

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
        $rules->add($rules->existsIn(['articulo_id'], 'Articulos'));
        $rules->add($rules->existsIn(['orden_pedido_id'], 'OrdenPedidos'));

        return $rules;
    }
}
