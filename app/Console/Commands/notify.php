<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Notifications\NotificareMail;
use App\Models\Complaint;
use App\Models\User;
use Notification;
use Carbon\Carbon;

class notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mail:notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $data=Carbon::now()->addDays(3)->toDateString();
        $complaints = Complaint::where('termen',$data)->whereNull('raspuns')->get();
        foreach ($complaints as $complain){

            $user=User::where('id',$complain->user_id)->first();
            Notification::send($user, new NotificareMail([
                'subject' => 'Notificare plangere NordGaz',
                'greeting' => 'Buna seara, Dr./Dna. '.$user->name,
                'body' => 'Va anuntam ca plangerea cu numar intrare '.$complain->numar_intrare. ' intrata in data de '.$complain->data_intrare. ' are ca termen de raspuns data '.$data.'.',
                'thanks' => 'Cu stima, echipa NordGaz' ,
            ]));
        }

        $details = [
            'subject' => 'Test',
            'greeting' => '',
            'body' => '',
            'thanks' => ''
        ];
        Notification::send((new User)->forceFill([
            'email' => 'madalina@infragroup.ro']), new NotificareMail($details));   
    }    
}
