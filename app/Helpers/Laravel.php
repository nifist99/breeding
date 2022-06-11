<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class Laravel {
    
    public static function date(){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        return $date;
    }

    public static function getNameApp(){
        
        return "Breedingo";

    }

    public static function viewAdmin($view){
        $data['index']  = 'admin/'.$view;
        $data['create'] = 'admin/'.$view.'/create';

        //save update delete
        $data['save']   = 'admin/'.$view.'/save';
        $data['update'] = 'admin/'.$view.'/update';

        return $data;
    }

    public static function viewAdminById($view,$id){

                // by id
                $data['show']   = 'admin/'.$view.'/show'.'/'.$id;
                $data['edit']   = 'admin/'.$view.'/edit'.'/'.$id;
                $data['delete'] = 'admin/'.$view.'/delete'.'/'.$id;

                return $data;

    }

}