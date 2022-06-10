<?php
namespace App\Helpers;
 
use Illuminate\Support\Facades\DB;
 
class Laravel {
    
    public static function date(){
        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d H:i:s');

        return $date;
    }

}