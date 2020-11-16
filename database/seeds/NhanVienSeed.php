<?php

use Illuminate\Database\Seeder;

class NhanVienSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for($i=0; $i < 500; $i++ ){
            $nhanVien = [
                [
                    'nv_ten' => $faker->name,
                    'nv_email' => $faker->email,
                    'username' => 'duchuy'.rand(1,999),
                    'password' => Hash::make(123)
                ]
            ];
            $addNhanVien = DB::table('nhanvien')->insert($nhanVien);
        }
    }
}
