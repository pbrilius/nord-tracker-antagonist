<?php

namespace App\Controller;

use App\Entity\Task;
use SimpleXLSXGen;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExportController extends AbstractController
{
    #[Route('/export', name: 'export')]
    public function index(): Response
    {
        $em = $this->getDoctrine()->getManager();
        $taskRepository = $em->getRepository(Task::class);

        $tasks = $taskRepository->findAll();

        $tasksEncoded = [];

        foreach ($tasks as $task) {
            $tasksEncoded []= $task->jsonSerialize();
        }

        SimpleXLSXGen::fromArray($tasksEncoded)->downloadAs('table.xslx');
    }
}
