<?php

namespace Vovanmix\PhinxLaravelStyle;

use Phinx\Migration\AbstractMigration as PhinxAbstractMigration;

class AbstractMigration extends PhinxAbstractMigration
{


    /**
     * {@inheritdoc}
     */
    public function table($tableName, $options = array())
    {
        return new Table($tableName, $options, $this->getAdapter());
    }


    public function create($name, \Closure $closure)
    {
        $table = $this->table($name, ['id' => false, 'primary_key' => ['id']]);

        call_user_func($closure, $table);

        $table->create();
    }

    public function update($name, \Closure $closure)
    {
        $table = $this->table($name);

        call_user_func($closure, $table);

        $table->update();
    }
}