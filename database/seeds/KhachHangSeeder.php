<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class KhachHangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0 ; $i <= 10 ; $i++)
        {
            DB::table('khachhang')->insert(
                [
                    'kh_hoten' => 'ABC'.$i,
                    // 'kh_sdt' => '087890090'.rand(1,9),
                    'kh_diachi' => 'Cần Thơ',
                    'username' => 'ABC'.$i,
                    'password' => Hash::make(123),
                    'created_at' => Carbon::now()
                ]
            );
        }
    }
}
