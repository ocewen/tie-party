<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class VerifyMail extends Mailable
{
use Queueable, SerializesModels;
public $user;
public $confirmation_code;
/**
* Create a new message instance.
*
* @return void
*/
public function __construct($user, $emp = 'N')
{
    if( $emp == 'S' )
    {
        $this->confirmation_code = $user;
    }
     else 
    {
        $this->user = $user;
        $this->confirmation_code = $user['confirmation_code'];
    }
}
/**
* Build the message.
*
* @return $this
*/
public function build()
{
return $this->view('verify');
}
}
