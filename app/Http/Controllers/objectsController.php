<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\todo;

class objectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = todo::orderByDesc('id')->paginate(3);
        return \view('crud.table', compact('tareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        todo::create([
            'title' => $data['newTareaTitle'],
            'description' => $data['newTareaDesc'],
            'state' => 0,
        ]);
        return redirect(route('objects.list'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $word)
    {
        $busqueda = $word->validate([
            'searchWord' => 'required',
        ]);
        $tareas = todo::where('title','like', '%'.$busqueda['searchWord'].'%')
                        ->orWhere('description','like', '%'.$busqueda['searchWord'].'%')
                        ->orderByDesc('id')->paginate(3);
        // header('Content-Type: application/json');
        // echo json_encode($tareas);
        return \view('crud.table', compact('tareas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $data = $request->all();
        foreach ($data as $item) {
            $query = todo::findOrFail($item['id']);
            $query->title = $item['title'];
            $query->description = $item['description'];
            $query->state = $item['status'];
            $query->save();
        //    header('Content-Type: application/json');
        //     echo json_encode($query);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $data = $request->all();
        $id = [];
        foreach ($data as $value) {
            array_push($id, intval($value['id']));
        }
        todo::destroy($id);
        header('Content-Type: application/json');
            echo json_encode($id);
    }
}
