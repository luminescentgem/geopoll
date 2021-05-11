<?php

namespace App\Command;

use App\Entity\Answer;
use App\Service\QuestionService;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DbRandomizeCommand extends Command
{
	protected static $defaultName = 'db:randomize';
	protected static $defaultDescription = 'Add a short description for your command';
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;
	/**
	 * @var QuestionService
	 */
	private $questionService;

	/**
	 * DbRandomizeCommand constructor.
	 */
	public function __construct(EntityManagerInterface $entityManager, QuestionService $questionService)
	{
		$this->entityManager = $entityManager;
		$this->questionService = $questionService;

		parent::__construct();
	}


	protected function configure()
	{
		$this
			->setDescription(self::$defaultDescription)
			->addArgument('iteration', InputArgument::OPTIONAL, 'If you want to execute the command multiple times.')
			->addOption('--doubtless', "-d", InputOption::VALUE_OPTIONAL, 'If option enabled, randomizer won\'t use the "I don\'t know" or "I won\'t answer" options.');
	}

	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		if ($input->getOption('doubtless')) {
			$max = 5;
		}

		$io = new SymfonyStyle($input, $output);
		$iteration = $input->getArgument('iteration');
		$max = 4;
		if ($iteration) {
			$io->note(sprintf('You passed an argument: %s', $iteration));
			$times = $iteration;
		} else {
			$times = 1;
		}

		$questionId = ["a", "b", "c", "d", "e", "f", "g"];

		$questions = $this->questionService->getQuestions();

		for ($i = 0; $i < $times; $i++) {
			foreach ($questions as $k => $v) {
				$randomNumber = rand(0, $max);
				$obj = new Answer();
				$obj->setQuestion($k);
				$obj->setOption($randomNumber);
				$obj->setTimestamp(new \DateTime());
				$obj->setAge(rand(0, 7));
				$obj->setSexe(rand(0, 2));
				$obj->setBelief(rand(0, 1));
				$this->entityManager->persist($obj);
			}
		}

		$this->entityManager->flush();

		$io->success(sprintf('db has successfully been randomized %s times! I hope this doesn\'t mess it all up...', $times));

        return Command::SUCCESS;
    }
}
