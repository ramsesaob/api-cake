<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Articulos Model
 *
 * @property \App\Model\Table\OrdenItemsTable&\Cake\ORM\Association\HasMany $OrdenItems
 *
 * @method \App\Model\Entity\Articulo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Articulo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Articulo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Articulo|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Articulo saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Articulo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Articulo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Articulo findOrCreate($search, callable $callback = null, $options = [])
 */
class ArticulosTable extends Table
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

        $this->setTable('articulos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('OrdenItems', [
            'foreignKey' => 'articulo_id',
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
            ->scalar('departamento')
            ->maxLength('departamento', 150)
            ->allowEmptyString('departamento');

        $validator
            ->scalar('categoria')
            ->maxLength('categoria', 150)
            ->allowEmptyString('categoria');

        $validator
            ->scalar('codigo')
            ->maxLength('codigo', 150)
            ->allowEmptyString('codigo');

        $validator
            ->scalar('descripcion')
            ->maxLength('descripcion', 150)
            ->allowEmptyString('descripcion');

        $validator
            ->scalar('cantidad')
            ->maxLength('cantidad', 150)
            ->allowEmptyString('cantidad');

        return $validator;
    }
}
