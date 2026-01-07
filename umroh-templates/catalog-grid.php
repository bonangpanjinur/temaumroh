<?php
/**
 * Template Override: Catalog Grid
 * Lokasi: umroh-templates/catalog-grid.php
 * Dipanggil oleh shortcode [umh_package_catalog] di plugin
 */

if ( ! defined( 'ABSPATH' ) ) exit;
?>

<div class="umh-catalog-wrapper">
    <?php if (!empty($packages)): ?>
        <div class="umh-catalog-grid">
            <?php foreach ($packages as $pkg): ?>
                <div class="umh-card">
                    <div class="umh-card-image">
                        <?php if (!empty($pkg->package_image_url)): ?>
                            <img src="<?php echo esc_url($pkg->package_image_url); ?>" alt="<?php echo esc_attr($pkg->name); ?>">
                        <?php else: ?>
                            <div class="placeholder-img" style="background:#eee; height:100%; display:flex; align-items:center; justify-content:center; color:#999;">
                                <i class="ri-image-line" style="font-size:3rem;"></i>
                            </div>
                        <?php endif; ?>
                        
                        <!-- Badge Durasi -->
                        <div class="duration-badge">
                            <i class="ri-time-line"></i> <?php echo esc_html($pkg->duration_days); ?> Hari
                        </div>
                    </div>
                    
                    <div class="umh-card-body">
                        <h3 class="umh-card-title">
                            <a href="<?php echo esc_url($pkg->booking_url); ?>" style="text-decoration:none; color:inherit;">
                                <?php echo esc_html($pkg->name); ?>
                            </a>
                        </h3>
                        
                        <div class="umh-meta-icons">
                            <div class="meta-item">
                                <i class="ri-hotel-bed-line"></i>
                                <span><?php echo esc_html($pkg->hotel_mekkah_name ?? 'Hotel Setaraf'); ?></span>
                            </div>
                            <div class="meta-item">
                                <i class="ri-plane-line"></i>
                                <span><?php echo esc_html($pkg->airline_name ?? 'Maskapai'); ?></span>
                            </div>
                        </div>

                        <div class="umh-facilities-preview">
                            <!-- Contoh fasilitas hardcoded atau ambil dari DB jika ada relasi -->
                            <span class="fac-pill">Visa</span>
                            <span class="fac-pill">Makan 3x</span>
                            <span class="fac-pill">Bus AC</span>
                        </div>

                        <div class="umh-price-tag">
                            <div>
                                <small style="display:block; color:#718096; font-size:0.75rem;">Harga Mulai</small>
                                <span class="umh-price">Rp <?php echo number_format($pkg->display_price, 0, ',', '.'); ?></span>
                            </div>
                            <a href="<?php echo esc_url($pkg->booking_url); ?>" class="umh-btn umh-btn-primary">Pesan</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div style="text-align:center; padding:60px; background:#f9fafb; border-radius:12px; border:1px dashed #ccc;">
            <i class="ri-inbox-archive-line" style="font-size:3rem; color:#ccc;"></i>
            <p style="margin-top:10px; color:#666;">Saat ini belum ada paket perjalanan yang tersedia.</p>
        </div>
    <?php endif; ?>
</div>