<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CallesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CallesTable Test Case
 */
class CallesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CallesTable
     */
    public $Calles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.calles',
        'app.direccions',
        'app.provincias',
        'app.departamentos',
        'app.distritos'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Calles') ? [] : ['className' => CallesTable::class];
        $this->Calles = TableRegistry::get('Calles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Calles);

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
}
