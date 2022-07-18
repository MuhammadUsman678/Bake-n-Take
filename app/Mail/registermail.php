<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class registermail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $maildetail;
    public function __construct($maildetail)
    {
        $this->maildetail=$maildetail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('Baketake@gmail.com')->subject('Shop Regitration in Bake\'n Take')->view('mail.mail')->with('maildetail', $this->maildetail);
    }
}
