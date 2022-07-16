<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class approvedmail extends Mailable
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
        return $this->from('Baketake@gmail.com')->subject('Approved Shop in Bake\'n Take')->view('mail.approved')->with('maildetail', $this->maildetail);
    }
}
