<?php
/**
 * Template Override: Package Detail
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="umh-package-detail-container">
    <div class="umh-package-header">
        <h1 class="umh-package-title"><?php the_title(); ?></h1>
        <div class="umh-package-meta">
            <span class="umh-duration"><i class="ri-calendar-line"></i> 9 Hari</span>
            <span class="umh-location"><i class="ri-map-pin-line"></i> Keberangkatan: Jakarta</span>
        </div>
    </div>

    <div class="umh-package-gallery" style="margin: 20px 0;">
        <!-- Gallery placeholder -->
        <div style="background: #eee; height: 400px; border-radius: 12px; display: flex; align-items: center; justify-content: center;">
            <p>Gallery Images Here</p>
        </div>
    </div>

    <div class="umh-package-content-grid" style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
        <div class="umh-package-main">
            <div class="umh-tabs">
                <nav class="umh-tab-nav" style="border-bottom: 2px solid #eee; margin-bottom: 20px;">
                    <a href="#itinerary" style="padding: 10px 20px; display: inline-block; border-bottom: 2px solid #D4AF37; font-weight: bold;">Itinerary</a>
                    <a href="#fasilitas" style="padding: 10px 20px; display: inline-block;">Fasilitas</a>
                    <a href="#syarat" style="padding: 10px 20px; display: inline-block;">Syarat & Ketentuan</a>
                </nav>
                <div class="umh-tab-content">
                    <div id="itinerary">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="umh-package-sidebar">
            <div class="umh-booking-card" style="position: sticky; top: 20px; background: #fff; border: 1px solid #eee; padding: 25px; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                <h3 style="margin-bottom: 15px;">Harga Mulai Dari</h3>
                <div class="umh-price" style="font-size: 2rem; color: #D4AF37; font-weight: bold; margin-bottom: 20px;">Rp 25.000.000</div>
                <a href="#" class="umh-btn umh-btn-primary" style="display: block; width: 100%; text-align: center;">Booking Sekarang</a>
                <div style="margin-top: 15px; font-size: 0.9rem; color: #666; text-align: center;">
                    <i class="ri-information-line"></i> Konfirmasi instan setelah pembayaran
                </div>
            </div>
        </div>
    </div>
</div>
