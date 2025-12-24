<?php

namespace App\Controllers;

use App\Models\BookingModel;
use CodeIgniter\Controller;

class Calendar extends Controller
{
    public function events()
    {
        $model = new BookingModel();
        $bookings = $model->findAll();

        $events = [];
        foreach ($bookings as $b) {
            $events[] = [
                'title' => 'Booked',
                'start' => $b['date'],
                'status' => 'booked'
            ];
        }

        return $this->response->setJSON($events);
    }

    public function book()
{
    $model = new BookingModel();

    $data = [
        'client_name' => $this->request->getPost('client_name'),
        'address'     => $this->request->getPost('address'),
        'email'       => $this->request->getPost('email'),
        'phone'       => $this->request->getPost('phone'),
        'date'        => $this->request->getPost('date'),
        'time'        => $this->request->getPost('time'),
        'service_id'  => $this->request->getPost('service_id'),
        'status'      => 'pending',
    ];

    // Simpan ke database
    if ($model->insert($data)) {
        // ✅ Ambil ID booking terbaru
        $bookingId = $model->getInsertID();

        // ✅ Kirim kembali ke frontend
        return $this->response->setJSON([
            'success' => true,
            'booking_id' => $bookingId
        ]);
    } else {
        return $this->response->setJSON([
            'success' => false,
            'error' => 'Database insert failed'
        ]);
    }
}

    
}
