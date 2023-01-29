<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class license extends Model
{
    use HasFactory;
    use SoftDeletes;
protected $fillable=[
    'license_status',
    'license_product_name',
    'license_expiry_date',
    'license_used_activations',
   'license_allowed_activations',
    'license_key',
    'license_customer_name',
    'license_customer_email',
    'license_note'
];
}
