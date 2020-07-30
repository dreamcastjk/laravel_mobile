<?php

use Illuminate\Database\Seeder;

/**'
 * Class CategorySeeder
 */
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Category::create([
            'name' => 'Мобильные телефоны',
            'code' => 'mobiles',
            'description' => 'Описание к мобильным телефонам',
        ]);

        \App\Category::create([
            'name' => 'Портативная техника',
            'code' => 'portable',
            'description' => 'Описание к портативной технике',
        ]);

        \App\Category::create([
            'name' => 'Мобильные телефоны',
            'code' => 'tech',
            'description' => 'Описание к разделу бытовой техники',
        ]);
    }
}
