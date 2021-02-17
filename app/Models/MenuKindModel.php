<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuKindModel extends Model
{
    use HasFactory;

    protected $table = 'menukind';
    protected $primaryKey = 'MenuKindId';
}
