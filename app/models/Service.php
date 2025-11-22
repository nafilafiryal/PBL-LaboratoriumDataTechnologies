<?php
class Service extends Model {
    public function getAllServices() {
        // Untuk saat ini return dummy data
        // Nanti bisa diganti dengan query database
        return [
            [
                'id' => 1,
                'title' => 'Nesciunt Mete',
                'description' => 'Provident nihil minus qui consequatur non omnis maiores.',
                'icon' => 'bi-activity',
                'image' => 'services-1.jpg'
            ],
            [
                'id' => 2,
                'title' => 'Eosle Commodi',
                'description' => 'Ut autem aut autem non a. Sint sint sit facilis nam iusto sint.',
                'icon' => 'bi-broadcast',
                'image' => 'services-2.jpg'
            ],
            [
                'id' => 3,
                'title' => 'Ledo Markt',
                'description' => 'Ut excepturi voluptatem nisi sed. Quidem fuga consequatur.',
                'icon' => 'bi-easel',
                'image' => 'services-3.jpg'
            ]
        ];
    }
    
    public function getServiceById($id) {
        $services = $this->getAllServices();
        foreach($services as $service) {
            if($service['id'] == $id) {
                return $service;
            }
        }
        return null;
    }
}