<?php

namespace App\Mail;

use App\Exports\UsersExport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Maatwebsite\Excel\Facades\Excel;

class ExportXL extends Mailable
{
     use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {


       $handle = fopen(public_path('storage/users.xlsx'), 'r');
        return $this->view('emails.ExportXL')
       // ->attach('public/storage/users.xlsx')
        ->attach(public_path('storage/users.xlsx'))
          ;
    }
}
