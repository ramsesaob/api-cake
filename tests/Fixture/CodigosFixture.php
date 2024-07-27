<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CodigosFixture
 */
class CodigosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'CODIGO' => ['type' => 'integer', 'length' => 10, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'DESCRIPCION' => ['type' => 'string', 'length' => 30, 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'TIPO' => ['type' => 'string', 'length' => 1, 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'UBICACION' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
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
                'CODIGO' => 1,
                'DESCRIPCION' => 'Lorem ipsum dolor sit amet',
                'TIPO' => 'L',
                'UBICACION' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
