<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'positions'; // Tên table trong database
    protected $guarded = ['']; // Tùy chỉnh mọi dữ liệu
}
