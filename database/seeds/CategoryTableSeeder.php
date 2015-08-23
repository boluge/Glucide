<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Categories;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->delete();
        Categories::create([
            ['id' => '1' ,'name' => 'Céréales', 'slug' => 'cereales'],
            ['id' => '2' ,'name' => 'Fruits', 'slug' => 'fruits']
        ]);

    }
}
