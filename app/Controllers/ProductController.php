<?php

namespace App\Controllers;

//use CodeIgniter\RESTful\ResourceController
use App\Controllers\BaseController;
use App\Models\ProductModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\HTTP\ResponseInterface;

use Exception;

class ProductController extends BaseController
{
    use ResponseTrait;

    public function index()
    {
        $product_obj = new ProductModel();

		// Select all products from table	
        $products = $product_obj->findAll();
        return $this->respond($products);
       //  return $this->response->setJSON($products);
    }

    public function show($id = null)
    {
            $product_obj = new ProductModel();
            $product = $product_obj->findProductById($id);
            
            if($product){
                return $this->respond($product);
            }else{
                return $this->failNotFound('aucun produits trouve');
            }
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
            'status'   => 201,
            'error'    => null,
            'messages' => [
                'success' => 'product Saved'
            ]
        ];
        return $this->respondCreated($response);
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
        $response = [
            'status'   => 200,
            'error'    => null,
            'messages' => [
                'success' => 'Products updated successfully'
            ]
        ];
        return $this->respond($response);
	}

	public function deleteProduct($id){
		$product_obj = new ProductModel();
        $product = $product_obj->findProductById($id);
		// Delete product by ID
        if($product){
            $product_obj->delete($id);
            $response = [
                'status'   => 200,
                'error'    => null,
                'messages' => [
                    'success' => 'product successfully deleted'
                ]
            ];
            return $this->respondDeleted($response);
        } else {
            return $this->failNotFound('No products found');
        }
	}
}