<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
//use Validator;

class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       // $data = Auth::user();
        //dd($data);
        $datas = User::join('divisions as d','d.id','=','users.division_id')
                ->select('d.div_name','users.*')
                ->get();

        //$roles = User::where('type','=','0')->get();
        //dd($datas);
        return view('backend.users.user-show',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $datas = Division::all();
        return view('backend.users.user-create',compact('datas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'division_id' => 'required',
        ],[
            'division_id.required' => 'Division name is required',
        ]);

        $data = new User();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = Hash::make($request->password);
        $data->division_id = $request->division_id;
        $data->AQUA = $request->AQUA;
        $data->FRHPHM = $request->FRHPHM;
        $data->FNBP = $request->FNBP;
        $data->AEHM = $request->AEHM;
        $data->FGB = $request->FGB;
        $data->FEES = $request->FEES;
        $data->IT_CELL = $request->IT_CELL;
        $data->FINANCE = $request->FINANCE;
        $data->type = 0;

        //dd($data);
        $data->save();

        return redirect()->route('user-show')->with('msg','User added successfully.');

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
        $data = User::findOrFail($id);
        $datas = Division::all();

        return view('backend.users.user-edit',compact('data','datas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //dd($request->all(), $id);
        $data = User::findOrFail($id);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'division_id' => 'required',
        ],[
            'division_id.required' => 'Division name is required',
        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->division_id = $request->division_id;
        $data->AQUA = $request->AQUA;
        $data->FRHPHM = $request->FRHPHM;
        $data->FNBP = $request->FNBP;
        $data->AEHM = $request->AEHM;
        $data->FGB = $request->FGB;
        $data->FEES = $request->FEES;
        $data->IT_CELL = $request->IT_CELL;
        $data->FINANCE = $request->FINANCE;

        //dd($data);
        $data->update();
        return redirect()->route('user-show')->with('msg','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = User::findOrFail($id);
        if($data){
            $data->delete();
            return redirect()->route('user-show')->with('msg','User Deleted Successfully');
        }
    }

    public function pwdReset(){
        return view('backend.users.user-pwd-reset');
    }

    public function pwdStore(Request $req){
        $id = Auth::user()->id;

        $req->validate([
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $data = User::findOrFail($id);

        $data->password = Hash::make($req->password);

        $data->update();

        return redirect()->route('user-pwd')->with('msg','Password change successfully');
    }
}
