<?php

use Vovanmix\PhinxLaravelStyle\AbstractMigration;
use Vovanmix\PhinxLaravelStyle\Table;

/**
 * Class CreateUsersTable
 */
class CreateUsersTable extends AbstractMigration
{

    /**
     * Create
     * 
     * @return void
     */
    public function change()
    {

        $this->create(
            'table_name', function (Table $table) {
                $table->increments('id');
                $table->timestamps();
            }
        );

        $this->update(
            'table_name', function (Table $table) {

            }
        );
    }

    /**
     * Up
     *
     * @return void
     */
    public function up()
    {

    }

    /**
     * Down
     *
     * @return void
     */
    public function down()
    {

    }

}
