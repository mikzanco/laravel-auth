<?php

namespace Database\Seeders;

use App\Models\Projects;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 100; $i++){
            $new_project = new Projects();
            $new_project->name = $faker->sentence();
            $new_project->slug = Projects::generateSlug($new_project->name);
            $new_project->client_name = $faker->sentence();
            $new_project->summary = $faker->paragraph(5);
            $new_project->cover_image = 'https://t3.ftcdn.net/jpg/02/48/42/64/360_F_248426448_NVKLywWqArG2ADUxDq6QprtIzsF82dMF.jpg';
            $new_project->save();
            // dump($new_project);

        }
    }
}
