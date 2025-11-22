<?php
class ContactController extends Controller {
    public function index() {
        $data = [
            'title' => 'Contact - ' . APP_NAME,
            'address' => 'A108 Adam Street, New York, NY 535022',
            'phone' => '+1 5589 55488 55',
            'email' => 'info@example.com'
        ];
        
        $this->view('contact/index', $data);
    }
    
    public function submit() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $contactModel = $this->model('Contact');
            $result = $contactModel->saveContact($_POST);
            
            if($result) {
                header('Location: ' . BASE_URL . 'contact?success=1');
            } else {
                header('Location: ' . BASE_URL . 'contact?error=1');
            }
        }
    }
}