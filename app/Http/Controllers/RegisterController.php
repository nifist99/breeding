<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel;
use App\Models\Users;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'name'            => 'required|min:3',
            'email'           => 'required|unique:users,email',
            'password'        => 'required|min:3',
            'repeat_password' => 'required|min:3',
            'hp'              => 'required|min:9|unique:users,hp',
        ]);

        if($request->password==$request->repeat_password){

            $check = Users::insertData($request);

            if($check){
                return redirect()->back()->with(['message'=>'registrasi berhasil, silahkan login','message_type'=>'primary']);
            }else{
                return redirect()->back()->with(['message'=>'registrasi gagal silahkan cek data kembali','message_type'=>'warning']);
            }

        }else{
            return redirect()->back()->with(['message'=>'register gagal, password tidak sama','message_type'=>'warning']);
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
    public function destroy($id)
    {
        //
    }
}
