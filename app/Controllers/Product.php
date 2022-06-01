<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use App\Models\EmailModel; 

class Product extends ResourceController
{
    public function __construct() {
        $this->emailModel = new EmailModel();
    }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        $products = $this->emailModel->paginate(5, 'products');

        $payload = [
            "products" => $products,
            "pager" => $this->productModel->pager
        ];

        echo view('product/index', $payload);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        echo view('product/new');
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        try{
            $validation=$this->validate([
                'email'=>'is_unique[emails.email]',
            ],
        );
       if(!$validation){
           return view ('product/edit');
       }
       else{
      
        $payload = [
            "id" => uniqid(),
            "name" => $this->request->getPost('name'),
            "email" => $this->request->getPost('email'),
        ];

        $this->emailModel->insert($payload);
        return view ('product/new');
    }
        }
    catch(\Exception $e) {
        return redirect()->to(previous_url());
    }
    }
    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        
    }


    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
    
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        $products = $this->productModel->find($id);
        unlink('photos/' .$products['photo']);
        $this->productModel->delete($id);
        return redirect()->to('/product');
    }
}