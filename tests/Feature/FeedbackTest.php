<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FeedbackTest extends TestCase
{
    public function test_feedback_create_success()
    {
        $data = [
            'name' => 'test name',
            'message' => 'test message'
        ];
        $response = $this->post(route('feedback.store'), $data);
        $response->assertSuccessful();
    }

    public function test_index_status_success()
    {
        $response = $this->get(route('feedback.index'));

        $response->assertStatus(200);
    }

    public function test_store_status_success()
    {
        $response = $this->get(route('feedback.store'));

        $response->assertStatus(200);
    }
}
