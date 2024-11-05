<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;

class NewsSeeder extends Seeder
{ /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        News::create([
            'title' => 'Большой театр объявляет новый сезон',
            'content' => 'В новом сезоне зрителей ждет множество премьер и гастролей...',
            'user_id' => 1,
            'theatre_id' => 1,
        ]);

        News::create([
            'title' => 'Малый театр представляет премьеру',
            'content' => 'Новая постановка пьесы...',
            'user_id' => 1,
            'theatre_id' => 2,
        ]);
    }
}