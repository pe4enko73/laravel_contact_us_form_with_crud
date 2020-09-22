<?php

namespace App\Http\Controllers;

use App\Models\TodolistModel;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;

class TodolistController extends Controller
{
    public function index()
    {

        $data=[
            'title'=>'CRUD TODO-list',
            'pagetitle'=>'Список задач',
            'tasks'=>TodolistModel::latest()->paginate(3),
            'count'=>TodolistModel::count()
        ];
        return view('pages.tasks.index')->with($data);
    }
    public function submit(TaskRequest  $request)
    {
        $tsk = new TodolistModel();
        $tsk->task =$request->input('task');
        $tsk->save();
        return redirect()->route('home');
    }
    public function edit($id)
    {
        $data=[
            'title'=>'Edit CRUD TODO-list',
            'pagetitle'=>'Редактирование задачи',
        ];
        $tsk = new TodolistModel();
        return view('pages.tasks.edit',['data'=>$tsk->find($id)])->with($data);
    }
        public function update_submit($id ,TaskRequest  $request)
        {
            $tsk = TodolistModel::find($id);
            $tsk->task =$request->input('task');
            if ($request->input('completed')=='on'):
                $tsk->update(['completed' => true]);
            else:
                $tsk->update(['completed' => false]);
            endif;
            $tsk->save();
            return redirect()->route('home');
        }
        public function completed_task($id ,Request  $request){
            $tsk =TodolistModel::find($id);
            $tsk->update(['completed' => true]);
            return redirect()->route('home');
        }
        public function uncompleted_task($id ,Request  $request){
            $tsk =TodolistModel::find($id);
            $tsk->update(['completed' => false]);
            return redirect()->route('home');
        }
        public function delete_task($id )
        {
            TodolistModel::find($id)->delete();
            return redirect()->route('home');

        }
}

