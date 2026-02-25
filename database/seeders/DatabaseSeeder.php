<?php

namespace Database\Seeders;

use App\Models\Campaign;
use App\Models\Mail;
use App\Models\Subscribe;
use App\Models\Template;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
        ]);

        Mail::factory()->count(10)->has(Subscribe::factory(50))->create();
        Template::factory()->count(10)->create();
        Campaign::factory()->count(10)->create();
    }
}
