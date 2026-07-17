<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $orderModel = $this->model('Order');
        $bookingModel = $this->model('Booking');
        $foodModel = $this->model('Food');
        
        $data = [
            'totalOrders' => $orderModel->getTotalOrders(),
            'totalRevenue' => $orderModel->getTotalRevenue(),
            'totalBookings' => $bookingModel->getTotalBookings(),
            'totalFoods' => $foodModel->getTotal(),
            'title' => 'Admin Dashboard',
            'active' => 'dashboard',
            'view' => 'admin/dashboard-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }
}
