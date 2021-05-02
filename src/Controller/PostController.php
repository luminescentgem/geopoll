<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Repository\AnswerRepository;
use App\Service\QuestionService;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
	/**
	 * @var EntityManagerInterface
	 */
	private $entityManager;
	/**
	 * @var AnswerRepository
	 */
	private $repository;
	/**
	 * @var QuestionService
	 */
	private $questionService;
	/**
	 * @var Connection
	 */
	private $connection;

	/**
	 * PostController constructor.
	 */
	public function __construct(EntityManagerInterface $entityManager,
										 AnswerRepository $repository,
										 QuestionService $questionService,
										 Connection $connection)
	{
		$this->entityManager = $entityManager;
		$this->repository = $repository;
		$this->questionService = $questionService;
		$this->connection = $connection;
	}

	#[Route('/post', name: 'post')]
	public function index(Request $request): Response
	{
		foreach ($request->request->all() as $k => $v) {
			$obj = new Answer();
			$obj->setQuestion($k);
			$obj->setOption((int)$v);
			$obj->setTimestamp(new \DateTime());
			$this->entityManager->persist($obj);
		}

		$this->entityManager->flush();

		$stmt = $this->connection->executeQuery("select question, option, count(*) from answer group by question, option");
		$counts = $stmt->fetchAllNumeric();

		$questions = $this->questionService->getQuestions();

		$answers = [];
		foreach ($questions as $questionId => $question) {
			foreach ($question['answers'] as $answerId => $answer) {
				$answers[$questionId][$answerId] = 0;
				foreach ($counts as $count) {
					if ($count[0] == $questionId && $count[1] == $answerId) {
						$answers[$questionId][$answerId] = (int) $count[2];
						break;
					}
				}
			}
		}
		$totals = [];
		/*
		foreach($answers as $answerId => $answer) {
			foreach($answer as $optionId => $option) {
				$totals[$answerId] += $option;
			}
		}*/

		dump($answers);

		return $this->render('post/index.html.twig', [
			'controller_name' => 'PostController',
			'questions' => $questions,
			'answers' => $answers,
			'totals' => $totals,
		]);
	}
}
