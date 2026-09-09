<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    private $products;

    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->ensure_products_table();
        $this->products = $this->call->model('ProductModel');
    }

    private function ensure_products_table()
    {
        $this->db->raw("CREATE TABLE IF NOT EXISTS products (
            id INT NOT NULL AUTO_INCREMENT,
            product_name VARCHAR(100) NOT NULL,
            description TEXT NULL,
            price DECIMAL(10,2) NOT NULL DEFAULT 0.00,
            quantity INT NOT NULL DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (id)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");
    }

    public function index()
    {
        $this->call->view('products/index', [
            'products' => $this->products->all(),
            'flash' => $_SESSION['product_flash'] ?? null,
        ]);
        unset($_SESSION['product_flash']);
    }

    public function create()
    {
        $this->call->view('products/form', [
            'product' => [],
            'form_title' => 'Add product',
            'form_action' => site_url('products'),
        ]);
    }

    public function store()
    {
        $data = $this->validated_product();
        if ($data === false) {
            redirect('products/create');
        }

        $this->products->create($data);
        $_SESSION['product_flash'] = 'Product added to your catalogue.';
        redirect('products');
    }

    public function edit($id)
    {
        $product = $this->products->find($id);
        if (empty($product)) {
            show_404();
            return;
        }

        $this->call->view('products/form', [
            'product' => $product,
            'form_title' => 'Edit product',
            'form_action' => site_url('products/update/' . (int) $id),
        ]);
    }

    public function update($id)
    {
        $data = $this->validated_product();
        if ($data === false) {
            redirect('products/edit/' . (int) $id);
        }

        $this->products->update($id, $data);
        $_SESSION['product_flash'] = 'Product details updated.';
        redirect('products');
    }

    public function delete($id)
    {
        $this->products->remove($id);
        $_SESSION['product_flash'] = 'Product removed from your catalogue.';
        redirect('products');
    }

    private function validated_product()
    {
        $name = trim((string) ($this->io->post('product_name') ?? ''));
        $description = trim((string) ($this->io->post('description') ?? ''));
        $price = (float) ($this->io->post('price') ?? 0);
        $quantity = (int) ($this->io->post('quantity') ?? 0);

        if ($name === '' || strlen($name) > 100 || $price < 0 || $quantity < 0) {
            return false;
        }

        return [
            'product_name' => $name,
            'description' => $description,
            'price' => number_format($price, 2, '.', ''),
            'quantity' => $quantity,
        ];
    }
}