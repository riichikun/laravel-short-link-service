<?php

namespace Tests\Feature;

use App\Models\Link;
use PHPUnit\Framework\Attributes\DependsOnClass;
use PHPUnit\Framework\Attributes\Group;
use Tests\TestCase;

#[Group('Feature')]
class RedirectTest extends TestCase
{
    #[DependsOnClass(LinkTest::class)]
    public function test_redirect_success(): void
    {
        $code = Link::first()->code;

        $response = $this->get('/'.$code);

        $response->assertStatus(302);
    }

    public function test_redirect_fail(): void
    {
        $code = '0000';

        $response = $this->get('/'.$code);

        $response->assertStatus(404);
    }
}
