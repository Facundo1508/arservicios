<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsuarioserviciosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UsuarioserviciosTable Test Case
 */
class UsuarioserviciosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UsuarioserviciosTable
     */
    public $Usuarioservicios;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.usuarioservicios',
        'app.usuarios',
        'app.rols',
        'app.generos',
        'app.servicios',
        'app.categorias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Usuarioservicios') ? [] : ['className' => UsuarioserviciosTable::class];
        $this->Usuarioservicios = TableRegistry::get('Usuarioservicios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Usuarioservicios);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
