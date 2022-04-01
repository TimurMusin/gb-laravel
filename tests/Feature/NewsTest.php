<?php

declare(strict_types=1);

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertJson;

class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_list_status_success(): void
    {
        $response = $this->get(route('admin.news.index'));

        $response->assertStatus(200);
    }
    public function test_create_status_success(): void
    {
        $response = $this->get(route('admin.news.create'));

        $response->assertStatus(200);
    }
    public function test_store_news_success(): void
    {
        $data = [
            'title' => 'test title',
            'author' => 'test author',
            'description' => 'test description'
        ];
        $response = $this->post(route('admin.news.store'), $data);
        $response
            ->assertJson($data)
            ->assertCreated();
    }
}
