<?php

namespace App\Command;

use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DbResetCommand extends Command
{
	protected static $defaultName = 'db:reset';
	protected static $defaultDescription = 'Add a short description for your command';
	/**
	 * @var Connection
	 */
	private $connection;

	/**
	 * DbResetCommand constructor.
	 */
	public function __construct(Connection $connection)
	{
		$this->connection = $connection;
		parent::__construct();
	}


	protected function configure()
	{
		$this
			->setDescription(self::$defaultDescription)
			->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
			->addOption('option1', null, InputOption::VALUE_NONE, 'Option description');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		$io = new SymfonyStyle($input, $output);

		try {
			$this->connection->executeQuery("delete from answer");
		} catch (\Exception $e){
			throw new \RuntimeException('There was no database to delete. Are you feeling nervous?');
		}

		$io->success('You have successfully reset your database! I hope this was intended...');

		return Command::SUCCESS;
	}
}
