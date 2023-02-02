<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->command->info('Users table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/users.sql'));
        $this->command->info('Users table seeded!');

        $this->command->info('Programs table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/programs.sql'));
        $this->command->info('Programs table seeded!');

        $this->command->info('Courses table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/courses.sql'));
        $this->command->info('Courses table seeded!');

        $this->command->info('Batches table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/batches.sql'));
        $this->command->info('Batches table seeded!');

        $this->command->info('Classrooms table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/classrooms.sql'));
        $this->command->info('Classrooms table seeded!');

        $this->command->info('Teachers table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/teachers.sql'));
        $this->command->info('Teachers table seeded!');

        $this->command->info('Course Teacher Pivot table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/course_teacher.sql'));
        $this->command->info('Course Teacher Pivot table seeded!');

        $this->command->info('Students table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/students.sql'));
        $this->command->info('Students table seeded!');

        // $this->command->info('Associables table seeding!');
        // DB::unprepared(file_get_contents(__DIR__ .'./../sqls/associables.sql'));
        // $this->command->info('Associables table seeded!');

        $this->command->info('Class Session table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/class_sessions.sql'));
        $this->command->info('Class Session Pivot table seeded!');

        $this->command->info('Addendances table seeding!');
        DB::unprepared(file_get_contents(__DIR__ .'./../sqls/attendances.sql'));
        $this->command->info('Attendances table seeded!');
    }
}
