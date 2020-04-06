<?php

use Illuminate\Database\Seeder;

class JobcategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(\App\Jobcategory::class, 5)->create();
    }
}
