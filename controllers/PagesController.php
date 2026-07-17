<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;

class PagesController extends Controller
{
    public function home()
    {
        $foodModel = $this->model('Food');
        $categoryModel = $this->model('Category');
        
        $data = [
            'foods' => $foodModel->getAll(1, 6),
            'categories' => $categoryModel->getAllActive(),
            'title' => 'Home',
            'full_width' => true
        ];
        
        $this->view('pages/home', $data);
    }

    public function about()
    {
        $data = ['title' => 'About Us'];
        $this->view('pages/about', $data);
    }

    public function contact()
    {
        $data = ['title' => 'Contact Us'];
        $this->view('pages/contact', $data);
    }

    public function contactSubmit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'subject' => trim($_POST['subject']),
                'message' => trim($_POST['message'])
            ];
            
            $enquiryModel = $this->model('Enquiry');
            if ($enquiryModel->create($data)) {
                Session::set('success', 'Enquiry sent successfully!');
            } else {
                Session::set('error', 'Something went wrong!');
            }
        }
        redirect('contact');
    }
}
