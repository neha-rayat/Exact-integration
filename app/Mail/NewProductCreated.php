<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewProductCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $item;
    public $factuur;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($item, $factuur)
    {
        $this->item = $item;
        $this->factuur = $factuur;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.newproduct')->with([
            'productDescription' => $this->item->description,
            'factuurnummer' => $this->factuur->number,
        ]);;
    }
}
