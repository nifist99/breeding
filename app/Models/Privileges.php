<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Privileges extends Model
{
    protected $table = 'privileges';

    public function users()
    {
        return $this->belongsTo(Users::class);
    }
}
