<?php

namespace App\Mail;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use PDF;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->data);
        // $data["email"] = "test@gmail.com";
        // $data["title"] = "How To Generate PDF And Send Email In Laravel 8 - Websolutionstuff";
        // $data["body"] = "How To Generate PDF And Send Email In Laravel 8";

        view()->share('data', $this->data);
        $pdf = PDF::loadView('pdf.invoice');
        $pdf->setPaper('A4', 'portrait');

        return $this->subject('Tire Studio Invoice')->attachData($pdf->output(), "invoice.pdf")->view('emails.invoice');
    }
}
