<?php
class Team extends Model {
    public function getAllMembers() {
        return [
            [
                'id' => 1,
                'name' => 'Walter White',
                'position' => 'Chief Executive Officer',
                'image' => 'team-1.jpg',
                'social' => [
                    'twitter' => '#',
                    'facebook' => '#',
                    'instagram' => '#',
                    'linkedin' => '#'
                ]
            ],
            [
                'id' => 2,
                'name' => 'Sarah Jhonson',
                'position' => 'Product Manager',
                'image' => 'team-2.jpg',
                'social' => [
                    'twitter' => '#',
                    'facebook' => '#',
                    'instagram' => '#',
                    'linkedin' => '#'
                ]
            ],
            // ... dst
        ];
    }
}