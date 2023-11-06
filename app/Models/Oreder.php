<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oreder extends Model
{
    protected $table = 'oreders';
    protected $guarded = false;

    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}
}
