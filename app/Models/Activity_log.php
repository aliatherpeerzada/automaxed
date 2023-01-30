<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity_log extends Model
{
    use HasFactory;

    protected $fillable=[
        'license_product_name',
        'license_key',
'license_customer_name',
'license_customer_email',
'license_customer_country',
'license_customer_ip',
'license_hardware_id',
'license_action_status'];
}
