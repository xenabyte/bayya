<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    const STATUS_FAILED = 0;
    const STATUS_SUCCESS = 1;
    const STATUS_PENDING = 2;

}
