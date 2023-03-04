<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\RemindReserveMail;
use App\Models\User;
use App\Models\Store;
use Carbon\Carbon;
use App\Models\Reserve;

class RemindReserve extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:remindreserve';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to user before reserve';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reserve_date = Carbon::today();
        $reserves = Reserve::wheredate('start_at', $reserve_date)->get();
        if (isset($reserves[0])) {
            foreach ($reserves as $reserve) {
                $user = User::find($reserve->user_id);
                $store = Store::find($reserve->store_id);
                return Mail::to($user->email)->send(new RemindReserveMail($user, $store, $reserve));
            }
        }
    }
}
