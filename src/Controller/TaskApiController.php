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
        $em->persist($task);
        $em->flush();

        return $this->json($task);
    }
}
