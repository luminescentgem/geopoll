<?php

namespace App\Controller;

use App\Entity\Answer;
use App\Repository\AnswerRepository;
use App\Service\QuestionService;
use App\Service\UserInfoService;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    private AnswerRepository $repository;

    private QuestionService $questionService;

    private Connection $connection;

    private UserInfoService $infoService;

    /**
     * PostController constructor.
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        AnswerRepository $repository,
        QuestionService $questionService,
        UserInfoService $infoService,
        Connection $connection
    ) {
        $this->entityManager = $entityManager;
        $this->repository = $repository;
        $this->questionService = $questionService;
        $this->connection = $connection;
        $this->infoService = $infoService;
    }

    private function countVariations(string $variation, int $count, string $questionId, int $answerId, array $values
    ): array {
        $rows = $this->connection->executeQuery("select $variation as value, count(*) as count from answer where question='$questionId' and answer_option='$answerId' group by $variation")->fetchAllAssociative();

        foreach ($rows as $i => $row) {
            $rows[$i]['ratio'] = round(100 * $row['count'] / $count);
        }

        $variations = [];
        foreach ($values as $value) {
            $variations[$value] = [
                'count' => 0,
                'ratio' => 0,
            ];
            foreach ($rows as $row) {
                if ($row['value'] == $value) {
                    $variations[$value] = $row;
                    break;
                }
            }
        }

        return $variations;
    }

    /**
     * @Route("/post", name="post")
     */
    public function index(Request $request): Response
    {
           
        $localanswers = $request->request->all();
        $userinfo = $request->getSession()->get('userinfo');

        foreach ($request->request->all() as $k => $v) {
            $obj = new Answer();
            $obj->setQuestion($k);
            $obj->setOption((int) $v);
            $obj->setTimestamp(new \DateTime());
            $obj->setSexe((int) $userinfo["sexe"]);
            $obj->setAge((int) $userinfo["age"]);
            $obj->setBelief((int) $userinfo["belief"]);
            $this->entityManager->persist($obj);
        }

        $this->entityManager->flush();

        $questions = $this->questionService->getQuestions();

        $info = $this->infoService->getInfo();

        $answers = [];

        foreach ($questions as $questionId => $question) {
            $totalcount = $this->connection->executeQuery("select count(*) from answer where question='$questionId'")->fetchAllNumeric();
            $nb = $totalcount[0][0];
            $answers[$questionId]['count'] = $nb;

            foreach ($question['answers'] as $answerId => $answer) {
                $counts = $this->connection->executeQuery("select count(*) from answer where question='$questionId' and answer_option='$answerId'")->fetchAllNumeric();
                $countrow = $counts[0][0];

                $answers[$questionId]['options'][$answerId]['count'] = $countrow;
                $answers[$questionId]['options'][$answerId]['ratio'] = $nb ? round(100 * $countrow / $nb) : 0;

                foreach ($info as $variation => $variationInfo) {
                    $answers[$questionId]['options'][$answerId][$variation] = $this->countVariations(
                        $variation,
                        $countrow,
                        $questionId,
                        $answerId,
                        array_keys($variationInfo['answers'])
                    );
                }
            }
        }
        $totals = [];

        return $this->render('post/index.html.twig', [
            'controller_name' => 'PostController',
            'questions'       => $questions,
            'answers'         => $answers,
            'localAnswers'    => $localanswers,
        ]);
    }
}
