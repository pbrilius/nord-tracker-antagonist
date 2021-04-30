<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Entity\User;

class TaskTest extends TestCase
{
    public function testSomething(): void
    {
        $user = $this
            ->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertIsObject($user);
    }
}
