<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UserInfoController extends AbstractController
{
	#[Route('/user/info', name: 'user_info')]
	public function index(): Response
	{
		return $this->render('user_info/index.html.twig', [
			'controller_name' => 'UserInfoController',
			'questions' => [
				1 => [
					"question" => "Quel est votre âge ?",
					"answers" => [
						"a" => "7-14",
						"b" => "15-19",
						"c" => "20-30",
						"e" => "32-39",
						"f" => "40-49",
						"g" => "50-59",
						"h" => "60-65",
						"i" => "66+"
					]
				],
				2 => [
					"question" => "Votre sexe ?",
					"answers" => [
						"a" => "Femme",
						"b" => "Homme",
						"c" => "Non-binaire",
					]
				],
				3 => [
					"question" => "Êtes-vous croyant ?",
					"answers" => [
						"a" => "Oui",
						"b" => "Non",
					]
				]
			]
		]);
	}
}
