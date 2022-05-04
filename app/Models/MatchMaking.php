<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchMaking extends Model
{
    use HasFactory;
    protected $table = 'match_makings';
    protected $primaryKey = 'id';
    protected $fillable = ['mode', 'total_ban'];
}
