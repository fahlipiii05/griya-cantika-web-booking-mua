<?php

namespace App\Models;

use CodeIgniter\Model;

class BookingModel extends Model
{
    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'client_name', 'address', 'email', 'phone', 'date', 'time', 'service_id', 'status'
    ];
    public $timestamps = false;
}
