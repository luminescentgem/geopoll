<?php

namespace App\Controller;

use App\Service\UserInfoService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserInfoController extends AbstractController
{
	private UserInfoService $infoService;

	/**
	 * UserInfoController constructor.
	 */
	public function __construct(UserInfoService $infoService)
	{
		$this->infoService = $infoService;
	}

	#[Route('/user/info', name: 'user_info')]
	public function index(): Response
	{
		return $this->render('user_info/index.html.twig', [
			'controller_name' => 'UserInfoController',
			'questions' => $this->infoService->getInfo()
		]);
	}
}
