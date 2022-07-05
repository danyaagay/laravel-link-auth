<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginMail extends Mailable
{
    use Queueable, SerializesModels;

    public $token;
    public $expire;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token, $expire)
    {
        $this->token = $token;
        $this->expire = $expire;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('noreply@danaay.com', 'Danaay')
            ->subject('Авторизация')
            ->view('email.login', ['token' => $this->token]);
    }
}
