<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $booking;

    public function __construct($user, $booking,$check_in_date,$check_out_date)
    {
        $this->user = $user;
        $this->booking = $booking;
        $this->check_in_date = $check_in_date;
        $this->check_out_date = $check_out_date;
    }
    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function build()
    {
        return $this->markdown('emails.booking')
        ->with('username',$this->user)
        ->with('booking',$this->booking)
        ->with('check_in_date',$this->check_in_date)
        ->with('check_out_date',$this->check_out_date);
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Booking Email',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
