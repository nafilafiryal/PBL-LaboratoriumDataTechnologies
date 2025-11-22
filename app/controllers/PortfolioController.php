<?php
class PortfolioController extends Controller {
    public function index() {
        $portfolioModel = $this->model('Portfolio');
        $portfolios = $portfolioModel->getAllPortfolios();
        
        $data = [
            'title' => 'Portfolio - ' . APP_NAME,
            'portfolios' => $portfolios
        ];
        
        $this->view('portfolio/index', $data);
    }
    
    public function details($id) {
        $portfolioModel = $this->model('Portfolio');
        $portfolio = $portfolioModel->getPortfolioById($id);
        
        $data = [
            'title' => 'Portfolio Details - ' . APP_NAME,
            'portfolio' => $portfolio
        ];
        
        $this->view('portfolio/details', $data);
    }
}