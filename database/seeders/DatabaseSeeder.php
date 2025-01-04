<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Muhammadnabi',
            'email' => 'xoliqulovmuhammadnabi842@gmail.com',
        ]);
        for ($i=1; $i <=100; $i++) { 
            Category::create([
                'name'=>json_encode([
                    'uz'=>'Categorya-'.$i,
                    'ru'=>'Категоря-'.$i,
                    'eng'=>'Category-'.$i,
                ],true)
            ]);
        }
        for ($i = 1; $i <= 30; $i++) {
            News::create([
                'title' => [
                    'uz' => 'taytle' . $i,
                    'eng' => 'title' . $i,
                    'ru' => 'титле' . $i,
                ],
                'description' => [
                    'uz' => 'deskripshin' . $i,
                    'eng' => 'description' . $i,
                    'ru' => 'дескриптион' . $i,
                ],
                'category_id' => rand(1, 100),
            ]);
        }
        
    }
}
