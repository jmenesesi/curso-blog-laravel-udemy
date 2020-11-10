<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $category = new Category;
        $category->name = "Categoria 1";
        $category->save();

        $category = new Category;
        $category->name = "Categoria 2";
        $category->save();

        $category = new Category;
        $category->name = "Categoria 3";
        $category->save();

        $category = new Category;
        $category->name = "Explore";
        $category->save();

        $category = new Category;
        $category->name = "Watch";
        $category->save();

        $category = new Category;
        $category->name = "Live";
        $category->save();

        $category = new Category;
        $category->name = "Give";
        $category->save();
    }
}
