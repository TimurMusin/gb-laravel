<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    public function test_order_create_success()
    {
        $data = [
            'name' => 'test name',
            'tel' => '+79999999999',
            'email' => 'test@email.com',
            'order' => 'test order'
        ];
        $response = $this->post(route('order.store'), $data);
        $response->assertSuccessful();
    }

    public function test_index_status_success()
    {
        $response = $this->get(route('order.index'));

        $response->assertStatus(200);
    }

    public function test_store_status_success()
    {
        $response = $this->get(route('order.store'));

        $response->assertStatus(200);
    }
}
