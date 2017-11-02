<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DireccionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DireccionsTable Test Case
 */
class DireccionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DireccionsTable
     */
    public $Direccions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.direccions',
        'app.provincias',
        'app.departamentos',
        'app.distritos',
        'app.calles'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Direccions') ? [] : ['className' => DireccionsTable::class];
        $this->Direccions = TableRegistry::get('Direccions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Direccions);

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
