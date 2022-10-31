<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Promise;
use App\Models\Task;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\Task::factory(5)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'firstname' => 'Francisco Eduardo',
            'lastname' => 'Ramirez',
            'username' => 'EduRamirez',
            'email' => 'eduardo.ramirez2025@poma.superate.org.sv',
            'password' => 'password',
            'remember_token' => Str::random(10),
            'avatar' => 6,
        ]);

        User::factory()->create([
            'firstname' => 'Julio Manuel',
            'lastname' => 'Lopez Cornelio',
            'username' => 'ManuLopez',
            'email' => 'julio.lopez2025@poma.superate.org.sv',
            'password' => 'password',
            'remember_token' => Str::random(10),
            'avatar' => 2,
        ]);

        User::factory()->create([
            'firstname' => 'Margareth Sarai',
            'lastname' => 'Garcia Sanchez',
            'username' => 'SariGarcia',
            'email' => 'sarai.garcia2025@poma.superate.org.sv',
            'password' => 'password',
            'remember_token' => Str::random(10),
            'avatar' => 3,
        ]);

        User::factory()->create([
            'firstname' => 'Maria Samantha',
            'lastname' => 'Soriano Perez',
            'username' => 'SamSoriano',
            'email' => 'maria.soriano2025@poma.superate.org.sv',
            'password' => 'password',
            'remember_token' => Str::random(10),
            'avatar' => 5,
        ]);

        User::factory()->create([
            'firstname' => 'Juan Antonio',
            'lastname' => 'Guardado Hernandez',
            'username' => 'ToniHernandez',
            'email' => 'antonio.hernandez2025@poma.superate.org.sv',
            'password' => 'password',
            'remember_token' => Str::random(10),
            'avatar' => 4,
        ]);

        User::factory()->create([
            'firstname' => 'Admin',
            'lastname' => 'A',
            'username' => 'admin',
            'email' => 'admin.a2025@poma.superate.org.sv',
            'password' => 'admin',
            'remember_token' => Str::random(10),
            'avatar' => 6,
        ]);


        //User 2 Promise 1
        Promise::factory()->create([
            'title' => 'Share more with my family',
            'description' => 'I want to learn how to play guitar, so I can play a song for my friends',
            'public' => true,
            'user_id' => 2,
            'status' => false,
        ]);

        //User 1 Promise 2
        Promise::factory()->create([
            'title' => 'Learn how to play the guitar',
            'description' => 'I want to learn how to play guitar, so I can play a song for my friends',
            'public' => true,
            'user_id' => 1,
            'status' => false,
        ]);

        //User 5 Promise 3
        Promise::factory()->create([
            'title' => 'Get more organized with all my activities',
            'description' => 'Check on Focus your mind to do so',
            'public' => true,
            'user_id' => 3,
            'status' => false,
        ]);

        //User 5 Promise 4
        Promise::factory()->create([
            'title' => 'Lower weight',
            'description' => 'I want to lose 20 pounds',
            'public' => true,
            'user_id' => 5,
            'status' => false,
        ]);

        //User 1 Promise 5
        Promise::factory()->create([
            'title' => 'Visit my grandfather',
            'description' => 'I miss my grandfather. I promised him that I would meet him soon',
            'public' => false,
            'user_id' => 1,
            'status' => false,
        ]);

        //User 2 Promise 6
        Promise::factory()->create([
            'title' => 'Retake my social, mental and physical wellness practices',
            'description' => 'Read more information on Brain Setters to achieve my goal',
            'public' => true,
            'user_id' => 5,
            'status' => false,
        ]);

        //User 3 Promise 7
        Promise::factory()->create([
            'title' => 'Eat more healthy',
            'description' => 'Practice more healthy habits, and check on recepies on Easy Meals',
            'public' => true,
            'user_id' => 3,
            'status' => false,
        ]);

        //User 4 Promise 8
        Promise::factory()->create([
            'title' => 'Take care of my mental health',
            'description' => 'Check on Other-self for some awesome tips and get help',
            'public' => true,
            'user_id' => 4,
            'status' => false,
        ]);



        //User 5 Promise 9
        Promise::factory()->create([
            'title' => 'Share my talents',
            'description' => 'Register on Superate Got Talent to show my talent to my classmates',
            'public' => true,
            'user_id' => 5,
            'status' => false,
        ]);

        //User 4 Promise 10
        Promise::factory()->create([
            'title' => 'Practice giving back',
            'description' => 'Register school supplies on H4H to practice giving back',
            'public' => true,
            'user_id' => 4,
            'status' => false,
        ]);

        //User 1 Promise 11
        Promise::factory()->create([
            'title' => 'Have more fluency while speaking in english',
            'description' => 'I want to express myself in a fluent and efficient way improving day by day',
            'public' => true,
            'user_id' => 1,
            'status' => false,
        ]);


        //Promise 11
        Task::factory()->create([
            'title' => 'Watch movies',
            'description' => 'Watch movies in English as practice',
            'promise_id' => 11,
            'status' => true,
            'deadline' => '2022-10-30',
        ]);
        Task::factory()->create([
            'title' => 'Record audio',
            'description' => 'Record myself speaking in English to improve on my pronunciation',
            'promise_id' => 11,
            'status' => true,
            'deadline' => '2022-11-03',
        ]);
        Task::factory()->create([
            'title' => 'Read books in English',
            'description' => 'Read books to get more English vocabulary',
            'promise_id' => 11,
            'status' => false,
            'deadline' => '2023-03-15',
        ]);


        //Promise 4
        Task::factory()->create([
            'title' => 'Exercise',
            'description' => 'Seek for a routine on Youtube',
            'promise_id' => 4,
            'status' => true,
            'deadline' => '2022-10-29',
        ]);
        Task::factory()->create([
            'title' => 'Drink water',
            'description' => 'Have a bottle of water always on my hands',
            'promise_id' => 4,
            'status' => true,
            'deadline' => '2022-12-31',
        ]);


        //Promise 2
        Task::factory()->create([
            'title' => 'Practice',
            'description' => 'Practice plucking exercises',
            'promise_id' => 2,
            'status' => true,
            'deadline' => '2022-11-18',
        ]);

        Task::factory()->create([
            'title' => 'Learn songs',
            'description' => 'Learn some easy songs to start',
            'promise_id' => 2,
            'status' => false,
            'deadline' => '2023-2-14',
        ]);

        //Promise 1
        Task::factory()->create([
            'title' => 'Work',
            'description' => 'Do all my stuff before to spend time with them',
            'promise_id' => 1,
            'status' => true,
            'deadline' => '2022-11-1',
        ]);
    }
}
