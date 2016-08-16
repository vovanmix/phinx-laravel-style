<?php

namespace Vovanmix\PhinxLaravelStyle;

use Phinx\Db\Adapter\MysqlAdapter;
use \Phinx\Db\Table as PhinxTable;

class Table extends PhinxTable
{

    /**
     * Specify a unique index for the table.
     *
     * @param  string|array $columns
     * @return Index
     */
    public function unique($columns)
    {
        return $this->addIndex($columns, array('unique' => true));
    }

    /**
     * Specify an index for the table.
     *
     * @param  string|array $columns
     * @return Index
     */
    public function index($columns)
    {
        return $this->addIndex($columns);
    }

    /**
     * Specify a foreign key for the table.
     * @param $column
     * @return ForeignKey
     */
    public function foreign($column)
    {
        return $this->addForeignKeyNew($column);
    }

    /**
     * Create a new auto-incrementing integer (4-byte) column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function increments($column)
    {
        return $this->unsignedInteger($column, true)->setIdentity(true);
    }

    /**
     * Create a new auto-incrementing small integer (2-byte) column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function smallIncrements($column)
    {
        return $this->unsignedSmallInteger($column, true);
    }

    /**
     * Create a new auto-incrementing medium integer (3-byte) column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function mediumIncrements($column)
    {
        return $this->unsignedMediumInteger($column, true);
    }

    /**
     * Create a new auto-incrementing big integer (8-byte) column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function bigIncrements($column)
    {
        return $this->unsignedBigInteger($column, true);
    }

    /**
     * Create a new char column on the table.
     *
     * @param  string $column
     * @param  int $length
     * @return Column
     */
    public function char($column, $length = 255)
    {
        return $this->addColumnNew('char', $column, compact('length'));
    }

    /**
     * Create a new string column on the table.
     *
     * @param  string $column
     * @param  int $length
     * @return Column
     */
    public function string($column, $length = 255)
    {
        return $this->addColumnNew('string', $column, compact('length'));
    }

    /**
     * Create a new text column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function text($column)
    {
        return $this->addColumnNew('text', $column);
    }

    /**
     * Create a new medium text column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function mediumText($column)
    {
        return $this->addColumnNew('mediumText', $column, ['limit' => MysqlAdapter::TEXT_MEDIUM]);
    }

    /**
     * Create a new long text column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function longText($column)
    {
        //longText
        return $this->addColumnNew('text', $column, ['limit' => MysqlAdapter::TEXT_LONG]);
    }

    /**
     * Create a new integer (4-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @param  bool $unsigned
     * @return Column
     */
    public function integer($column, $autoIncrement = false, $unsigned = false)
    {
        $signed = !$unsigned;
        return $this->addColumnNew('integer', $column, compact('signed'));
    }

    /**
     * Create a new tiny integer (1-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @param  bool $unsigned
     * @return Column
     */
    public function tinyInteger($column, $autoIncrement = false, $unsigned = false)
    {
        $signed = !$unsigned;
        //tinyInteger
        $limit = MysqlAdapter::INT_TINY;
        return $this->addColumnNew('integer', $column, compact('limit', 'signed'));
    }

    /**
     * Create a new small integer (2-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @param  bool $unsigned
     * @return Column
     */
    public function smallInteger($column, $autoIncrement = false, $unsigned = false)
    {
        $signed = !$unsigned;
        //smallInteger
        $limit = MysqlAdapter::INT_SMALL;
        return $this->addColumnNew('integer', $column, compact('limit', 'signed'));
    }

    /**
     * Create a new medium integer (3-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @param  bool $unsigned
     * @return Column
     */
    public function mediumInteger($column, $autoIncrement = false, $unsigned = false)
    {
        $signed = !$unsigned;
        //mediumInteger
        $limit = MysqlAdapter::INT_MEDIUM;
        return $this->addColumnNew('integer', $column, compact('limit', 'signed'));
    }

    /**
     * Create a new big integer (8-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @param  bool $unsigned
     * @return Column
     */
    public function bigInteger($column, $autoIncrement = false, $unsigned = false)
    {
        $signed = !$unsigned;
        $limit = MysqlAdapter::INT_BIG;
        return $this->addColumnNew('bigInteger', $column, compact('limit', 'signed'));
    }

    /**
     * Create a new unsigned tiny integer (1-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @return Column
     */
    public function unsignedTinyInteger($column, $autoIncrement = false)
    {
        return $this->tinyInteger($column, $autoIncrement, true);
    }

    /**
     * Create a new unsigned small integer (2-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @return Column
     */
    public function unsignedSmallInteger($column, $autoIncrement = false)
    {
        return $this->smallInteger($column, $autoIncrement, true);
    }

    /**
     * Create a new unsigned medium integer (3-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @return Column
     */
    public function unsignedMediumInteger($column, $autoIncrement = false)
    {
        return $this->mediumInteger($column, $autoIncrement, true);
    }

    /**
     * Create a new unsigned integer (4-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @return Column
     */
    public function unsignedInteger($column, $autoIncrement = false)
    {
        return $this->integer($column, $autoIncrement, true);
    }

    /**
     * Create a new unsigned big integer (8-byte) column on the table.
     *
     * @param  string $column
     * @param  bool $autoIncrement
     * @return Column
     */
    public function unsignedBigInteger($column, $autoIncrement = false)
    {
        return $this->bigInteger($column, $autoIncrement, true);
    }

    /**
     * Create a new float column on the table.
     *
     * @param  string $column
     * @param  int $total
     * @param  int $places
     * @return Column
     */
    public function float($column, $total = 8, $places = 2)
    {
        return $this->addColumnNew('float', $column, compact('total', 'places'));
    }

