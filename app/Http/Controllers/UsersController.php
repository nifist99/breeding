<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Laravel;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = "Users";
        $data['no']    =1;
        $data['view']  = Laravel::viewAdmin('users');
        $data['row']   = Users::getDataAllByPaginate(20);

        return view('admin.users.view',$data);
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
            'email' => 'required|unique:users,email',
            'name'  => 'required',
            'status'  => 'required',
            'hp'  => 'required',
            'password'  => 'required',
            'id_privileges'  => 'required',
        ]);

        $check = Users::insertDataByAdmin($request);

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
        $data['title'] = "Users";
        $data['view']  = Laravel::viewAdminById('users',$id);
        $data['row']   = Users::getDataById($id);
        
        return view('admin.users.show',$data);
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
            'name'  => 'required',
            'status'  => 'required',
            'hp'  => 'required',
            'id_privileges'  => 'required',
        ]);


        $data=Users::getDataById($request->id);

        if($data->email == $request->email){
            $check = Users::updateData($request);
        }else{
            $request->validate([
                'email' => 'required|unique:users,email',
            ]);
            $check = Users::updateData($request);
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
        $check = Users::DeleteById($id);

        if($check){
            return redirect()->back()->with(['message'=>'success delete data','message_type'=>'primary']);
        }else{
            return redirect()->back()->with(['message'=>'gagal delete data','message_type'=>'warning']);
        }
    }
}
