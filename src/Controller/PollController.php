<?php

namespace App\Controller;

use App\Service\QuestionService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PollController extends AbstractController
{
	/**
	 * @var QuestionService
	 */
	private $questionService;

	/**
	 * PollController constructor.
	 */
	public function __construct(QuestionService $questionService)
	{
		$this->questionService = $questionService;
	}

	#[Route('/poll', name: 'poll')]
	public function index(Request $request): Response
	{
		dump($request->request->all());

		return $this->render('poll/index.html.twig', [
			'controller_name' => 'PollController',
			'questions' => $this->questionService->getQuestions(),
		]);
	}
}
