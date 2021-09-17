<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{

    // Главная страница - отображается все записи

    public function index(){

        $lists = Task::all();

        return view('welcome',compact('lists'));
    }

// Функция для создания новых записей

    public function create(Request $request){

        Task::create([

            'title'=> $request->get("title"),

        ]);

        return redirect(url()->previous())->with('success_msg', 'Success');

    }

 // Функция для обновления записей по ид

    public function update(Request $request,$id){

        Task::where('id', $id)->update([

            'title'=> $request->get("title"),

        ]);

        return redirect(url()->previous())->with('success_msg', 'Success');

    }

// Функция для удаления записи

    public function delate($id){

        Task::where('id', $id)->delete();

        return redirect(url()->previous())->with('success_msg', 'Success');

    }

// Функция для поиска записей

    public function search(Request $request){

        $searchobj = $request->get('search');

        $lists = Task::where('title', 'LIKE', '%' . $searchobj . '%')->get();

        return view('search',compact('lists'));

    }

}
