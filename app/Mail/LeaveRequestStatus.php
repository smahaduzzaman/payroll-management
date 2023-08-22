<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PayrollMail extends Mailable
{
    use Queueable, SerializesModels;

    public $payroll;
    protected $status;

    /**
     * Create a new message instance.
     */
    public function __construct($payroll, $status)
    {
        $this->payroll = $payroll;
        $this->status = $status;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        return $this->subject('Leave Request Status')
            ->view('emails.leave-request-status')
            ->with([
                'status' => $this->status,
            ]);
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.leave-request-status',
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
