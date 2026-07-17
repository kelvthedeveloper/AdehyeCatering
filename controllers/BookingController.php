<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class BookingController extends Controller
{
    public function create()
    {
        if (!Session::isLoggedIn('customer')) {
            redirect('login');
        }
        
        $data = ['title' => 'Book Catering Service'];
        $this->view('customer/book', $data);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!Session::isLoggedIn('customer')) {
                redirect('login');
            }
            
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'user_id' => Session::get('user_id'),
                'event_type' => trim($_POST['event_type']),
                'event_date' => trim($_POST['event_date']),
                'guest_count' => (int)$_POST['guest_count'],
                'venue' => trim($_POST['venue']),
                'special_requests' => trim($_POST['special_requests'])
            ];
            
            $bookingModel = $this->model('Booking');
            
            if ($bookingModel->create($data)) {
                Session::set('success', 'Booking request submitted successfully!');
                redirect('customer/bookings');
            } else {
                Session::set('error', 'Something went wrong!');
                redirect('customer/book');
            }
        }
    }
}
