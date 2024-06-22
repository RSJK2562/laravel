<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendOtp extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $mailData;
    public function __construct($mailData)
    {
        $this->mailData = $mailData;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Laravel CRUD - OTP',
        );
    }
    
    // public function envelope(): Envelope
    // {
    //     // Access the mail data property to get the subject
    //     $subject = isset($this->mailData['otp']) ? $this->mailData['otp'] : 'Laravel CRUD - OTP';

    //     // Create an envelope with the subject
    //     return new Envelope(
    //         subject: $subject,
    //     );
    // }


    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'otpMail',
            // with:['otp' => $this->mailData]
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
}
