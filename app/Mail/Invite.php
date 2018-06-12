<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class Invite extends Mailable
{
use Queueable, SerializesModels;
public $email;
public $fiesta;
/**
* Create a new message instance.
*
* @return void
*/
public function __construct($email, $fiesta)
{
        $this->email = $email;
        $this->fiesta = $fiesta;
}
/**
* Build the message.
*
* @return $this
*/
public function build()
{
return $this->view('invitar');
}
}
