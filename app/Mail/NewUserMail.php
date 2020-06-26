<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data , $password)
    {
        $this->data = $data;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.new_user' , ['data' => $this->data , 'password' => $this->password])->subject('أهلاََ بك رسالة مهمة تخص حسابك مكتبة كان يما كان');
    }
}
