<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class sendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $pesan;
    
    /**
     * Create a new message instance.
     */
    public function __construct($name, $email, $phone, $pesan)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->pesan = $pesan;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Email',
        );
    }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->from($this->email)
                     ->view('emails.guest')
                     ->with([
                         'name' => $this->name,
                         'email' => $this->email,
                         'phone' => $this->phone,
                         'pesan' => $this->pesan,
                     ]);
    }
}
