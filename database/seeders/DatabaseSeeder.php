<?php

namespace Database\Seeders;

use App\Models\User;
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
        $this->call([
            CategorySeeder::class,
            CommentSeeder::class,
            DiscountSeeder::class,
            OrderSeeder::class,
            PaymentSeeder::class,
            AttTitleSeeder::class,
            AttValueSeeder::class,
            ProductSeeder::class,
            UserSeeder::class,
        ]);
    }
}
