<?php
/**
 * Template Override: Package Detail
 * Menampilkan detail paket dengan layout modern
 */

// Pastikan variabel $package tersedia (dari controller plugin)
if ( empty($package) ) return;
?>

<!-- 1. Hero Image Paket -->
<div class="package-hero" style="background-image: url('<?php echo !empty($package->image_url) ? esc_url($package->image_url) : 'https://images.unsplash.com/photo-1564121211835-e88c852648ab?q=80&w=1920'; ?>');">
    <div class="overlay"></div>
    <div class="container hero-content">
        <span class="pkg-category">Paket Umroh</span>
        <h1><?php echo esc_html($package->name); ?></h1>
        <div class="hero-meta">
            <span><i class="ri-time-line"></i> <?php echo esc_html($package->duration_days); ?> Hari</span>
            <span><i class="ri-plane-line"></i> <?php echo esc_html($package->airline_name ?? 'Direct Flight'); ?></span>
        </div>
    </div>
</div>

<div class="container package-container">
    <div class="package-layout">
        
        <!-- KOLOM KIRI: Konten Utama -->
        <div class="package-main">
            <!-- Fasilitas Hotel -->
            <div class="content-box">
                <h3><i class="ri-hotel-bed-line"></i> Akomodasi Hotel</h3>
                <div class="hotel-grid">
                    <div class="hotel-item">
                        <span class="city">Mekkah</span>
                        <strong><?php echo esc_html($package->hotel_mekkah ?? 'Hotel Setaraf *5'); ?></strong>
                        <div class="stars">
                            <?php for($i=0;$i<5;$i++) echo '<i class="ri-star-fill"></i>'; ?>
                        </div>
                    </div>
                    <div class="hotel-item">
                        <span class="city">Madinah</span>
                        <strong><?php echo esc_html($package->hotel_madinah ?? 'Hotel Setaraf *4'); ?></strong>
                        <div class="stars">
                            <?php for($i=0;$i<4;$i++) echo '<i class="ri-star-fill"></i>'; ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi -->
            <div class="content-box">
                <h3>Deskripsi Paket</h3>
                <div class="pkg-description">
                    <?php echo wpautop($package->description); ?>
                </div>
            </div>

            <!-- Itinerary (Jika ada datanya) -->
            <?php if (!empty($itineraries)): ?>
            <div class="content-box">
                <h3>Rencana Perjalanan</h3>
                <div class="timeline">
                    <?php foreach($itineraries as $day): ?>
                    <div class="timeline-item">
                        <div class="day-badge">Hari <?php echo $day->day_number; ?></div>
                        <div class="day-content">
                            <h4><?php echo esc_html($day->title); ?></h4>
                            <p><?php echo esc_html($day->description); ?></p>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- KOLOM KANAN: Sidebar Sticky -->
        <div class="package-sidebar">
            <div class="booking-card sticky-sidebar">
                <div class="price-header">
                    <small>Harga Mulai Dari</small>
                    <div class="price-amount">Rp <?php echo number_format($package->price_quad ?? 0, 0, ',', '.'); ?></div>
                    <span class="price-note">Per orang (Quad)</span>
                </div>

                <div class="price-list">
                    <div class="price-row">
                        <span>Quad (Sekamar 4)</span>
                        <strong>Rp <?php echo number_format($package->price_quad ?? 0, 0, ',', '.'); ?></strong>
                    </div>
                    <div class="price-row">
                        <span>Triple (Sekamar 3)</span>
                        <strong>Rp <?php echo number_format($package->price_triple ?? 0, 0, ',', '.'); ?></strong>
                    </div>
                    <div class="price-row">
                        <span>Double (Sekamar 2)</span>
                        <strong>Rp <?php echo number_format($package->price_double ?? 0, 0, ',', '.'); ?></strong>
                    </div>
                </div>

                <div class="booking-actions">
                    <h4 style="font-size:0.9rem; margin-bottom:10px;">Pilih Tanggal Keberangkatan:</h4>
                    <form action="<?php echo site_url('/booking'); ?>" method="GET">
                        <input type="hidden" name="package_id" value="<?php echo $package->id; ?>">
                        <select name="departure_id" class="form-select" required>
                            <option value="">-- Pilih Tanggal --</option>
                            <?php if(!empty($departures)): foreach($departures as $dep): ?>
                                <option value="<?php echo $dep->id; ?>">
                                    <?php echo date('d M Y', strtotime($dep->departure_date)); ?> 
                                    (Sisa: <?php echo $dep->available_seats; ?>)
                                </option>
                            <?php endforeach; endif; ?>
                        </select>
                        <button type="submit" class="umh-btn umh-btn-primary full-width mt-3">
                            Pesan Sekarang
                        </button>
                    </form>
                </div>
                
                <div class="support-contact">
                    <i class="ri-whatsapp-line"></i> Butuh bantuan? <a href="#">Chat Admin</a>
                </div>
            </div>
        </div>

    </div>
</div>