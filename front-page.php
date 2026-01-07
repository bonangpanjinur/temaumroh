<?php
/**
 * Template Name: Home Page Landing
 */
get_header(); 

// Ambil data langsung dari Logic Plugin via Helper di functions.php
$featured_packages = umh_get_featured_packages(3); 
$upcoming_departures = umh_get_upcoming_departures(4);
?>

<!-- 1. HERO SECTION -->
<section class="umh-hero">
    <div class="umh-hero-overlay"></div>
    <div class="container umh-hero-content">
        <h1 class="animate-up">Wujudkan Ibadah Umroh<br>Sesuai Sunnah</h1>
        <p class="animate-up delay-1">Travel resmi berizin Kemenag. Fasilitas nyaman, pembimbing berpengalaman, dan harga transparan.</p>
        <div class="umh-hero-actions animate-up delay-2">
            <a href="#paket-populer" class="umh-btn umh-btn-primary">Lihat Paket</a>
            <a href="https://wa.me/62812345678" class="umh-btn umh-btn-outline-light"><i class="ri-whatsapp-line"></i> Konsultasi Gratis</a>
        </div>
    </div>
</section>

<!-- 2. SEARCH / FILTER BAR -->
<div class="container" style="position: relative; z-index: 10; margin-top: -50px;">
    <div class="umh-search-box">
        <form action="<?php echo site_url('/katalog-umroh'); ?>" method="GET" class="umh-search-grid">
            <div class="search-item">
                <label><i class="ri-calendar-event-line"></i> Bulan Keberangkatan</label>
                <select name="month">
                    <option value="">Semua Bulan</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret (Ramadhan)</option>
                </select>
            </div>
            <div class="search-item">
                <label><i class="ri-hotel-bed-line"></i> Hotel Mekkah</label>
                <select name="hotel">
                    <option value="">Semua Hotel</option>
                    <option value="5">Bintang 5</option>
                    <option value="4">Bintang 4</option>
                </select>
            </div>
            <div class="search-item">
                <button type="submit" class="umh-btn umh-btn-primary full-width">Cari Paket <i class="ri-search-line"></i></button>
            </div>
        </form>
    </div>
</div>

<!-- 3. KEUNGGULAN (STATIC) -->
<section class="umh-section">
    <div class="container">
        <div class="section-title text-center">
            <span>Mengapa Kami?</span>
            <h2>Keutamaan Layanan Kami</h2>
        </div>
        <div class="umh-features-grid">
            <div class="feature-card">
                <div class="icon-box"><i class="ri-secure-payment-line"></i></div>
                <h3>Amanah & Resmi</h3>
                <p>Izin resmi PPIU Kemenag RI. Transaksi aman dan transparan.</p>
            </div>
            <div class="feature-card">
                <div class="icon-box"><i class="ri-user-star-line"></i></div>
                <h3>Pembimbing Ahli</h3>
                <p>Didampingi Ustadz bersertifikat dan berpengalaman puluhan tahun.</p>
            </div>
            <div class="feature-card">
                <div class="icon-box"><i class="ri-hotel-line"></i></div>
                <h3>Hotel Dekat</h3>
                <p>Akomodasi hotel berbintang yang dekat dengan Masjidil Haram.</p>
            </div>
            <div class="feature-card">
                <div class="icon-box"><i class="ri-flight-takeoff-line"></i></div>
                <h3>Pasti Berangkat</h3>
                <p>Jadwal keberangkatan yang terencana dengan tiket pesawat confirm.</p>
            </div>
        </div>
    </div>
</section>

<!-- 4. PAKET POPULER (DATA DARI PLUGIN) -->
<section id="paket-populer" class="umh-section bg-light">
    <div class="container">
        <div class="section-title text-center">
            <span>Pilihan Terbaik</span>
            <h2>Paket Umroh Unggulan</h2>
        </div>

        <?php if (!empty($featured_packages)) : ?>
            <div class="umh-catalog-grid">
                <?php foreach ($featured_packages as $pkg) : ?>
                    <!-- Kartu Paket -->
                    <div class="umh-card">
                        <div class="umh-card-image">
                            <?php if (!empty($pkg->package_image_url)): ?>
                                <img src="<?php echo esc_url($pkg->package_image_url); ?>" alt="<?php echo esc_attr($pkg->name); ?>">
                            <?php else: ?>
                                <div class="placeholder-img"><i class="ri-image-line"></i></div>
                            <?php endif; ?>
                            <div class="duration-badge"><?php echo esc_html($pkg->duration_days); ?> Hari</div>
                        </div>
                        
                        <div class="umh-card-body">
                            <h3 class="umh-card-title"><?php echo esc_html($pkg->name); ?></h3>
                            
                            <div class="umh-meta-icons">
                                <span title="Hotel Mekkah"><i class="ri-building-4-line"></i> <?php echo esc_html($pkg->hotel_mekkah_name ?? 'Taraf *4'); ?></span>
                                <span title="Maskapai"><i class="ri-plane-line"></i> <?php echo esc_html($pkg->airline_name ?? 'Direct Flight'); ?></span>
                            </div>

                            <hr style="border-top:1px dashed #ddd; margin: 15px 0;">

                            <div class="umh-price-row">
                                <div class="price-info">
                                    <small>Mulai dari</small>
                                    <span class="price">Rp <?php echo number_format($pkg->start_from, 0, ',', '.'); ?></span>
                                </div>
                                <a href="<?php echo site_url('/booking?package_id=' . $pkg->id); ?>" class="umh-btn umh-btn-outline">Detail</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="text-center mt-4">
                <a href="<?php echo site_url('/katalog-umroh'); ?>" class="umh-btn umh-btn-primary">Lihat Semua Paket</a>
            </div>
        <?php else : ?>
            <div class="alert-box">
                <p>Belum ada paket yang tersedia saat ini. Silakan hubungi admin.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- 5. JADWAL KEBERANGKATAN (DATA DARI PLUGIN) -->
<section class="umh-section">
    <div class="container">
        <div class="umh-cta-box">
            <div class="cta-content">
                <h2>Jadwal Keberangkatan Terdekat</h2>
                <p>Segera amankan kursi Anda sebelum kehabisan.</p>
                
                <div class="departure-list">
                    <?php if(!empty($upcoming_departures)): foreach($upcoming_departures as $dep): ?>
                        <div class="dep-item">
                            <div class="dep-date">
                                <span class="d-day"><?php echo date('d', strtotime($dep->departure_date)); ?></span>
                                <span class="d-month"><?php echo date('M', strtotime($dep->departure_date)); ?></span>
                            </div>
                            <div class="dep-info">
                                <strong><?php echo esc_html($dep->package_name); ?></strong>
                                <small>Sisa Seat: <?php echo $dep->available_seats; ?></small>
                            </div>
                            <a href="<?php echo site_url('/booking?departure_id='.$dep->id); ?>" class="dep-btn">Pesan</a>
                        </div>
                    <?php endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>