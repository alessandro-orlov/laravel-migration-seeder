<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Programmer;

class ProgrammersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) {
          $new_programmer = new Programmer();

          $new_programmer->name = $faker->firstName();
          $new_programmer->lastname = $faker->lastname;
          $new_programmer->age = $faker->numberBetween(25, 75);
          $new_programmer->tecnology = $faker->randomElement([
            'JavaScript',
            'PHP',
            'HTML + CSS',
            'Python',
            'C based languages',
            'Basic',
            'Java',
          ]);
          $new_programmer->note = $faker->paragraph();

          $new_programmer->save();
        }
    }
}
