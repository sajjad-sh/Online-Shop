<?php

namespace Database\Seeders;

use App\Models\AttTitle;
use Illuminate\Database\Seeder;

class AttTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttTitle::create([
            'key' => 'color',
            'title' => 'رنگ',
        ]);

        AttTitle::create([
            'key' => 'weight',
            'title' => 'وزن',
        ]);

        AttTitle::create([
            'key' => 'dimensions',
            'title' => 'ابعاد',
        ]);

        AttTitle::create([
            'key' => 'size',
            'title' => 'سایز',
        ]);

        AttTitle::create([
            'key' => 'material',
            'title' => 'جنس',
        ]);

        AttTitle::create([
            'key' => 'brand',
            'title' => 'برند',
        ]);

        AttTitle::create([
            'key' => 'warranty',
            'title' => 'گارانتی',
        ]);
    }
}
