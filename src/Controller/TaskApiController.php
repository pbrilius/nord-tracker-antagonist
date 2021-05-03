<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TaskApiController extends AbstractController
{
    #[Route('/api/v1/task/{id}', methods: ['GET', 'HEAD'])]
    public function show(int $id)
    {
        $em = $this->getDoctrine()->getManager();
        var_dump(get_class($em));
        exit;
    }

    #[Route('/api/v1/task//{id}', methods: ['PUT'])]
    public function edit(int $id)
    {
        // ... edit a post
    }
}
