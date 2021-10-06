<?php

namespace Database\Seeders;

use App\Models\AttValue;
use Illuminate\Database\Seeder;

class AttValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AttValue::create([
            'att_title_id' => '1',
            'value' => 'قرمز',
        ]);
        AttValue::create([
            'att_title_id' => '1',
            'value' => 'آبی',
        ]);
        AttValue::create([
            'att_title_id' => '1',
            'value' => 'زرد',
        ]);
        AttValue::create([
            'att_title_id' => '6',
            'value' => 'Lenovo',
        ]);
        AttValue::create([
            'att_title_id' => '6',
            'value' => 'ASUS',
        ]);
        AttValue::create([
            'att_title_id' => '6',
            'value' => 'HP',
        ]);
        AttValue::create([
            'att_title_id' => '6',
            'value' => 'Apple',
        ]);
        AttValue::create([
            'att_title_id' => '6',
            'value' => 'Huawei',
        ]);
        AttValue::create([
            'att_title_id' => '6',
            'value' => 'Dell',
        ]);
        AttValue::create([
            'att_title_id' => '6',
            'value' => 'Acer',
        ]);
        AttValue::create([
            'att_title_id' => '6',
            'value' => 'Microsoft',
        ]);
        AttValue::create([
            'att_title_id' => '6',
            'value' => 'MSI',
        ]);
    }
}
