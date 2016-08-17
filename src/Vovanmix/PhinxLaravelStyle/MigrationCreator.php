<?php

namespace Vovanmix\PhinxLaravelStyle;

use Phinx\Migration\CreationInterface;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class MigrationCreator implements CreationInterface
{

    /**
     * Get the migration template.
     *
     * This will be the content that Phinx will amend to generate the migration file.
     *
     * @return string The content of the template for Phinx to amend.
     */
    public function getMigrationTemplate()
    {
//		global $argv;

        $template = 'default';
        $classes = [];
//
//		if(!empty($argv)) {
//			foreach ($argv as $arg) {
//				if (substr($arg, 0, 8) == '--table=') {
//					$classes['$tableName'] = substr($arg, 8);
//					$template = 'edit';
//				} elseif (substr($arg, 0, 9) == '--create=') {
//					$classes['$tableName'] = substr($arg, 9);
//					$template = 'create';
//				}
//			}
//		}

        $contents = file_get_contents(__DIR__ . '/migration_template_' . $template . '.php.dist');

        return strtr($contents, $classes);
    }

    /**
     * Post Migration Creation.
     *
     * Once the migration file has been created, this method will be called, allowing any additional
     * processing, specific to the template to be performed.
     *
     * @param string $migrationFilename The name of the newly created migration.
     * @param string $className The class name.
     * @param string $baseClassName The name of the base class.
     * @return void
     */
    public function postMigrationCreation($migrationFilename, $className, $baseClassName)
    {
        // TODO: Implement postMigrationCreation() method.
    }

    /**
     * CreationInterface constructor.
     *
     * @param InputInterface|null $input
     * @param OutputInterface|null $output
     */
    public function __construct(InputInterface $input = null, OutputInterface $output = null)
    {
    }

    /**
     * @param InputInterface $input
     *
     * @return CreationInterface
     */
    public function setInput(InputInterface $input)
    {
        // TODO: Implement setInput() method.
    }

    /**
     * @param OutputInterface $output
     *
     * @return CreationInterface
     */
    public function setOutput(OutputInterface $output)
    {
        // TODO: Implement setOutput() method.
    }

    /**
     * @return InputInterface
     */
    public function getInput()
    {
        // TODO: Implement getInput() method.
    }

    /**
     * @return OutputInterface
     */
    public function getOutput()
    {
        // TODO: Implement getOutput() method.
    }
}
