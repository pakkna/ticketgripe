<?php

use Illuminate\Database\Seeder;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'username' => 'syed sifat',
            'fullname' => 'Sifat Rahman',
            'email' => 'syedsifat02@gmail.com',
            'password' => '$2y$10$V9GPzUfm27SIapicWPStNO583mzfyH1K7haMYvpyJANoi0q1TI9iq',
            'user_type' => 'Admin',
            'status' => 1,
            'remember_token' => 'gzsqo56hfWxILnSnHwWDPge7Pkt929ubMpLseqJq76VHahv8k2JkArr1KvlV',
            'created_at' => '2020-02-13 00:00:00',
        ]; 
        
        DB::table('users')->insert($data);
    }
}
