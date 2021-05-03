<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UserFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $user = new User();
        $user->setEmail('thomas@nord.io');
        $user->setApiToken('7cf7046f676bbc149803541c658deba9');

        $manager->persist($user);
        $manager->flush();
    }
}
