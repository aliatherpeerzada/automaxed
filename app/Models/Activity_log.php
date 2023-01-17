<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_log extends Model
{
    use HasFactory;

    protected $fillable=[
        'license_key',
'name',
'email',
'country',
'ip','hardware_id',
'status'];
}
