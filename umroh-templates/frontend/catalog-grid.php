<?php
// Folder: temaumroh/umroh-templates/frontend/
// File: catalog-grid.php

/**
 * Template Override: Catalog Grid
 * Lokasi: wp-content/themes/temaumroh/umroh-templates/frontend/catalog-grid.php
 * Note: Pastikan folder di tema sesuai dengan struktur view plugin ('frontend/catalog-grid' atau 'catalog-grid')
 * Berdasarkan plugin Anda: View::render('frontend/catalog-grid', ...)
 */

if ( ! defined( 'ABSPATH' ) ) exit;
?>

<div class="umh-catalog-wrapper">
    <?php if (!empty($packages)): ?>
        <div class="umh-catalog-grid">
            <?php foreach ($packages as $pkg): ?>
                <div class="umh-card">
                    <div class="umh-card-image">
                        <a href="<?php echo esc_url($pkg->booking_url); ?>">
                            <?php if (!empty($pkg->package_image_url)): ?>
                                <img src="<?php echo esc_url($pkg->package_image_url); ?>" alt="<?php echo esc_attr($pkg->name); ?>">
                            <?php else: ?>
                                <div class="placeholder-img">
                                    <i class="ri-image-2-line" style="font-size:3rem; opacity:0.5;"></i>
                                </div>
                            <?php endif; ?>
                        </a>
                        
                        <!-- Badge Durasi -->
                        <div class="duration-badge">
                            <i class="ri-time-line"></i> <?php echo esc_html($pkg->duration_days); ?> Hari
                        </div>
                    </div>
                    
                    <div class="umh-card-body">
                        <h3 class="umh-card-title">
                            <a href="<?php echo esc_url($pkg->booking_url); ?>">
                                <?php echo esc_html($pkg->name); ?>
                            </a>
                        </h3>
                        
                        <div class="umh-meta-icons">
                            <div class="meta-item" title="Hotel Mekkah">
                                <i class="ri-hotel-bed-line"></i>
                                <span><?php echo esc_html($pkg->hotel_mekkah_name ?? 'Hotel *4'); ?></span>
                            </div>
                            <div class="meta-item" title="Maskapai">
                                <i class="ri-plane-line"></i>
                                <span><?php echo esc_html($pkg->airline_name ?? 'Direct Flight'); ?></span>
                            </div>
                        </div>

                        <!-- Fasilitas Singkat (Opsional jika data ada) -->
                        <div class="umh-facilities-preview">
                            <span class="fac-pill"><i class="ri-check-line"></i> Visa</span>
                            <span class="fac-pill"><i class="ri-check-line"></i> Makan</span>
                            <span class="fac-pill"><i class="ri-check-line"></i> Bus</span>
                        </div>

                        <hr style="border:0; border-top:1px dashed #eee; margin:15px 0;">

                        <div class="umh-price-tag">
                            <div class="price-info">
                                <small>Mulai dari</small>
                                <span class="umh-price">Rp <?php echo number_format($pkg->display_price, 0, ',', '.'); ?></span>
                            </div>
                            <a href="<?php echo esc_url($pkg->booking_url); ?>" class="umh-btn umh-btn-primary">
                                Detail <i class="ri-arrow-right-s-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="umh-empty-state">
            <i class="ri-inbox-archive-line"></i>
            <h3>Belum Ada Paket</h3>
            <p>Mohon maaf, saat ini belum ada jadwal paket umroh yang tersedia.</p>
        </div>
    <?php endif; ?>
</div>