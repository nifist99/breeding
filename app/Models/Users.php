<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Hash;
use Laravel;


class Users extends Model
{
    protected $table = 'users';

    public static function insertData($request){
        $data['password']       = Hash::make($request->password);
        $data['email']          = $request->email;
        $data['name']           = $request->name;
        $data['hp']             = $request->hp;
        $data['status']         = 'active';
        $data['id_privileges']  = 2;
        $data['created_at'] = Laravel::date();
        
        $check = DB::table('users')->insert($data);

        return $check;
    }

    public static function insertDataByAdmin($request){
        $data['password']       = Hash::make($request->password);
        $data['email']          = $request->email;
        $data['name']           = $request->name;
        $data['hp']             = $request->hp;
        $data['status']         = $request->status;
        $data['id_privileges']  = $request->id_privileges;
        $data['created_at'] = Laravel::date();
        
        $check = DB::table('users')->insert($data);

        return $check;
    }

    public static function updateData($request){
        if($request->password){
            $data['password']       = Hash::make($request->password);
        }
        $data['email']          = $request->email;
        $data['name']           = $request->name;
        $data['hp']             = $request->hp;
        $data['status']         = $request->status;
        $data['id_privileges']  = $request->id_privileges;
        $data['updated_at'] = Laravel::date();
        
        $check = DB::table('users')->where('id',$request->id)->update($data);

        return $check;
    }

    public static function DeleteById($id){
        $check = DB::table('users')->where('id',$id)->delete();

        return $check;
    }

    public static function getDataById($id){

        $check=DB::table('users')
                ->join('privileges','users.id_privileges','=','privileges.id')
                ->where('users.id',$id)
                ->select('users.*','privileges.name as privileges')
                ->first();

        return $check;

    }

    public static function getDataByEmail($email){
        
        $check=DB::table('users')
                ->join('privileges','users.id_privileges','=','privileges.id')
                ->where('users.email',$email)
                ->select('users.*','privileges.name as privileges','privileges.id as id_privileges')
                ->first();
        return $check;

    }

    public static function getDataAllByPaginate($page){
        
        $check=DB::table('users')
                ->join('privileges','users.id_privileges','=','privileges.id')
                ->select('users.*','privileges.name as privileges','privileges.id as id_privileges')
                ->paginate($page);
        return $check;

    }

    // relasi

    public function privilages()
    {
        return $this->hasOne(privilages::class);
    }
}   
