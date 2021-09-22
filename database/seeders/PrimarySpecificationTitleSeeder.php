<?php

namespace Database\Seeders;

use App\Models\PrimarySpecificationTitle;
use Illuminate\Database\Seeder;

class PrimarySpecificationTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrimarySpecificationTitle::create([
            'key' => 'color',
            'title' => 'رنگ',
        ]);

        PrimarySpecificationTitle::create([
            'key' => 'weight',
            'title' => 'وزن',
        ]);

        PrimarySpecificationTitle::create([
            'key' => 'dimensions',
            'title' => 'ابعاد',
        ]);

        PrimarySpecificationTitle::create([
            'key' => 'size',
            'title' => 'سایز',
        ]);

        PrimarySpecificationTitle::create([
            'key' => 'material',
            'title' => 'جنس',
        ]);

        PrimarySpecificationTitle::create([
            'key' => 'brand',
            'title' => 'برند',
        ]);

        PrimarySpecificationTitle::create([
            'key' => 'warranty',
            'title' => 'گارانتی',
        ]);
    }
}
