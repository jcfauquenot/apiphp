<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use Faker\Factory;

class ClientSeeder extends Seeder
{
    public function run()
    {
        for ($i = 0; $i < 10; $i++) { //to add 10 clients. Change limit as desired
            $this->db->table('client')->insert($this->generateClient());
        }
    }

    private function generateClient()
    {
        $faker = Factory::create();
        return [
            'name' => $faker->username,
            'email' => $faker->email,
            'retainer_fee' => random_int(100000, 100000000)
        ];
    }
}