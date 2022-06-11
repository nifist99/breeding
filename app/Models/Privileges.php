<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
use Laravel;

class Privileges extends Model
{
    protected $table = 'privileges';

    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    public static function insertData($request){
        $data['name']=$request->name;
        $data['created_at']=Laravel::date();

        $check = DB::table('privileges')->insert($data);

        return $check;

    }

    public static function updatetData($request){
        $data['name']=$request->name;
        $data['updated_at']=Laravel::date();

        $check = DB::table('privileges')->where('id',$request->id)->update($data);

        return $check;

    }

    public static function getDataById($id){
        $check = DB::table('privileges')->where('id',$id)->first();

        return $check;
    }

    public static function DeleteById($id){
        $check = DB::table('privileges')->where('id',$id)->delete();

        return $check;
    }


}
