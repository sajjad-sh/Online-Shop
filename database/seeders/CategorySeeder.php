<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Category::create(['id' => '0', 'parent_id' => null, 'slug' => 'main', 'name' => 'کالا', 'description' => null, 'icon' => 'fas fa-shopping-basket']);

        Category::create(['id' => '1', 'parent_id' => 0, 'slug' => 'electronic-devices', 'name' => 'کالای دیجیتال', 'description' => null, 'icon' => 'fas fa-laptop']);
        Category::create(['id' => '2', 'parent_id' => 0, 'slug' => 'food-beverage', 'name' => 'کالاهای سوپرمارکتی', 'description' => null, 'icon' => 'fas fa-cheese']);

        Category::create(['id' => '3', 'parent_id' => 0, 'slug' => 'sport-entertainment', 'name' => 'ورزش و سفر', 'description' => null, 'icon' => 'fas fa-baseball-ball']);

        Category::create(['id' => '4', 'parent_id' => 0, 'slug' => 'personal-appliance', 'name' => 'زیبایی و سلامت', 'description' => null, 'icon' => 'fas fa-h-square']);
        Category::create(['id' => '5', 'parent_id' => 0, 'slug' => 'apparel', 'name' => 'مد و پوشاک', 'description' => null, 'icon' => 'fab fa-cotton-bureau']);
        Category::create(['id' => '6', 'parent_id' => 0, 'slug' => 'home-and-kitchen', 'name' => 'خانه و آشپزخانه', 'description' => null, 'icon' => 'fas fa-sink']);

        Category::create(['id' => '7', 'parent_id' => 0, 'slug' => 'book-and-media', 'name' => 'لوازم التحریر', 'description' => null, 'icon' => 'fas fa-book']);

        Category::create(['id' => '8', 'parent_id' => 1, 'slug' => 'laptop', 'name' => 'لپتاپ', 'description' => null, 'icon' => 'fas fa-laptop']);
        Category::create(['id' => '9', 'parent_id' => 1, 'slug' => 'mobile', 'name' => 'موبایل', 'description' => null, 'icon' => 'fas fa-mobile-alt']);

        Category::create(['id' => '10', 'parent_id' => 2, 'slug' => 'breakfast', 'name' => 'صبحانه', 'description' => null, 'icon' => 'fas fa-coffee']);
        Category::create(['id' => '11', 'parent_id' => 2, 'slug' => 'dairy', 'name' => 'لبنیات', 'description' => null, 'icon' => 'fas fa-ice-cream']);

        Category::create(['id' => '12', 'parent_id' => 4, 'slug' => 'beauty', 'name' => 'لوازم آرایشی', 'description' => null, 'icon' => '/storage/categories/icons/cat-10.jpg']);
        Category::create(['id' => '13', 'parent_id' => 4, 'slug' => 'personal-care', 'name' => 'لوازم بهداشتی', 'description' => null, 'icon' => 'fas fa-tooth']);

        Category::create(['id' => '14', 'parent_id' => 5, 'slug' => 'men-clothing', 'name' => 'لباس مردانه', 'description' => null, 'icon' => 'fas fa-tshirt']);
        Category::create(['id' => '15', 'parent_id' => 5, 'slug' => 'women-clothing', 'name' => 'لباس زنانه', 'description' => null, 'icon' => 'fas fa-venus']);

        Category::create(['id' => '16', 'parent_id' => 6, 'slug' => 'video-audio-entertainment', 'name' => 'صوتی و تصویری', 'description' => null, 'icon' => 'fas fa-tv']);
        Category::create(['id' => '17', 'parent_id' => 6, 'slug' => 'home-kitchen-appliances', 'name' => 'آشپزخانه', 'description' => null, 'icon' => 'fas fa-faucet']);


        Category::create(['id' => '18', 'parent_id' => 9, 'slug' => 'mobile-samsung', 'name' => 'سامسونگ', 'description' => null, 'icon' => null]);
        Category::create(['id' => '19', 'parent_id' => 9, 'slug' => 'mobile-huawei', 'name' => 'هوآوی', 'description' => null, 'icon' => null]);
        Category::create(['id' => '20', 'parent_id' => 9, 'slug' => 'mobile-apple', 'name' => 'اپل', 'description' => null, 'icon' => null]);
        Category::create(['id' => '21', 'parent_id' => 9, 'slug' => 'mobile-xiaomi', 'name' => 'شیائومی', 'description' => null, 'icon' => null]);
        Category::create(['id' => '22', 'parent_id' => 9, 'slug' => 'mobile-honor', 'name' => 'آنر', 'description' => null, 'icon' => null]);
        Category::create(['id' => '23', 'parent_id' => 9, 'slug' => 'mobile-nokia', 'name' => 'نوکیا', 'description' => null, 'icon' => null]);
        Category::create(['id' => '24', 'parent_id' => 9, 'slug' => 'mobile-nokia', 'name' => 'یازده دو صفر', 'description' => null, 'icon' => null]);

        Category::create(['id' => '25', 'parent_id' => 8, 'slug' => 'laptop-acer', 'name' => 'ایسر', 'description' => null, 'icon' => null]);
        Category::create(['id' => '26', 'parent_id' => 8, 'slug' => 'laptop-lenovo', 'name' => 'لنووو', 'description' => null, 'icon' => null]);
        Category::create(['id' => '27', 'parent_id' => 8, 'slug' => 'laptop-mac', 'name' => 'مک‌بوک', 'description' => null, 'icon' => null]);
        Category::create(['id' => '28', 'parent_id' => 8, 'slug' => 'laptop-dell', 'name' => 'دل', 'description' => null, 'icon' => null]);
        Category::create(['id' => '29', 'parent_id' => 8, 'slug' => 'laptop-msi', 'name' => 'ام‌اس‌آی', 'description' => null, 'icon' => null]);
        Category::create(['id' => '30', 'parent_id' => 8, 'slug' => 'laptop-asus', 'name' => 'ایسوس', 'description' => null, 'icon' => null]);

        Category::create(['id' => '31', 'parent_id' => 10, 'slug' => 'breakfast-cream', 'name' => 'خامه', 'description' => null, 'icon' => null]);
        Category::create(['id' => '32', 'parent_id' => 10, 'slug' => 'breakfast-jam', 'name' => 'مربا', 'description' => null, 'icon' => null]);
        Category::create(['id' => '33', 'parent_id' => 10, 'slug' => 'breakfast-honey', 'name' => 'عسل', 'description' => null, 'icon' => null]);
        Category::create(['id' => '34', 'parent_id' => 10, 'slug' => 'breakfast-sesame', 'name' => 'کنجد', 'description' => null, 'icon' => null]);
        Category::create(['id' => '35', 'parent_id' => 10, 'slug' => 'breakfast-date-palm', 'name' => 'خرما', 'description' => null, 'icon' => null]);

        Category::create(['id' => '36', 'parent_id' => 11, 'slug' => 'dairy-butter', 'name' => 'کره', 'description' => null, 'icon' => null]);
        Category::create(['id' => '37', 'parent_id' => 11, 'slug' => 'dairy-liquon-cheese', 'name' => 'پنیر لیقوان', 'description' => null, 'icon' => null]);
        Category::create(['id' => '38', 'parent_id' => 11, 'slug' => 'dairy-nonliquon-cheese', 'name' => 'پنیر غیر لیقوان', 'description' => null, 'icon' => null]);
        Category::create(['id' => '39', 'parent_id' => 11, 'slug' => 'dairy-dough', 'name' => 'دوغ', 'description' => null, 'icon' => null]);
        Category::create(['id' => '40', 'parent_id' => 11, 'slug' => 'dairy-yogurt', 'name' => 'ماست', 'description' => null, 'icon' => null]);
        Category::create(['id' => '41', 'parent_id' => 11, 'slug' => 'dairy-yogurt-shol-and-vel', 'name' => 'ماست شل و ول', 'description' => null, 'icon' =>
            null]);
        Category::create(['id' => '42', 'parent_id' => 11, 'slug' => 'dairy-milk', 'name' => 'شیر', 'description' => null, 'icon' => null]);
        Category::create(['id' => '43', 'parent_id' => 11, 'slug' => 'dairy-complete-sheep', 'name' => 'گوسفند درسته', 'description' => null, 'icon' => null]);


    }
}
