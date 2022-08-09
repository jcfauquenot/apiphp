<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class ProductController extends BaseController
{
    public function index()
    {
        $product_obj = new ProductModel();

		// Select all products from table	
        $products = $product_obj->findAll();
        return $this->response->setJSON($products);
    }

    public function show($id)
    {
            $product_obj = new ProductModel();
            $product = $product_obj->findProductById($id);
            return $this->response->setJSON($product);
    }


    public function insertProduct()
    {
		$product_obj = new ProductModel();
		
		// Insert product row into table
		$product_obj->insert([
			"name" => "New Product",
			"description" => "Product Sample description",
			"cost" => 120,
			"product_image" => "https://product-thumbnail-url.com"
		]);
	}
	
	public function updateProduct(){
		$product_obj = new ProductModel();

		$product_id = 5; // ID to update

		// Update product information by product id
		$product_obj->update($product_id, [
			"name" => "Update Product",
			"description" => "Product Sample description update",
			"cost" => 50,
			"product_image" => "https://product-thumbnail-url.com"
		]);
	}

	public function deleteProduct(){
		$product_obj = new ProductModel();
		$product_id = 5; // ID to delete
		// Delete product by ID
		$product_obj->delete($product_id);
	}
}