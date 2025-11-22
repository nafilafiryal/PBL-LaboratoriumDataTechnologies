<!-- Hero Section -->
<section id="hero" class="hero section dark-background">
    <img src="<?= BASE_URL ?>assets/img/ruang-ldt.jpg" alt="" data-aos="fade-in">

    <div class="container d-flex flex-column align-items-center">
        <h3 data-aos="fade-up" data-aos-delay="100">
            <strong><?= $hero_title ?? 'Selamat Datang di' ?></strong>
        </h3>
        <h1 data-aos="fade-up" data-aos-delay="200"><?= $hero_subtitle ?? 'Laboratorium Data Teknologi' ?></h1>
        <div class="d-flex mt-4" data-aos="fade-up" data-aos-delay="300">
            <a href="<?= BASE_URL ?>about" class="btn-get-started">Learn More</a>
            <a href="https://www.youtube.com/watch?v=3zPFX4DuYt4" class="glightbox btn-watch-video d-flex align-items-center">
                <i class="bi bi-play-circle"></i><span>Watch Video</span>
            </a>
        </div>
    </div>
</section><!-- /Hero Section -->

<!-- About Section -->
<section id="about" class="about section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-8 mx-auto text-center" data-aos="fade-up" data-aos-delay="100">
                <h3>Profil Laboratorium</h3>
                <img src="<?= BASE_URL ?>assets/img/about.jpg" class="img-fluid rounded-4 mb-4" alt="">
                <p>Unit penunjang akademik di Jurusan Teknologi Informasi yang berfokus pada kegiatan pembelajaran, penelitian, 
                  serta pengembangan keilmuan di bidang teknologi berbasis data. Laboratorium ini menyediakan fasilitas praktikum dan riset yang 
                  mendukung penguasaan pengetahuan serta keterampilan mahasiswa dalam pengolahan data, analisis big data, kecerdasan buatan, 
                  dan machine learning. Selain sebagai sarana praktikum, Laboratorium Teknologi Data juga berperan sebagai pusat penelitian 
                  dan pengembangan bagi dosen maupun mahasiswa.</p>
            </div>
            
            <!-- Visi Misi Section -->
            <section id="visi-misi" class="visi-misi-section">
                <div class="container" data-aos="fade-up">
                    <div class="row gy-4">
                        <!-- Card VISI -->
                        <div class="col-lg-6">
                            <div class="card visi-card p-4 shadow-sm">
                                <h2 class="text-center mb-4">VISI</h2>
                                <ul>
                                    <li>Menjadi organisasi riset terkemuka dalam penelitian maupun pengembangan untuk mendorong inovasi teknologi serta keilmuan di bidang penyimpanan, pengolahan, dan rekayasa sistem data yang berkelanjutan.</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Card MISI -->
                        <div class="col-lg-6">
                            <div class="card misi-card p-4 shadow-sm">
                                <h2 class="text-center mb-4">MISI</h2>
                                <ul>
                                    <li>Mendukung visi dan misi Jurusan Teknologi Informasi Polinema melalui penelitian dan pengembangan di bidang penyimpanan, pengolahan, serta rekayasa sistem data.</li>
                                    <li>Melakukan penelitian berkualitas tinggi yang berkontribusi pada kemajuan ilmu pengetahuan dan teknologi di bidang data.</li>
                                    <li>Mengembangkan inovasi teknologi data yang dapat diterapkan dalam dunia industri, pendidikan, dan pemerintahan.</li>
                                    <li>Membangun infrastruktur dan sistem data yang skalabel dan efisien untuk mendukung kebutuhan industri digital.</li>
                                    <li>Menjalin kolaborasi dengan akademisi, industri, dan pemerintah untuk solusi teknologi data yang inovatif.</li>
                                    <li>Meningkatkan kapasitas dan kompetensi sumber daya manusia melalui pelatihan, seminar, dan publikasi ilmiah.</li>
                                    <li>Menyediakan layanan dan rekomendasi berbasis riset bagi dunia industri dan akademik.</li>
                                    <li>Menjaga etika dan keamanan data dalam setiap penelitian dan pengembangan teknologi.</li>
                                    <li>Mengembangkan praktik riset data berkelanjutan dengan prinsip efisiensi energi dan ramah lingkungan.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section><!-- /About Section -->

<!-- Stats Section -->
<section id="stats" class="stats section light-background">
    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $stats['clients'] ?? 232 ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Happy Clients</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-journal-richtext color-orange flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $stats['publications'] ?? 5 ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Publikasi</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-headset color-green flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $stats['support_hours'] ?? 1463 ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Hours Of Support</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="stats-item d-flex align-items-center w-100 h-100">
                    <i class="bi bi-people color-pink flex-shrink-0"></i>
                    <div>
                        <span data-purecounter-start="0" data-purecounter-end="<?= $stats['members'] ?? 7 ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Anggota</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Stats Section -->

<!-- Services Section -->
<section id="services" class="services section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Featured Services<br></p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">
            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                <div class="service-item">
                    <div class="img">
                        <img src="<?= BASE_URL ?>assets/img/services-1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="details position-relative">
                        <div class="icon">
                            <i class="bi bi-activity"></i>
                        </div>
                        <a href="<?= BASE_URL ?>service" class="stretched-link">
                            <h3>Data Analytics</h3>
                        </a>
                        <p>Layanan analisis data untuk mendukung pengambilan keputusan berbasis data.</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="service-item">
                    <div class="img">
                        <img src="<?= BASE_URL ?>assets/img/services-2.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="details position-relative">
                        <div class="icon">
                            <i class="bi bi-broadcast"></i>
                        </div>
                        <a href="<?= BASE_URL ?>service" class="stretched-link">
                            <h3>Machine Learning</h3>
                        </a>
                        <p>Pengembangan model machine learning untuk berbagai aplikasi industri.</p>
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="service-item">
                    <div class="img">
                        <img src="<?= BASE_URL ?>assets/img/services-3.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="details position-relative">
                        <div class="icon">
                            <i class="bi bi-easel"></i>
                        </div>
                        <a href="<?= BASE_URL ?>service" class="stretched-link">
                            <h3>Big Data</h3>
                        </a>
                        <p>Solusi pengelolaan dan pemrosesan big data untuk kebutuhan enterprise.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Services Section -->

