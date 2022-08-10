<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use \Faker\Factory;

class ProductSeeder extends Seeder
{
    public function run()
    {
		for($i = 0; $i < 50; $i++){
			$this->db->table("products")->insert($this->generateTestProducts());
		}
    }

    public function generateTestProducts()
    {
        $faker = Factory::create();

		return [
			"name" => $faker->sentence(2),
			"description" => $faker->sentence(10),
			"cost" => $faker->numberBetween(100, 250),
			"product_image" => $faker->imageUrl(100, 100)
		];
    }
}