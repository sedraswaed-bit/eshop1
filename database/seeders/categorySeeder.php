<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Electronics',
                'description' => 'Smartphones, laptops, cameras, and other electronic devices.',
            ],
            [
                'name' => 'Clothing',
                'description' => 'Men\'s, women\'s, and children\'s apparel.',
            ],
            [
                'name' => 'Home & Kitchen',
                'description' => 'Furniture, kitchenware, and home decor items.',
            ],
            [
                'name' => 'Books',
                'description' => 'Fiction, non-fiction, and educational books.',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
