<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Restaurant;

class RestaurantApproved extends Mailable
{
    use Queueable, SerializesModels;

    public $restaurant;

    public function __construct(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }

    public function build()
    {
        return $this->subject('Your Restaurant Has Been Approved!')
                    ->view('emails.restaurant-approved');
    }
}