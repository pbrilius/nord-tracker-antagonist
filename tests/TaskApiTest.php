<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class TaskApiTest extends ApiTestCase
{
    /**
     * Assert authentication is required
     *
     * @return void
     */
    public function testPing(): void
    {
        $response = static::createClient()->request('GET', '/api/v1/task/42');

        $this->assertResponseStatusCodeSame(401);
    }
}
