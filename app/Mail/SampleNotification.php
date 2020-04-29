<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SampleNotification extends Mailable
{
    use Queueable, SerializesModels;

    protected $title;
    protected $text;
    protected $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    // public function __construct($name, $text, $data)
    // {
    //   $this->title = sprintf('%s様', $name);
    //   $this->text = $text;
    //   $this->data = $data;
    // }

    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        // return $this->view('mail.sample_mail')
        //               ->subject($this->title)
        //               ->with([
        //                   'text' => $this->text,
        //                   'data' => $this->data,
        //                 ]);

        return $this->view('mail.sample_mail')
                ->from('makao26work@gmail.com')
                ->subject('This is a test mail');
    }
}
