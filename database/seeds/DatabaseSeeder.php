<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Menjalankan seeder  provinsi, kota dan kecamatan
        $this->call(ProvinceTableSeeder::class);
        $this->call(CityTableSeeder::class);
        // $this->call(DistrictTableSeeder::class);
        // Tambahan untuk ngedummy user 
        // $this->call(UsersTableSeeder::class); 
    }
}
