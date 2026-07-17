<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class AdminOrderController extends Controller
{
    public function index()
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $orderModel = $this->model('Order');
        
        $data = [
            'orders' => $orderModel->getAll(),
            'title' => 'Manage Orders',
            'active' => 'orders',
            'view' => 'admin/orders/index-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }

    public function show($orderId)
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $orderModel = $this->model('Order');
        
        $data = [
            'order' => $orderModel->findById($orderId),
            'orderItems' => $orderModel->getOrderItems($orderId),
            'title' => 'Order Details',
            'active' => 'orders',
            'view' => 'admin/orders/show-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }

    public function updateStatus($orderId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('admin')) {
                redirect('login');
            }
            
            $status = trim($_POST['status']);
            
            $orderModel = $this->model('Order');
            
            if ($orderModel->updateStatus($orderId, $status)) {
                Session::set('success', 'Order status updated successfully!');
            } else {
                Session::set('error', 'Something went wrong!');
            }
            
            redirect('admin/orders/' . $orderId);
        }
    }
}
