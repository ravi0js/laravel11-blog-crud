<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = Task::query()->where("user_id","DESC")
        // ->paginate(10);

        $tasks = Task::query()
        ->paginate(10);

        return view("task.index",[
            "tasks"=> $tasks
        ]);
    }

     public function create() {
        return view("task.create");
     }

    public function store(Request $request)
     {
        $data = $request-> validate([
            "title" => "required|string",
        "description" => "required| string",
        "deadline" => "required",
     ]);

     $data["user_id"] = request() ->user()->id;
     Task:: create($data);
     return to_route("task.index")->with("success","Task is Created Successfully");
     }
     public function show(Task $task)
     {
        return view("task.show",[
            "task"=>$task
        ]);
     }
     public function edit(Task $task)
     {
        return view("task.edit",[
            "task" => $task
        ]);
     }
     public function update(Request $request, Task $task)
     {
        $data = $request->valideate([
            "title" => "required|string",
            "description" => "required|string"
        ]);

        $task->update($data);

        return to_route("task.show",$task)->with("success", "Task updated successfully");
     }
     public function destroy(Task $task)
     {
        $task->delete();
        return to_route("task.index")->with("success","Blog deleted successfully!");
     }
}
