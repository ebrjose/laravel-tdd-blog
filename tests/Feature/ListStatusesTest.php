<?php

namespace Tests\Feature;

use App\Models\Status;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ListStatusesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function can_get_all_statuses()
    {
        $this->withoutExceptionHandling();

        $statuses = Status::factory()
            ->count(4)
            ->sequence(fn($sequence) => [
                'created_at' => now()->subDays(4 - $sequence->index),
            ])
            ->create();

        $response = $this->getJson(route('statuses.store'));

        $response->assertSuccessful();

        $response->assertJson([
            'total' => 4
        ]);

        $response->assertJsonStructure([
           'data', 'total', 'first_page_url', 'last_page_url'
        ]);

        $this->assertEquals(
            $response->json('data.0.id'),
            $statuses->last()->id
        );
    }
}
