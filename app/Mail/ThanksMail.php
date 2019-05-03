<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ThanksMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $text;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name='test様', $text='testText')
    {
        $this->title = sprintf('%s様、ご注文ありがとうございます。', $name);
        $this->text = $text;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendPlainMail')
            ->text('emails.sendPlainMail')
            ->subject($this->title)
            ->with(['text' => $this->text]);
    }
}
