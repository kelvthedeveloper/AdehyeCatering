<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class AdminBookingController extends Controller
{
    public function index()
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $bookingModel = $this->model('Booking');
        
        $data = [
            'bookings' => $bookingModel->getAll(),
            'title' => 'Manage Bookings',
            'active' => 'bookings',
            'view' => 'admin/bookings/index-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }

    public function show($bookingId)
    {
        if (!Session::isLoggedIn('admin')) {
            redirect('login');
        }
        
        $bookingModel = $this->model('Booking');
        
        $data = [
            'booking' => $bookingModel->findById($bookingId),
            'title' => 'Booking Details',
            'active' => 'bookings',
            'view' => 'admin/bookings/show-content'
        ];
        
        // Use admin layout
        require APPROOT . '/views/layouts/admin.php';
    }

    public function updateStatus($bookingId)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('admin')) {
                redirect('login');
            }
            
            $status = trim($_POST['status']);
            
            $bookingModel = $this->model('Booking');
            
            if ($bookingModel->updateStatus($bookingId, $status)) {
                Session::set('success', 'Booking status updated successfully!');
            } else {
                Session::set('error', 'Something went wrong!');
            }
            
            redirect('admin/bookings/' . $bookingId);
        }
    }
}
