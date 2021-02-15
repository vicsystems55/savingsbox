<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\PaymentSchedule;

use App\User;

use Paystack;

class ChargeCardCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run:charge_card';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'deduct the amount';

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

        $paymentSchedule = PaymentSchedule::with('users')->latest()->get()->unique('custom_name');

        

        $data = [

           
            "amount" => $paymentSchedule[0]->deduction_amount,
            "authorization_code" =>  $paymentSchedule[0]->authorization_code,
            'email' => $paymentSchedule[0]->users->email

          ];


        $paymentDetails = Paystack::createCharge($data);

        PaymentSchedule::where('id', $paymentSchedule[0]->id )->update([
            'status' => 'processed'
        ]);

        dd($paymentDetails);

        // dd($paymentSchedule);

        //   dd($paymentSchedule[0]->users->email);

        // dd($paymentSchedule[0]->authorization_code);

        // dd($paymentSchedule[0]->deduction_amount);
    }
}
