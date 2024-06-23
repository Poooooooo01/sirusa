<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $telemedicine;
    public $totalAmount;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($telemedicine, $totalAmount)
    {
        $this->telemedicine = $telemedicine;
        $this->totalAmount = $totalAmount;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('email.invoice')
                    ->subject('Invoice for Your Telemedicine Transaction')
                    ->with([
                        'telemedicine' => $this->telemedicine,
                        'totalAmount' => $this->totalAmount,
                    ]);
    }
}

