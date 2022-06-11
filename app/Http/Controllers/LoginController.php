<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Session;
use Laravel;
use Hash;
use Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
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

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $check = Users::getDataByEmail($request->email);
        if($check){
            if($check->status == 'active'){
                
                if(Hash::check($request->password, $check->password)){
                    if (Auth::attempt($credentials)){
                        $request->session()->regenerate();

                        Session::put('email',$credentials['email']);
                        Session::put('name',$check->name);
                        Session::put('id_users',$check->id);
                        Session::put('id_privileges',$check->id_privileges);
                        Session::put('privileges',$check->privileges);
            
                        return redirect()->intended('admin/dashboard');
                    }else{
                        return redirect()->back()->with(['message'=>'Login gagal pastikan email dan password benar','message_type'=>'warning']);
                    }

                }else{
                    return redirect()->back()->with(['message'=>'Login gagal pastikan email dan password benar','message_type'=>'warning']);
                }

            }else{
                return redirect()->back()->with(['message'=>'Account anda tidak active','message_type'=>'warning']);
            }
        }else{
            return redirect()->back()->with(['message'=>'email anda belum terdaftar','message_type'=>'danger']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
     
        $request->session()->invalidate();
     
        $request->session()->regenerateToken();

        Session::flush();
     
        return redirect('login')->with(['message'=>'Anda Telah Logout','message_type'=>'primary']);
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
        //
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
