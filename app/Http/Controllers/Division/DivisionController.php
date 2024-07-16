<?php

namespace App\Http\Controllers\Division;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Division::all();
        return view('backend.division.div-show',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.division.div-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'div_name' => 'required',
        ],[
            'div_name.required' => 'Division Name is required',
        ]);

        $data = new Division;
        $data->div_name = $request->div_name;
        $data->div_long = $request->div_long;
        $data->save();
        return redirect()->route('div-show')->with('msg','Division Added Successfully');
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
        $data = Division::findOrFail($id);
        return view('backend.division.div-edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = Division::findOrFail($id);

        $request->validate([
        'div_name' => 'required',
        ],[
        'div_name.required' => 'Division Name is required',
        ]);
        $data->div_name = $request->div_name;
        $data->div_long = $request->div_long;
        $data->update();
        return redirect()->route('div-show')->with('msg','Division Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $data = Division::findOrFail($id);
        if($data){
            $data->delete();
            return redirect()->route('div-show')->with('msg','Division Deleted Successfully');
        }


    }
}
