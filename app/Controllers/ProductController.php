<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\API\ResponseTrait;
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
        $data = [
            'name' => $this->request->getVar('name'),
            'description' => $this->request->getVar('description'),
            'cost' => $this->request->getVar('cost'),
            'product_image' => $this->request->getVar('product_image'),
        ];
        $product = $product_obj->insert($data);

        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Data Saved'
            ]
        ];
        return $this->response->setJSON($response);

	}
	
	public function updateProduct($id){
		$product_obj = new ProductModel();
        $product = $product_obj->findProductById($id);


		// Update product information by product id
		$product_obj->update($id, [
			"name" => $this->request->getVar('name'),
			"description" => $this->request->getVar('description'),
			"cost" => $this->request->getVar('cost'),
			"product_image" => $this->request->getVar('product_image')
		]);
	}

	public function deleteProduct($id){
		$product_obj = new ProductModel();
        $product = $product_obj->findProductById($id);
		// Delete product by ID
		$product_obj->delete($id);
	}
}