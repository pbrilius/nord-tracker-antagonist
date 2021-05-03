<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testSomething(): void
    {
        $user = $this->getMockBuilder(User::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->assertIsObject($user);
    }
}
