<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class AdminCategoryController extends Controller
{
    public function index()
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $categoryModel = $this->model('Category');
        
        $data = [
            'categories' => $categoryModel->getAll(),
            'title' => 'Manage Categories',
            'active' => 'categories',
            'view' => 'admin/categories/index-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }

    public function create()
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $data = [
            'title' => 'Add Category',
            'active' => 'categories',
            'view' => 'admin/categories/create-content'
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
            
            $image = null;
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
                'image' => $image,
                'display_order' => isset($_POST['display_order']) ? (int)$_POST['display_order'] : 0,
                'is_active' => isset($_POST['is_active']) ? 1 : 0
            ];
            
            $categoryModel = $this->model('Category');
            
            if ($categoryModel->create($data)) {
                Session::set('success', 'Category added successfully!');
                redirect('admin/categories');
            } else {
                Session::set('error', 'Something went wrong!');
                redirect('admin/categories/create');
            }
        }
    }

    public function edit($categoryId)
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $categoryModel = $this->model('Category');
        
        $data = [
            'category' => $categoryModel->findById($categoryId),
            'title' => 'Edit Category',
            'active' => 'categories',
            'view' => 'admin/categories/edit-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }

    public function update($categoryId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('admin')) {
                redirect('login');
            }
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $categoryModel = $this->model('Category');
            $category = $categoryModel->findById($categoryId);
            
            $image = $category->image;
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
                'image' => $image,
                'display_order' => isset($_POST['display_order']) ? (int)$_POST['display_order'] : 0,
                'is_active' => isset($_POST['is_active']) ? 1 : 0
            ];
            
            if ($categoryModel->update($categoryId, $data)) {
                Session::set('success', 'Category updated successfully!');
                redirect('admin/categories');
            } else {
                Session::set('error', 'Something went wrong!');
                redirect('admin/categories/' . $categoryId . '/edit');
            }
        }
    }

    public function delete($categoryId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('admin')) {
                redirect('login');
            }
            
            $categoryModel = $this->model('Category');
            $category = $categoryModel->findById($categoryId);
            
            if ($categoryModel->delete($categoryId)) {
                if ($category->image && file_exists($category->image)) {
                    unlink($category->image);
                }
                Session::set('success', 'Category deleted successfully!');
            } else {
                Session::set('error', 'Something went wrong!');
            }
            
            redirect('admin/categories');
        }
    }
}
