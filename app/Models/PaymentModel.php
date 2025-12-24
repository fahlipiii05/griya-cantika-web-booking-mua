<?php

namespace App\Models;

use CodeIgniter\Model;

class PaymentModel extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'booking_id',
        'order_id',
        'transaction_id',
        'payment_type',
        'gross_amount',
        'status',
        'payment_time'
    ];
    protected $useTimestamps = false;
}
