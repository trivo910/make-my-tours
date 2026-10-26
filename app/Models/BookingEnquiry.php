<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingEnquiry extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'from_location',
        'to_location',
        'travel_date',
        'time_slot',
        'seats',
        'vehicle_type',
        'status',
        'email_status',
        'email_error',
        'ip',
        'user_agent',
    ];

    protected function casts(): array
    {
        return [
            'travel_date' => 'date',
            'seats' => 'integer',
        ];
    }

    public function whatsappUrl(): string
    {
        $phone = preg_replace('/\D+/', '', $this->phone);
        if (strlen($phone) === 10) {
            $phone = '91'.$phone;
        }

        return 'https://wa.me/'.$phone;
    }
}
