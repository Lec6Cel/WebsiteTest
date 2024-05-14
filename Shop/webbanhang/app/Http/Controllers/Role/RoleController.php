<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class RoleController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkPermission');
        
    }

    

    public function index(Request $request){
        $dataList = DB::table('role')
        ->get();

        $id = $request->id;
        $name = '';
        if(isset($id) && $id > 0){
            $item = DB::table('role')
            ->where('id',$id)
            ->get();
            if($item != null && count($item) > 0){
                $name = $item[0]->name;
            }
        }
        return view('role.index')->with([
            'dataList' => $dataList,
            'index' => 0,
            'id' => $id,
            'name' => $name
        ]);
    }

    public function add(Request $request){
        $name = $request -> name;
        $id = $request -> id;

        $checkItem = DB::table('role')
        ->where('name',$name)
        ->get();
        if($checkItem != null && count($checkItem) > 0) {
            //failed
        } else {
            //Kiểm tra add hay update
            if($id > 0) {
                //Update
                DB::table('role')
                    ->where('id',$id)
                    -> update([
                    'name' => $name
                ]);
            }
            else {
                //Insert
                 DB::table('role')-> insert([
                    'name' => $name
                ]);
            }
           
        }

        //reload lại Page
        return redirect()->route('role.index');
    }

    public function delete(Request $request){
        $id = $request -> id;
        DB::table('role')
            -> where ('id',$id)
            -> delete();

        //reload lại Page
        return redirect()->route('role.index');
    }
}
