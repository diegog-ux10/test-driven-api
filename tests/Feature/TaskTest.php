<?php

namespace Tests\Feature;

use App\Models\Task;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_fetch_all_tasks_of_a_todo_list()
    {
        $task = $this->createTask();
        $response = $this->getJson(route('task.index'))->assertOk()->json();
        $this->assertEquals(1, count($response));
        $this->assertEquals($task->title, $response[0]['title']);
    }

    public function test_store_task_for_a_todo_list()
    {
        $task = Task::factory()->make();
        $this->postJson(route('task.store'), $task->title)
            ->assertCreated()
            ->json();

        $this->assertDatabaseHas('tasks',  $task->title);
    }

    public function test_delete_a_task_from_database()
    {
        $task = $this->createTask();
        $this->deleteJson(route('task.destroy', $task->id))->assertNoContent();
        $this->assertDatabaseMissing('tasks', ['title' => $task->title]);

    }
}
