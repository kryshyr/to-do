<?php

namespace App\Controllers;

$db = \Config\Database::connect();
class Home extends BaseController
{
    private $Todo_model;

    public function __construct()
    {
        $this->Todo_model = new \App\Models\Todo_model();
    }

    public function index()
    {
        $data = [
            'tasks' => $this->Todo_model->get_all_tasks()
        ];
        return view('todo', $data);
    }
    public function add()
    {
        $this->Todo_model->add_task($this->request->getPost('task'));
        return redirect()->to('/todo');
    }
    public function delete($id)
    {
        $this->Todo_model->delete_task($id);
        return redirect()->to('/todo');
    }
    public function toggle($id)
    {
        $this->Todo_model->toggle_task($id);
        return redirect()->to('/todo');
    }
    public function edit($id)
    {
        $task = $this->Todo_model->get_task($id);
        $data = [
            'task' => $task
        ];
        return view('edit', $data);
    }
    public function update($id)
    {
        $this->Todo_model->update_task($id, $this->request->getPost('task'));
        return redirect()->to('/todo');
    }
}