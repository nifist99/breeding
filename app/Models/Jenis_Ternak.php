<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Laravel;
use Session;

class Jenis_Ternak extends Model
{
    protected $table = 'jenis_ternak';

    public static function insertData($request){
        $data['name']=$request->name;
        $data['created_at']=Laravel::date();
        $data['created_by']=Session::get('id_users');

        $check = DB::table('jenis_ternak')->insert($data);

        return $check;

    }

    public static function updatetData($request){
        $data['name']=$request->name;
        $data['updated_at']=Laravel::date();
        $data['created_by']=Session::get('id_users');

        $check = DB::table('jenis_ternak')->where('id',$request->id)->update($data);

        return $check;

    }

    public static function getDataById($id){
        $check = DB::table('jenis_ternak')
                ->where('id',$id)->first();

        return $check;
    }

    public static function DeleteById($id){
        $check = DB::table('jenis_ternak')->where('id',$id)->delete();

        return $check;
    }
}
