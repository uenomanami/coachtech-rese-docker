<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class FromAdministorMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $title, $content)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->title = $title;
        $this->content = $content;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->email)
            ->subject($this->title)
            ->from('test@example', 'Rese運営')
            ->view('from_admin_mail_send')
            ->with([
                'name' => $this->name,
                'content' => $this->content,
                'title' => $this->content,
            ]);
    }
}
