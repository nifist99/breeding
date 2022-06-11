<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel;
use App\Models\Privileges;

class PrivilegesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['title'] = "Privileges";
        $data['no']    =1;
        $data['view']  = Laravel::viewAdmin('privileges');
        $data['row']   = Privileges::paginate(20);

        return view('admin.privileges.view',$data);
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
        $request->validate([
            'name' => 'required|unique:privileges,name',
        ]);

        $check = Privileges::insertData($request);

        if($check){
            return redirect()->back()->with(['message'=>'success menambahkan data','message_type'=>'primary']);
        }else{
            return redirect()->back()->with(['message'=>'gagal menambahkan data','message_type'=>'warning']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'id' => 'required',
        ]);


        $data=Privileges::getDataById($request->id);

        if($data->name == $request->name){
            $check = Privileges::updatetData($request);
        }else{
            $request->validate([
                'name' => 'required|unique:privileges,name',
            ]);

            $check = Privileges::updatetData($request);
        }

        if($check){
            return redirect()->back()->with(['message'=>'success update data','message_type'=>'primary']);
        }else{
            return redirect()->back()->with(['message'=>'gagal update data','message_type'=>'warning']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check = Privileges::DeleteById($id);

        if($check){
            return redirect()->back()->with(['message'=>'success delete data','message_type'=>'primary']);
        }else{
            return redirect()->back()->with(['message'=>'gagal delete data','message_type'=>'warning']);
        }
    }
}
