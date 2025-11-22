<?php
class Testimonial extends Model {
    public function getAllTestimonials() {
        return [
            [
                'id' => 1,
                'name' => 'Saul Goodman',
                'position' => 'CEO & Founder',
                'image' => 'testimonials-1.jpg',
                'rating' => 5,
                'content' => 'Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.'
            ],
            // ... dst
        ];
    }
}