    /**
     * Create a new double column on the table.
     *
     * @param  string $column
     * @param  int|null $total
     * @param  int|null $places
     * @return Column
     */
    public function double($column, $total = null, $places = null)
    {
        return $this->addColumnNew('double', $column, compact('total', 'places'));
    }

    /**
     * Create a new decimal column on the table.
     *
     * @param  string $column
     * @param  int $total
     * @param  int $places
     * @return Column
     */
    public function decimal($column, $total = 8, $places = 2)
    {
        return $this->addColumnNew('decimal', $column, compact('total', 'places'));
    }

    /**
     * Create a new boolean column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function boolean($column)
    {
        return $this->addColumnNew('boolean', $column)->unsigned();
    }

    /**
     * Create a new enum column on the table.
     *
     * @param  string $column
     * @param  array $allowed
     * @return Column
     */
    public function enum($column, array $allowed)
    {
        return $this->addColumnNew('enum', $column, compact('allowed'));
    }

    /**
     * Create a new json column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function json($column)
    {
        return $this->addColumnNew('json', $column);
    }

    /**
     * Create a new jsonb column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function jsonb($column)
    {
        return $this->addColumnNew('jsonb', $column);
    }

    /**
     * Create a new date column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function date($column)
    {
        return $this->addColumnNew('date', $column);
    }

    /**
     * Create a new date-time column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function dateTime($column)
    {
        return $this->addColumnNew('dateTime', $column);
    }

    /**
     * Create a new date-time column (with time zone) on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function dateTimeTz($column)
    {
        return $this->addColumnNew('dateTimeTz', $column);
    }

    /**
     * Create a new time column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function time($column)
    {
        return $this->addColumnNew('time', $column);
    }

    /**
     * Create a new time column (with time zone) on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function timeTz($column)
    {
        return $this->addColumnNew('timeTz', $column);
    }

    /**
     * Create a new timestamp column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function timestamp($column)
    {
        return $this->addColumnNew('timestamp', $column, array(
            'null' => false,
            'default' => '0000-00-00 00:00:00'
        ));
    }

    /**
     * Create a new timestamp (with time zone) column on the table.
     *
     * @param  string $column
     * @return Column
     */
    public function timestampTz($column)
    {
        return $this->addColumnNew('timestampTz', $column);
    }

    /**
     * Add nullable creation and update timestamps to the table.
     *
     * @return void
     */
    public function nullableTimestamps()
    {
        $this->timestamp('created_at')->nullable();

        $this->timestamp('updated_at')->nullable();
    }

    /**
     * Add creation and update timestamps to the table.
     *
     * @return void
     */
    public function timestamps()
    {
        $this->timestamp('created_at');

        $this->timestamp('updated_at');
    }

    /**
     * Add creation and update timestampTz columns to the table.
     *
     * @return void
     */
    public function timestampsTz()
    {
        $this->timestampTz('created_at');

        $this->timestampTz('updated_at');
    }

    /**
     * Add a table column.
     *
     * Type can be: string, text, integer, float, decimal, datetime, timestamp,
     * time, date, binary, boolean.
     *
     * Valid options can be: limit, default, null, precision or scale.
     *
     * @param string|Column $columnName Column Name
     * @param string $type Column Type
     * @param array $options Column Options
     * @throws \RuntimeException
     * @throws \InvalidArgumentException
     * @return Column
     */
    public function addColumnNew($type, $columnName, $options = array())
    {
        // we need an adapter set to add a column
        if (null === $this->getAdapter()) {
            throw new \RuntimeException('An adapter must be specified to add a column.');
        }

        // create a new column object if only strings were supplied
        if (!$columnName instanceof Column) {
            $column = new Column();
            $column->setName($columnName);
            $column->setType($type);
            $column->setOptions($options); // map options to column methods
        } else {
            $column = $columnName;
        }

        // Delegate to Adapters to check column type
        if (!$this->getAdapter()->isValidColumnType($column)) {
            throw new \InvalidArgumentException(sprintf(
                'An invalid column type "%s" was specified for column "%s".',
                $column->getType(),
                $column->getName()
            ));
        }

        $this->columns[] = $column;
//		return $this;
        return $column;
    }

    /**
     * Add an index to a database table.
     *
     * In $options you can specific unique = true/false or name (index name).
     *
     * @param string|array|Index $columns Table Column(s)
     * @param array $options Index Options
     * @return Index
     */
    public function addIndex($columns, $options = array())
    {
        // create a new index object if strings or an array of strings were supplied
        if (!$columns instanceof Index) {
            $index = new Index();
            if (is_string($columns)) {
                $columns = array($columns); // str to array
            }
            $index->setColumns($columns);
            $index->setOptions($options);
        } else {
            $index = $columns;
        }

        $this->indexes[] = $index;
        return $index;
    }

    /**
     * Add a foreign key to a database table.
     *
     * In $options you can specify on_delete|on_delete = cascade|no_action ..,
     * on_update, constraint = constraint name.
     *
     * @param string|array $columns Columns
     * @return ForeignKey
     */
    public function addForeignKeyNew($columns) //, $referencedTable, $referencedColumns = array('id'), $options = array())
    {
//		if (is_string($referencedColumns)) {
//			$referencedColumns = array($referencedColumns); // str to array
//		}
        $fk = new ForeignKey();
//		if ($referencedTable instanceof Table) {
//			$fk->setReferencedTable($referencedTable);
//		} else {
//			$fk->setReferencedTable(new Table($referencedTable, array(), $this->adapter));
//		}
        $fk->setColumns($columns);
//			->setReferencedColumns($referencedColumns)
//			->setOptions($options);
        $this->foreignKeys[] = $fk;

        return $fk;
    }

    public function addTimestamps()
    {

    }

}