<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Brand::query()->update(['category_id' => null]);
        Category::query()->delete();
        \DB::statement('ALTER TABLE categories AUTO_INCREMENT = 1');
        $mapping = [
            'Televisies & Monitors' => ['BenQ', 'AOC', 'Samsung', 'Sony', 'LG Electronics', 'Toshiba', 'RCA'],
            'Telefoons' => ['ALCATEL Mobile Phones', 'Huawei', 'ZTE', 'Motorola', 'Palm', 'Samsung', 'Apple', 'Pantech', 'Aastra Telecom', 'VTech', 'Uniden', 'AT&T'],
            'Audio' => ['JBL', 'Crown Audio', 'MTX Audio', 'Musica', 'DCM Speakers', 'Samson', 'Yamaha', 'Pioneer'],
            'Computers & Laptops' => ['Dell', 'Fujitsu', 'Lenovo', 'Apple', 'Toshiba'],
            'Navigatie & GPS' => ['Garmin', 'Furuno', 'Humminbird'],
            'Tuinmachines' => ['Land Pride', 'Grizzly', 'Kohler'],
            'Fitness' => ['ProForm'],
            'Netwerk & Accessoires' => ['IOGear', 'DigiTech', 'GE'],
            'Telecom' => ['Aastra Telecom', 'VTech', 'Uniden', 'AT&T'],
            'Optiek' => ['Carl Zeiss', 'Kowa'],
            'Industrie & Zakelijk' => ['TPI Corporation'],
        ];

        foreach ($mapping as $categoryName => $brandNames) {
            $category = Category::firstOrCreate(['name' => $categoryName]);

            foreach ($brandNames as $brandName) {
                Brand::where('name', $brandName)
                    ->update(['category_id' => $category->id]);
            }
        }
    }
}
