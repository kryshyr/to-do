<?php

namespace App\Controllers;

$db = \Config\Database::connect();
class Todo extends BaseController
{
    private $TodoModel;

    public function __construct()
    {
        $this->TodoModel = new \App\Models\TodoModel();
    }

    public function index()
    {
        $data = [
            'tasks' => $this->TodoModel->get_all_tasks()
        ];
        return view('todo', $data);
    }
    public function add()
    {
        $this->TodoModel->add_task($this->request->getPost('task'));
        return redirect()->to('/todo');
    }
    public function delete($id)
    {
        $this->TodoModel->delete_task($id);
        return redirect()->to('/todo');
    }
    public function toggle($id)
    {
        $this->TodoModel->toggle_task($id);
        return redirect()->to('/todo');
    }
    public function edit($id)
    {
        $task = $this->TodoModel->get_task($id);
        $data = [
            'task' => $task
        ];
        return view('edit', $data);
    }
    public function update($id)
    {
        $this->TodoModel->update_task($id, $this->request->getPost('task'));
        return redirect()->to('/todo');
    }
}
