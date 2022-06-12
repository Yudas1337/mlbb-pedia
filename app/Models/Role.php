<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    public function heroes()
    {
        return $this->hasMany(Hero::class, 'hero_role', 'id');
    }
}
