<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StartUp extends Model
{
    use HasFactory;

    protected $fillable = [
        "application_id",
        "app_id",
    ];

    public function application(){
        return $this->belongsTo(Application::class);
    }
}
