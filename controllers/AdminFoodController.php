<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class AdminFoodController extends Controller
{
    public function index()
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $foodModel = $this->model('Food');
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        $data = [
            'foods' => $foodModel->getAll($page),
            'title' => 'Manage Foods',
            'active' => 'foods',
            'view' => 'admin/foods/index-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }

    public function create()
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $categoryModel = $this->model('Category');
        
        $data = [
            'categories' => $categoryModel->getAll(),
            'title' => 'Add Food',
            'active' => 'foods',
            'view' => 'admin/foods/create-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('admin')) {
                redirect('login');
            }
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $image = '';
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $targetDir = 'assets/uploads/';
                $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
                $targetFile = $targetDir . $fileName;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    $image = $targetFile;
                }
            }
            
            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'price' => (float)$_POST['price'],
                'image' => $image,
                'category_id' => !empty($_POST['category_id']) ? (int)$_POST['category_id'] : null,
                'is_available' => isset($_POST['is_available']) ? 1 : 0
            ];
            
            $foodModel = $this->model('Food');
            
            if ($foodModel->create($data)) {
                Session::set('success', 'Food added successfully!');
                redirect('admin/foods');
            } else {
                Session::set('error', 'Something went wrong!');
                redirect('admin/foods/create');
            }
        }
    }

    public function edit($foodId)
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $foodModel = $this->model('Food');
        $categoryModel = $this->model('Category');
        
        $data = [
            'food' => $foodModel->findById($foodId),
            'categories' => $categoryModel->getAll(),
            'title' => 'Edit Food',
            'active' => 'foods',
            'view' => 'admin/foods/edit-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }

    public function update($foodId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('admin')) {
                redirect('login');
            }
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $foodModel = $this->model('Food');
            $food = $foodModel->findById($foodId);
            
            $image = $food->image;
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $targetDir = 'assets/uploads/';
                $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
                $targetFile = $targetDir . $fileName;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                    if ($image && file_exists($image)) {
                        unlink($image);
                    }
                    $image = $targetFile;
                }
            }
            
            $data = [
                'name' => trim($_POST['name']),
                'description' => trim($_POST['description']),
                'price' => (float)$_POST['price'],
                'image' => $image,
                'category_id' => !empty($_POST['category_id']) ? (int)$_POST['category_id'] : null,
                'is_available' => isset($_POST['is_available']) ? 1 : 0
            ];
            
            if ($foodModel->update($foodId, $data)) {
                Session::set('success', 'Food updated successfully!');
                redirect('admin/foods');
            } else {
                Session::set('error', 'Something went wrong!');
                redirect('admin/foods/' . $foodId . '/edit');
            }
        }
    }

    public function delete($foodId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('admin')) {
                redirect('login');
            }
            
            $foodModel = $this->model('Food');
            $food = $foodModel->findById($foodId);
            
            if ($foodModel->delete($foodId)) {
                if ($food->image && file_exists($food->image)) {
                    unlink($food->image);
                }
                Session::set('success', 'Food deleted successfully!');
            } else {
                Session::set('error', 'Something went wrong!');
            }
            
            redirect('admin/foods');
        }
    }
}
