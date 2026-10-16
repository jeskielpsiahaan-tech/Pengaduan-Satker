<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class Satker extends Model
{
    use HasFactory;

    protected $table = 'satker';
    protected $guarded = [];

    public function Complaints()
    {
        return $this->hasMany(Complaint::class, 'satker_id', 'id');
    }
}
