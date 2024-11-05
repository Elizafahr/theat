<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'theatre_id' => 1,
            'title' => 'Лебединое озеро',
            'description' => 'Балет в двух действиях',
            'start_date' => '2024-03-01',
            'start_time' => '19:00:00',
            'end_date' => '2024-03-01',
            'end_time' => '21:30:00',
            'poster' => 'https://example.com/poster1.jpg',
        ]);

        Event::create([
            'theatre_id' => 2,
            'title' => 'Вишневый сад',
            'description' => 'Пьеса в четырех действиях',
            'start_date' => '2024-03-05',
            'start_time' => '19:00:00',
            'end_date' => '2024-03-05',
            'end_time' => '21:00:00',
            'poster' => 'https://example.com/poster2.jpg',
        ]);
    }
}
