<?php

namespace App\Http\Controllers\Cat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cat;
use App\Models\Division;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Cat::all();
        return view('backend.cat.cat-show',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.cat.cat-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'cat_name' => 'required',
        ],[
            'cat_name.required' => 'Category Name is required',
        ]);

        $data = new Cat;
        $data->cat_name = $request->cat_name;

        $data->save();
        return redirect()->route('cat-show')->with('msg','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Cat::findOrFail($id);
        return view('backend.cat.cat-edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Cat::findOrFail($id);

        $request->validate([
        'cat_name' => 'required',
        ],[
        'cat_name.required' => 'Category Name is required',
        ]);
        $data->cat_name = $request->cat_name;
        $data->update();
        return redirect()->route('cat-show')->with('msg','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Cat::findOrFail($id);
        if($data){
            $data->delete();
            return redirect()->route('div-show')->with('msg','Category Deleted Successfully');
        }
    }
}
