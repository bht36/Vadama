<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;

class ContactEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    public $phone;
    public $messageContent;

    public function __construct($name, $email, $phone, $messageContent)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->messageContent = $messageContent;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address($this->email, $this->name),
            subject: 'Email from ' . $this->email,
        );
    }

    public function content(): Content
{
    return new Content(
        view: 'mail.contact',
        with: [
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'messageContent' => $this->messageContent,
        ]
    );
}


    public function attachments(): array
    {
        return [];
    }
}
