<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
    protected $table = 'heroes';
    protected $primaryKey = 'id';
    protected $fillable = ['heroid', 'name', 'picture', 'hero_role', 'hero_type'];

    public function role()
    {
        return $this->belongsTo(Role::class, 'hero_role', 'id');
    }
}
