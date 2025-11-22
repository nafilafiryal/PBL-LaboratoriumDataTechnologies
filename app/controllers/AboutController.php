<?php
class AboutController extends Controller {
    public function index() {
        $data = [
            'title' => 'About - ' . APP_NAME,
            'visi' => 'Menjadi organisasi riset terkemuka dalam penelitian maupun pengembangan untuk mendorong inovasi teknologi serta keilmuan di bidang penyimpanan, pengolahan, dan rekayasa sistem data yang berkelanjutan.',
            'misi' => [
                'Mendukung visi dan misi Jurusan Teknologi Informasi Polinema melalui penelitian dan pengembangan di bidang penyimpanan, pengolahan, serta rekayasa sistem data.',
                'Melakukan penelitian berkualitas tinggi yang berkontribusi pada kemajuan ilmu pengetahuan dan teknologi di bidang data.',
                // ... dst
            ]
        ];
        
        $this->view('about/index', $data);
    }
}