<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 1; $i <= 10; $i++) {
            $num = ceil($i / 2);
            $code = str_repeat($num, 4);
            DB::table('products')
            ->where('id', '=', $i)
            ->update(['vendor_code' => intval($code)]);
        }
    }
}
