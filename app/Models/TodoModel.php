<?php
namespace App\Models;

use CodeIgniter\Model;

class TodoModel extends Model
{
    protected $table = 'tasks';
    protected $primaryKey = 'id';
    protected $useTimestamps = true;
    protected $allowedFields = ['task', 'is_done'];

    public function get_all_tasks()
    {
        return $this->orderBy('id', 'DESC')->findAll();
    }

    public function add_task($task)
    {
        $this->save([
            'task' => $task
        ]);
    }

    public function delete_task($id)
    {
        $this->delete($id);
    }

    public function toggle_task($id)
    {
        $task = $this->find($id);
        $this->save([
            'id' => $id,
            'is_done' => !$task['is_done']
        ]);
    }

    public function get_task($id)
    {
        return $this->find($id);
    }

    public function update_task($id, $task)
    {
        $this->save([
            'id' => $id,
            'task' => $task
        ]);
    }
}