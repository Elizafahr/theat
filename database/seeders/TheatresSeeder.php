<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Theatre;

class TheatresSeeder extends Seeder
{ /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        Theatre::create([
            'name' => 'Большой театр',
            'address' => 'Театральная площадь, 1',
            'phone' => '+74951234567',
            'website' => 'www.bolshoi.ru',
            'description' => 'Знаменитый театр оперы и балета',
        ]);

        Theatre::create([
            'name' => 'Малый театр',
            'address' => 'Театральная площадь, 2',
            'phone' => '+74951234568',
            'website' => 'www.maly.ru',
            'description' => 'Классический драматический театр',
        ]);
    }
}