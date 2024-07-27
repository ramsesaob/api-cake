<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdenItemsFixture
 */
class OrdenItemsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'articulo_id' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'orden_pedido_id' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'comentario' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'cantidad' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_OrdenItems_articulos' => ['type' => 'foreign', 'columns' => ['articulo_id'], 'references' => ['articulos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_OrdenItems_OrdenPedidos' => ['type' => 'foreign', 'columns' => ['orden_pedido_id'], 'references' => ['Orden_Pedidos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'articulo_id' => 1,
                'created' => 1720535702,
                'modified' => 1720535702,
                'orden_pedido_id' => 1,
                'comentario' => 'Lorem ipsum dolor sit amet',
                'cantidad' => 1,
            ],
        ];
        parent::init();
    }
}
