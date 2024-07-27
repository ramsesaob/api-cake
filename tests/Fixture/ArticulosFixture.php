<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ArticulosFixture
 */
class ArticulosFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'departamento' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'categoria' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'codigo' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'descripcion' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'cantidad' => ['type' => 'string', 'length' => 150, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
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
                'departamento' => 'Lorem ipsum dolor sit amet',
                'categoria' => 'Lorem ipsum dolor sit amet',
                'codigo' => 'Lorem ipsum dolor sit amet',
                'descripcion' => 'Lorem ipsum dolor sit amet',
                'cantidad' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
