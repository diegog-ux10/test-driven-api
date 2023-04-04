<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TodoListTest extends TestCase
{
    public function test_store_todo_list()
    {
        //Preparation / prepare

        // Action / perform
        $response = $this->getJson(route('todo-list.index'));
        dd($response->json());
        // Assertion / predict
        $this->assertEquals(1, count($response->json()));
    }
}
