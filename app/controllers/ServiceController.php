<?php
class ServiceController extends Controller {
    public function index() {
        $serviceModel = $this->model('Service');
        $services = $serviceModel->getAllServices();
        
        $data = [
            'title' => 'Services - ' . APP_NAME,
            'services' => $services
        ];
        
        $this->view('services/index', $data);
    }
    
    public function details($id) {
        $serviceModel = $this->model('Service');
        $service = $serviceModel->getServiceById($id);
        
        $data = [
            'title' => 'Service Details - ' . APP_NAME,
            'service' => $service
        ];
        
        $this->view('services/details', $data);
    }
}