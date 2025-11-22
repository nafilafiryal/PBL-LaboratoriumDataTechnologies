<?php
class Portfolio extends Model {
    public function getAllPortfolios() {
        return [
            [
                'id' => 1,
                'title' => 'App 1',
                'category' => 'app',
                'description' => 'Lorem ipsum, dolor sit amet consectetur',
                'image' => 'app-1.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Product 1',
                'category' => 'product',
                'description' => 'Lorem ipsum, dolor sit amet consectetur',
                'image' => 'product-1.jpg'
            ],
            // ... dst
        ];
    }
    
    public function getPortfolioById($id) {
        $portfolios = $this->getAllPortfolios();
        foreach($portfolios as $portfolio) {
            if($portfolio['id'] == $id) {
                return $portfolio;
            }
        }
        return null;
    }
    
    public function getPortfoliosByCategory($category) {
        $portfolios = $this->getAllPortfolios();
        return array_filter($portfolios, function($portfolio) use ($category) {
            return $portfolio['category'] == $category;
        });
    }
}