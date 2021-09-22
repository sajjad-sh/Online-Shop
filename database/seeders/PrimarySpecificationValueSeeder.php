<?php

namespace Database\Seeders;

use App\Models\PrimarySpecificationValue;
use Illuminate\Database\Seeder;

class PrimarySpecificationValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrimarySpecificationValue::create([
            'spec_title_id' => '1',
            'value' => 'قرمز',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '1',
            'value' => 'آبی',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '1',
            'value' => 'زرد',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '6',
            'value' => 'Lenovo',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '6',
            'value' => 'ASUS',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '6',
            'value' => 'HP',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '6',
            'value' => 'Apple',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '6',
            'value' => 'Huawei',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '6',
            'value' => 'Dell',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '6',
            'value' => 'Acer',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '6',
            'value' => 'Microsoft',
        ]);
        PrimarySpecificationValue::create([
            'spec_title_id' => '6',
            'value' => 'MSI',
        ]);
    }
}
