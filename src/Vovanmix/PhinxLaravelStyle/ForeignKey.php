<?php

namespace Vovanmix\PhinxLaravelStyle;

class ForeignKey extends \Phinx\Db\Table\ForeignKey
{

    public function references($field)
    {
        $this->setReferencedColumns([$field]);
        return $this;
    }

    public function on($table)
    {
        if ($table instanceof Table) {
            $this->setReferencedTable($table);
        } else {
            $this->setReferencedTable(new Table($table, array()));//, $this->adapter));
        }
        return $this;
    }

    public function onDelete($behaviour)
    {
        $this->setOnDelete($behaviour);
        return $this;
    }

    public function onUpdate($behaviour)
    {
        $this->setOnUpdate($behaviour);
        return $this;
    }

}