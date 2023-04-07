<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TodoListController extends Controller
{
    public function index()
    {
        $list = TodoList::all();
        return response($list);
    }

    public function show(TodoList $list)
    {
        return response($list);
    }

    public function store(Request $request)
    {
        $request->validate(['name' => ['required']]);

            $list = TodoList::create({$request->all())};
//        return response($list, Response::HTTP_CREATED);
        return $list;
    }

    public function destroy(TodoList $list)
    {
        $this->destroy($list->id);
        return response('', Response::HTTP_NO_CONTENT);
    }

    public function update(Request $request, TodoList $list)
    {
        $request->validate(['name' => ['required']]);
       $list->update($request->all());
       return \response($list);
    }
}
