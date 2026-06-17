<?php

namespace Tests\Feature;

use App\Models\Link;
use PHPUnit\Framework\Attributes\DependsOnClass;
use PHPUnit\Framework\Attributes\Group;
use Tests\TestCase;

#[Group('Feature')]
class LinkStatsTest extends TestCase
{
    #[DependsOnClass(LinkTest::class)]
    public function test_stats_success(): void
    {
        $code = Link::first()->code;

        $response = $this->get('/api/links/'.$code.'/stats');

        $response->assertStatus(200);
    }

    public function test_redirect_fail(): void
    {
        $code = '0000';

        $response = $this->get('/api/links/'.$code.'/stats');

        $response->assertStatus(404);
    }
}
