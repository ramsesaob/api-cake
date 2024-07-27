<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BodegapedsFixture
 */
class BodegapedsFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CODIGO' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'BODEGA' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'EXISTENCIA' => ['type' => 'decimal', 'length' => 30, 'precision' => 2, 'null' => false, 'default' => null, 'comment' => null, 'unsigned' => null],
        'articulo_id' => ['type' => 'integer', 'length' => 10, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'DESCRIPCION' => ['type' => 'string', 'length' => 255, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'VENTA' => ['type' => 'decimal', 'length' => 12, 'precision' => 3, 'null' => true, 'default' => null, 'comment' => null, 'unsigned' => null],
        'ESTATUS' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'SELECCIONADO' => ['type' => 'string', 'length' => 2, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'user_id' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'descmax' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'cantped' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'empaque' => ['type' => 'decimal', 'length' => 5, 'precision' => 0, 'null' => true, 'default' => null, 'comment' => null, 'unsigned' => null],
        'cif' => ['type' => 'decimal', 'length' => 12, 'precision' => 3, 'null' => true, 'default' => null, 'comment' => null, 'unsigned' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'FK_BODEGAPEDS_ARTICULOS' => ['type' => 'foreign', 'columns' => ['articulo_id'], 'references' => ['ARTICULOS', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'FK_BODEGAPEDS_users' => ['type' => 'foreign', 'columns' => ['user_id'], 'references' => ['users', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'CODIGO' => 'Lorem ip',
                'BODEGA' => 1,
                'EXISTENCIA' => 1.5,
                'articulo_id' => 1,
                'DESCRIPCION' => 'Lorem ipsum dolor sit amet',
                'VENTA' => 1.5,
                'ESTATUS' => 'Lo',
                'SELECCIONADO' => 'Lo',
                'user_id' => 1,
                'descmax' => 1,
                'cantped' => 1,
                'empaque' => 1.5,
                'cif' => 1.5,
            ],
        ];
        parent::init();
    }
}
