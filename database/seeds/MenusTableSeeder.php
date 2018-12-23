<?php
use App\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Menu::truncate();

        $faker = \Faker\Factory::create();

        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 30; $i++) {
            Menu::create([
                'title' => $faker->sentence,
                'price' => $faker->numberBetween($min = 1000, $max = 9000),
            ]);
        }
    }
}
