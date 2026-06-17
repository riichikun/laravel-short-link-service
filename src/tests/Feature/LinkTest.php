<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Group;
use Tests\TestCase;

#[Group('Feature')]
class LinkTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_link(): void
    {
        $response = $this->post('/api/links', ['url' => 'https://example.com/some/very/long/path']);

        $response->assertStatus(200);
    }
}
