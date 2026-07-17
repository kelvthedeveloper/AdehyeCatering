<?php
namespace Controllers;

use App\Controller;

class FoodController extends Controller
{
    public function menu()
    {
        $foodModel = $this->model('Food');
        $categoryModel = $this->model('Category');
        
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        $data = [
            'foods' => $foodModel->getAll($page),
            'categories' => $categoryModel->getAllActive(),
            'total' => $foodModel->getTotal(),
            'page' => $page,
            'perPage' => 12,
            'title' => 'Menu',
            'full_width' => true
        ];
        
        $this->view('food/menu', $data);
    }

    public function search()
    {
        $foodModel = $this->model('Food');
        $categoryModel = $this->model('Category');
        $query = isset($_GET['q']) ? trim($_GET['q']) : '';
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        $data = [
            'foods' => $foodModel->search($query, $page),
            'categories' => $categoryModel->getAllActive(),
            'query' => $query,
            'title' => 'Search Results',
            'full_width' => true
        ];
        
        $this->view('food/menu', $data);
    }

    public function category($categoryId)
    {
        $foodModel = $this->model('Food');
        $categoryModel = $this->model('Category');
        
        $category = $categoryModel->findById($categoryId);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        
        $data = [
            'foods' => $foodModel->getByCategory($categoryId, $page),
            'categories' => $categoryModel->getAllActive(),
            'category' => $category,
            'title' => $category->name,
            'full_width' => true
        ];
        
        $this->view('food/menu', $data);
    }
}
