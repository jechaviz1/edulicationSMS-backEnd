<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DocumentMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $details;
    public $filePath;

    public function __construct($details, $filePath)
    {
        $this->details = $details;
        $this->filePath = $filePath;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
 /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.document')
                    ->with('details', $this->details)
                    ->subject($this->details['subject'])
                    ->attach($this->filePath, [
                        'as' => 'document.pdf', // You can set a custom name for the file
                        'mime' => 'application/pdf',
                    ]);
    }
}
