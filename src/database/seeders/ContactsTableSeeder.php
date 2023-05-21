<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $param = [
         'fullname' => '山田太郎',
         'gender' => '1',
         'email' => 'test@example.com',
         'postcode' => '123-4567',
         'address' => '東京都渋谷区千駄ヶ谷1-2-3',
         'building_name' => '千駄ヶ谷マンション101',
         'option' => 'aaa',
        ];
        DB::table('contacts')->insert($param);
    }
}
