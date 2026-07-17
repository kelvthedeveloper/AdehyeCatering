<?php
namespace Controllers;

use App\Controller;
use Helpers\Session;
use function Helpers\redirect;

class CustomerController extends Controller
{
    public function dashboard()
    {
        if (!Session::isLoggedIn('customer')) {
            redirect('login');
        }

        $userId = Session::get('user_id');
        $userModel = $this->model('User');
        $orderModel = $this->model('Order');
        $bookingModel = $this->model('Booking');

        // Get user data
        $user = $userModel->findById($userId);

        // Handle form submissions
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Update profile (name, email, phone, address)
            if (isset($_POST['update_profile'])) {
                $data = [
                    'name' => trim($_POST['name']),
                    'email' => trim($_POST['email']),
                    'phone' => trim($_POST['phone']),
                    'address' => trim($_POST['address'])
                ];

                // Check if email is already taken by another user
                $existingUser = $userModel->findByEmail($data['email']);
                if ($existingUser && $existingUser->id != $userId) {
                    Session::set('error', 'Email already taken');
                    redirect('customer/dashboard');
                }

                if ($userModel->update($userId, $data)) {
                    // Update session data
                    Session::set('user_name', $data['name']);
                    Session::set('user_email', $data['email']);
                    Session::set('success', 'Profile updated successfully!');
                } else {
                    Session::set('error', 'Failed to update profile');
                }
                redirect('customer/dashboard');
            }

            // Update password
            if (isset($_POST['update_password'])) {
                $currentPassword = trim($_POST['current_password']);
                $newPassword = trim($_POST['new_password']);
                $confirmPassword = trim($_POST['confirm_password']);

                // Verify current password
                $userVerify = $userModel->login($user->email, $currentPassword);
                if (!$userVerify) {
                    Session::set('error', 'Current password is incorrect');
                    redirect('customer/dashboard');
                }

                if (strlen($newPassword) < 6) {
                    Session::set('error', 'Password must be at least 6 characters');
                    redirect('customer/dashboard');
                }

                if ($newPassword !== $confirmPassword) {
                    Session::set('error', 'New passwords do not match');
                    redirect('customer/dashboard');
                }

                if ($userModel->updatePassword($userId, $newPassword)) {
                    Session::set('success', 'Password updated successfully!');
                } else {
                    Session::set('error', 'Failed to update password');
                }
                redirect('customer/dashboard');
            }
        }

        // Get orders and bookings
        $orders = $orderModel->getByUserId($userId);
        $bookings = $bookingModel->getByUserId($userId);

        // Calculate stats
        $totalOrders = count($orders);
        $totalSpent = 0;
        $pendingOrders = 0;

        foreach ($orders as $order) {
            $totalSpent += $order->total_amount;
            if ($order->status == 'pending') {
                $pendingOrders++;
            }
        }

        $totalBookings = count($bookings);
        $pendingBookings = 0;

        foreach ($bookings as $booking) {
            if ($booking->status == 'pending') {
                $pendingBookings++;
            }
        }

        $data = [
            'user' => $user,
            'orders' => $orders,
            'bookings' => $bookings,
            'total_orders' => $totalOrders,
            'total_spent' => $totalSpent,
            'pending_orders' => $pendingOrders,
            'total_bookings' => $totalBookings,
            'pending_bookings' => $pendingBookings,
            'title' => 'My Account'
        ];

        $this->view('customer/dashboard', $data);
    }

    // We'll keep these methods for backwards compatibility, but they can redirect to dashboard
    public function orders()
    {
        redirect('customer/dashboard');
    }

    public function bookings()
    {
        redirect('customer/dashboard');
    }
}
