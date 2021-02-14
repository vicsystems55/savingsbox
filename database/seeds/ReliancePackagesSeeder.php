<?php

use Illuminate\Database\Seeder;

class ReliancePackagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reliance_packages')->insertOrIgnore([ 
            [
                'package_name' => 'December Jollification',
                'package_description' => 'For December',
             ],
             [
                'package_name' => 'Steady Savings',
                'package_description' => 'Saving an amount over a period',
             ],

             [
                'package_name' => 'Target Savings',
                'package_description' => 'Save towards an amount',
             ],

        ]);


            


    }
}
