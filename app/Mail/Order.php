<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Order extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order;
    public $cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $order, $cart)
    {
        $this->user=$user;
        $this->order=$order;
        $this->cart=$cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.emails');
    }
}
