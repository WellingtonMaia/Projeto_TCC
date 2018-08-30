<?php

use Illuminate\Database\Seeder;

class InserirProjeto extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$ramdom = str_random(10);


        for ($i=0; $i < 10; $i++) { 
            DB::table('projects')->insert([
                "name" => $ramdom,
                "client_name" => $ramdom,
                "estimate_date" => "2018-05-06 10:20:20",
                "estimate_time" => "10:10:30",
                "status" => "A",
                "project_price" => $i."943",
                "project_type" => "E"
             ]);

            // DB::table('projects_has_users')->insert([
            //     "project_id" => $i,
            //     "user_id" => 1
            // ]);
        }
        
    }
}
