<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ErrorMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $error;
    public $factuur;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($error, $factuur)
    {
        $this->error = $error;
        $this->factuur = $factuur;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.errormessage')->with([
            'error_message' => $this->error->error->message->value,
            'factuurnummer' => $this->factuur->number,
        ]);;
    }
}
