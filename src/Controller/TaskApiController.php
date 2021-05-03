<?php

namespace App\Controller;

use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

class TaskApiController extends AbstractController
{
    #[Route('/api/v1/task/{id}', methods: ['GET', 'HEAD'])]
    public function show(int $id)
    {
        $em = $this->getDoctrine()->getManager();

        $taskRepository = $em->getRepository(Task::class);
        $task = $taskRepository->find($id);

        if (!$task) {
            throw new NotFoundHttpException();
        }

        return $this->json($task);
    }

    #[Route('/api/v1/task/{id}', methods: ['PUT'])]
    public function edit(int $id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $taskRepository = $em->getRepository(Task::class);
        $task = $taskRepository->find($id);

        if (!$task) {
            throw new NotFoundHttpException();
        }

        $task->setTitle($request->get('title'));
        $task->setComment($request->get('comment'));
        $task->setTimeSpent(
            \DateInterval::createFromDateString($request->get('time-spend'))
        );
        $task->setDateStarted(
            new \DateTime($request->get('date-started'))
        );

        $em->persist($task);
        $em->flush();

        return $this->json($task);
    }

    #[Route('/api/v1/task/{id}', methods: ['DELETE'])]
    /**
     * Deletion
     *
     * @param integer $id ID
     * 
     * @return Response
     */
    public function delete(int $id): Response
    {
        $em = $this->getDoctrine()->getManager();

        $taskRepository = $em->getRepository(Task::class);
        $task = $taskRepository->find($id);

        if (!$task) {
            throw new NotFoundHttpException();
        }
        
        $em->remove($task);
        $em->flush();

        return $this->json('');
    }

    #[Route('/api/v1/task', methods: ['POST'])]
    /**
     * Task creation
     *
     * @param Request $request Request
     * 
     * @return JsonResponse
     */
    public function create(Request $request): JsonResponse
    {
        $task = new Task();
        $task->setTitle($request->request->get('title'));
        $task->setComment($request->request->get('comment'));
        $task->setTimeSpent(
            \DateInterval::createFromDateString(
                $request->request->get('time-spent')
            )
        );
        $task->setDateStarted(new \DateTime($request->request->get('date-started')));

        $em = $this->getDoctrine()->getManager();
        $em->persist($task);
        $em->flush();

        return $this->json($task);
    }
}
