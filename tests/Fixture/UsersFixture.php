<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 10, 'autoIncrement' => true, 'null' => false, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null],
        'username' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'password' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'password_confirm' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'role' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'status' => ['type' => 'integer', 'length' => 10, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null, 'unsigned' => null, 'autoIncrement' => null],
        'nombre' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'vendedor' => ['type' => 'string', 'length' => 50, 'null' => false, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'created' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'modified' => ['type' => 'timestamp', 'length' => null, 'null' => true, 'default' => null, 'precision' => null, 'comment' => null],
        'telefonovend' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'telefonoana' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
        'userbod' => ['type' => 'string', 'length' => 50, 'null' => true, 'default' => null, 'collate' => 'Modern_Spanish_CI_AS', 'precision' => null, 'comment' => null, 'fixed' => null],
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
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'password_confirm' => 'Lorem ipsum dolor sit amet',
                'role' => 'Lorem ipsum dolor ',
                'status' => 1,
                'nombre' => 'Lorem ipsum dolor sit amet',
                'vendedor' => 'Lorem ipsum dolor sit amet',
                'created' => 1711025018,
                'modified' => 1711025018,
                'telefonovend' => 'Lorem ipsum dolor sit amet',
                'telefonoana' => 'Lorem ipsum dolor sit amet',
                'userbod' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
