<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ProductMigration extends Migration
{
    public function up()
	{
		$this->forge->addField([
			"id" => [
				"type" => "INT",
				"auto_increment" => true,
				"unsigned" => true,
				"constraint" => 5
			],
			"name" => [
				"type" => "VARCHAR",
				"constraint" => 50,
				"null" => false
			],
			"description" => [
				"type" => "TEXT",
				"null" => true
			],
			"cost" => [
				"type" => "INT",
				"constraint" => 5,
				"null" => false
			],
			"product_image" => [
				"type" => "VARCHAR",
				"constraint" => 150,
				"null" => true
			]
		]);

		$this->forge->addPrimaryKey("id");
		$this->forge->createTable("products");
	}

	public function down()
	{
		$this->forge->dropTable("products");
	}
}