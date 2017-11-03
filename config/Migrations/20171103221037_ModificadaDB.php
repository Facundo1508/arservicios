<?php
use Migrations\AbstractMigration;

class ModificadaDB extends AbstractMigration
{

    public function up()
    {

        $this->table('usuarios')
            ->changeColumn('telefono', 'integer', [
                'default' => null,
                'limit' => 13,
                'null' => false,
            ])
            ->update();
    }

    public function down()
    {

        $this->table('usuarios')
            ->changeColumn('telefono', 'integer', [
                'default' => null,
                'length' => 12,
                'null' => false,
            ])
            ->update();
    }
}

