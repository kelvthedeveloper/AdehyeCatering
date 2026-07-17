<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class AuthController extends Controller
{
    public function register()
    {
        if (Session::isLoggedIn()) {
            redirect('');
        }
        
        $data = ['title' => 'Register'];
        $this->view('auth/register', $data);
    }

    public function registerSubmit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'phone' => trim($_POST['phone']),
                'address' => trim($_POST['address'])
            ];
            
            $userModel = $this->model('User');
            
            if ($userModel->findByEmail($data['email'])) {
                Session::set('error', 'Email already taken');
                redirect('register');
            }
            
            if (strlen($data['password']) < 6) {
                Session::set('error', 'Password must be at least 6 characters');
                redirect('register');
            }
            
            if ($data['password'] !== $data['confirm_password']) {
                Session::set('error', 'Passwords do not match');
                redirect('register');
            }
            
            if ($userModel->register($data)) {
                Session::set('success', 'Registration successful! Please login');
                redirect('login');
            } else {
                Session::set('error', 'Something went wrong');
                redirect('register');
            }
        }
    }

    public function login()
    {
        if (Session::isLoggedIn()) {
            redirect('');
        }
        
        $data = ['title' => 'Login'];
        $this->view('auth/login', $data);
    }

    public function loginSubmit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            
            $userModel = $this->model('User');
            $user = $userModel->login($email, $password);
            
            if ($user) {
                Session::set('user_id', $user->id);
                Session::set('user_name', $user->name);
                Session::set('user_email', $user->email);
                Session::set('user_role', $user->role);
                
                if ($user->role === 'admin') {
                    redirect('admin/dashboard');
                } else {
                    redirect('customer/dashboard');
                }
            } else {
                Session::set('error', 'Invalid email or password');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        Session::destroy();
        redirect('login');
    }
}
