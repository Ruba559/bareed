<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class PackageSeeder extends Seeder
{

    public function run()
    {
        DB::table('packages')->insert([
            'name' => 'trail',
            'facebook_accounts' => '1',
            'facebook_pages' => '1',
            'auto_replay' => '1',
            'auto_message' => '0',
            'auto_replay_campaigns' => '20',
            'auto_message_count' => '0',
            'period' => '3',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
