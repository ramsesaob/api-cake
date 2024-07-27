<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BodegapedsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BodegapedsTable Test Case
 */
class BodegapedsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BodegapedsTable
     */
    public $Bodegapeds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Bodegapeds',
        'app.ARTICULOS',
        'app.Users',
        'app.PEDIDOS',
        'app.OrdenItems',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Bodegapeds') ? [] : ['className' => BodegapedsTable::class];
        $this->Bodegapeds = TableRegistry::getTableLocator()->get('Bodegapeds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bodegapeds);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
