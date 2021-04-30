<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Task;

class TaskFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 16; $i++) {
            $task = new Task();
            $task->setTitle(hash('md5', random_bytes(5)));
            $task->setComment(hash('md5', random_bytes(6)));
            $task->setDateStarted(new \DateTime());
            $task->setTimeSpent(new \DateInterval('PT5M'));

            $manager->persist($task);
        }

        $manager->flush();
    }
}