<!-- Clients Section -->
<section id="clients" class="clients section light-background">
    <div class="container" data-aos="fade-up">
        <div class="row gy-4">
            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="<?= BASE_URL ?>assets/img/clients/client-1.png" class="img-fluid" alt="">
            </div>
            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="<?= BASE_URL ?>assets/img/clients/client-2.png" class="img-fluid" alt="">
            </div>
            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="<?= BASE_URL ?>assets/img/clients/client-3.png" class="img-fluid" alt="">
            </div>
            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="<?= BASE_URL ?>assets/img/clients/client-4.png" class="img-fluid" alt="">
            </div>
            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="<?= BASE_URL ?>assets/img/clients/client-5.png" class="img-fluid" alt="">
            </div>
            <div class="col-xl-2 col-md-3 col-6 client-logo">
                <img src="<?= BASE_URL ?>assets/img/clients/client-6.png" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section><!-- /Clients Section -->

<!-- Portfolio Section -->
<section id="portfolio" class="portfolio section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Portfolio</h2>
        <p>CHECK OUR PORTFOLIO</p>
    </div>

    <div class="container">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
            <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
                <li data-filter="*" class="filter-active">All</li>
                <li data-filter=".filter-app">App</li>
                <li data-filter=".filter-product">Product</li>
                <li data-filter=".filter-branding">Branding</li>
            </ul>

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                    <div class="portfolio-content h-100">
                        <img src="<?= BASE_URL ?>assets/img/portfolio/app-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>App 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="<?= BASE_URL ?>assets/img/portfolio/app-1.jpg" title="App 1" data-gallery="portfolio-gallery-app" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="<?= BASE_URL ?>portfolio" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-product">
                    <div class="portfolio-content h-100">
                        <img src="<?= BASE_URL ?>assets/img/portfolio/product-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Product 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="<?= BASE_URL ?>assets/img/portfolio/product-1.jpg" title="Product 1" data-gallery="portfolio-gallery-product" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="<?= BASE_URL ?>portfolio" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-branding">
                    <div class="portfolio-content h-100">
                        <img src="<?= BASE_URL ?>assets/img/portfolio/branding-1.jpg" class="img-fluid" alt="">
                        <div class="portfolio-info">
                            <h4>Branding 1</h4>
                            <p>Lorem ipsum, dolor sit amet consectetur</p>
                            <a href="<?= BASE_URL ?>assets/img/portfolio/branding-1.jpg" title="Branding 1" data-gallery="portfolio-gallery-branding" class="glightbox preview-link"><i class="bi bi-zoom-in"></i></a>
                            <a href="<?= BASE_URL ?>portfolio" title="More Details" class="details-link"><i class="bi bi-link-45deg"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Portfolio Section -->

<!-- Team Section -->
<section id="team" class="team section light-background">
    <div class="container section-title" data-aos="fade-up">
        <h2>Team</h2>
        <p>CHECK OUR TEAM</p>
    </div>

    <div class="container">
        <div class="row gy-5">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="member">
                    <div class="pic"><img src="<?= BASE_URL ?>assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Walter White</h4>
                        <span>Chief Executive Officer</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="member">
                    <div class="pic"><img src="<?= BASE_URL ?>assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>Sarah Jhonson</h4>
                        <span>Product Manager</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="member">
                    <div class="pic"><img src="<?= BASE_URL ?>assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>William Anderson</h4>
                        <span>CTO</span>
                        <div class="social">
                            <a href=""><i class="bi bi-twitter-x"></i></a>
                            <a href=""><i class="bi bi-facebook"></i></a>
                            <a href=""><i class="bi bi-instagram"></i></a>
                            <a href=""><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!-- /Team Section -->

<!-- Contact Section -->
<section id="contact" class="contact section">
    <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Get In Touch With Us</p>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-4">
            <div class="col-lg-6">
                <div class="row gy-4">
                    <div class="col-lg-12">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="200">
                            <i class="bi bi-geo-alt"></i>
                            <h3>Address</h3>
                            <p>Jl. Soekarno Hatta No. 9, Malang</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="300">
                            <i class="bi bi-telephone"></i>
                            <h3>Call Us</h3>
                            <p>+62 341 404424</p>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="info-item d-flex flex-column justify-content-center align-items-center" data-aos="fade-up" data-aos-delay="400">
                            <i class="bi bi-envelope"></i>
                            <h3>Email Us</h3>
                            <p>info@polinema.ac.id</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <form action="<?= BASE_URL ?>contact/submit" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="500">
                    <div class="row gy-4">
                        <div class="col-md-6">
                            <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                        </div>

                        <div class="col-md-6">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                        </div>

                        <div class="col-md-12">
                            <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                        </div>

                        <div class="col-md-12">
                            <textarea class="form-control" name="message" rows="4" placeholder="Message" required=""></textarea>
                        </div>

                        <div class="col-md-12 text-center">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>

                            <button type="submit">Send Message</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section><!-- /Contact Section -->
