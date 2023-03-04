<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;

class RemindReserveMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $store, $reserve)
    {
        $this->name = $user->name;
        $this->email = $user->email;
        $this->store_name = $store->name;
        $this->reserve_date = Carbon::createFromTimeString($reserve->start_at)->format('Y-m-d');
        $this->reserve_time = Carbon::createFromTimeString($reserve->start_at)->format('H:i');
        $this->reserve_id = $reserve->id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('ご予約当日となりました')
            ->from('test@example', 'Rese運営')
            ->view('remind_reserve_mail')
            ->with([
                'name' => $this->name,
                'store_name' => $this->store_name,
                'reserve_date' => $this->reserve_date,
                'reserve_time' => $this->reserve_time,
                'reserve_id' => $this->reserve_id,

            ]);
    }
}
