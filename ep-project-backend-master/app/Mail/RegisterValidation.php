<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterValidation extends Mailable
{
    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = $this->user->name .  ' | Validação de Registro';
        $from = 'marco-bot@netflix.com';
        $fromName = 'Netflix';

        return $this->from($from, $fromName)
        ->subject($subject)
        ->view('mails.auth.registerValidation');
    }
}
