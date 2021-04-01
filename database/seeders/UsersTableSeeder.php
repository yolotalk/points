<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$pid = 0;
    	for ($i=0; $i<50; $i++) {
    		$user = [
    			"username" => uniqid(),
	            "password" => bcrypt('secret'),
	            "pid" => $pid,
	            "created_at" => date("Y-m-d H:i:s"),
	            "updated_at" => date("Y-m-d H:i:s"),
    		];

    		$pid = DB::table("users")->insertGetId($user);
    		print_r($user);
    	}
        
    }
}
