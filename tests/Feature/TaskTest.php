<?php


namespace Tests\Unit;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class TaskTest extends TestCase
{
    use RefreshDatabase;
    use HasFactory;

    protected function signIn($user = null)
    {
        $user = $user ?? User::factory()->make();
        $user->save();
        $this->be($user);
    }

    public function test_a_user_can_list_tasks()
    {
        $this->signIn();
        $response = $this->get(route('tasks.index'), []);

        $response->assertStatus(200);
        $response->assertSeeText('Tasks list');
    }

    public function test_a_user_can_create_an_task()
    {
        $this->signIn();
        $response = $this->post(route('tasks.store'), [
            'title' => 'Example',
            'description' => 'Example description'
        ]);

        $response->assertRedirect(route('tasks.index'));
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks', [
            'title' => 'Example',
            'description' => 'Example description'
        ]);
    }

    public function test_a_user_can_edit_an_task()
    {
        $this->signIn();

        $task = Task::factory()->make();
        $task->save();

        $response = $this->put(route('tasks.update', ['task' => $task->id]), [
            'title' => 'New Title',
            'description' => 'New Description'
        ]);

        $response->assertRedirect(route('tasks.index'));
        $response->assertStatus(302);
        $this->assertDatabaseHas('tasks',[
                'title' => 'New Title',
                'description' => 'New Description'
        ]);

    }

    public function test_a_user_can_show_an_task()
    {
        $this->signIn();

        $task = Task::factory()->make();
        $task->save();

        $response = $this->put(route('tasks.show', ['task' => $task->id]), []);

        $response->assertStatus(302);
    }

    public function test_a_user_can_complete_an_task()
    {
        $this->signIn();

        $task = Task::factory()->make();
        $task->save();

        $response = $this->get(route('tasks.complete', ['task' => $task->id]), []);

        $response->assertStatus(302);
        $response->assertRedirect(route('tasks.index'));
        $this->assertDatabaseHas('tasks', [
            'id' => $task->id,
            'title' => $task->title,
            'description' => $task->description,
            'complete' => true
        ]);
    }

}
