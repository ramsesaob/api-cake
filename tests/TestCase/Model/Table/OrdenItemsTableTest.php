<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\OrdenItemsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\OrdenItemsTable Test Case
 */
class OrdenItemsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\OrdenItemsTable
     */
    public $OrdenItems;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.OrdenItems',
        'app.Articulos',
        'app.OrdenPedidos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('OrdenItems') ? [] : ['className' => OrdenItemsTable::class];
        $this->OrdenItems = TableRegistry::getTableLocator()->get('OrdenItems', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->OrdenItems);

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
