<?php
class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Home - ' . APP_NAME,
            'hero_title' => 'Selamat Datang di',
            'hero_subtitle' => 'Laboratorium Data Teknologi',
            'stats' => [
                'clients' => 232,
                'publications' => 59,
                'support_hours' => 1463,
                'members' => 7
            ],
            'isLoggedIn' => Session::isLoggedIn()
        ];
        
        $this->view('layouts/main', $data);
    }
}