<?php
/**
 * Template Override: Jemaah Dashboard
 * Tampilan dashboard yang bersih untuk user
 */

$current_user = wp_get_current_user();
// Asumsi variabel $bookings dipassing dari controller
?>

<div class="dashboard-wrapper">
    <!-- Sidebar Navigasi -->
    <div class="dashboard-sidebar">
        <div class="user-profile">
            <div class="avatar-circle">
                <?php echo strtoupper(substr($current_user->display_name, 0, 1)); ?>
            </div>
            <h4><?php echo esc_html($current_user->display_name); ?></h4>
            <span class="user-role">Jemaah</span>
        </div>
        
        <nav class="dash-nav">
            <a href="#" class="active"><i class="ri-dashboard-line"></i> Ringkasan</a>
            <a href="#"><i class="ri-file-list-3-line"></i> Riwayat Pesanan</a>
            <a href="#"><i class="ri-passport-line"></i> Dokumen Saya</a>
            <a href="#"><i class="ri-user-settings-line"></i> Profil</a>
            <a href="<?php echo wp_logout_url(home_url()); ?>" class="logout-link"><i class="ri-logout-box-line"></i> Keluar</a>
        </nav>
    </div>

    <!-- Konten Utama -->
    <div class="dashboard-content">
        <header class="dash-header">
            <h2>Dashboard Jemaah</h2>
            <div class="date-now"><?php echo date_i18n('l, d F Y'); ?></div>
        </header>

        <!-- Status Card -->
        <?php if (empty($bookings)): ?>
            <div class="empty-state">
                <img src="https://cdni.iconscout.com/illustration/premium/thumb/empty-state-2130362-1800926.png" alt="Empty" style="width:200px; opacity:0.6;">
                <h3>Belum ada pesanan aktif</h3>
                <p>Anda belum mendaftar paket umroh apapun.</p>
                <a href="<?php echo home_url('/katalog-umroh'); ?>" class="umh-btn umh-btn-primary">Cari Paket</a>
            </div>
        <?php else: ?>
            <!-- Jika ada booking aktif -->
            <div class="status-tracker">
                <?php $latest_booking = $bookings[0]; // Ambil booking terakhir ?>
                <div class="tracker-header">
                    <div>
                        <small>Kode Booking</small>
                        <strong>#<?php echo $latest_booking->booking_code; ?></strong>
                    </div>
                    <div class="status-badge <?php echo strtolower($latest_booking->status); ?>">
                        <?php echo esc_html($latest_booking->status); ?>
                    </div>
                </div>
                
                <!-- Progress Bar Sederhana -->
                <div class="progress-steps">
                    <div class="step completed">
                        <div class="circle"><i class="ri-check-line"></i></div>
                        <span>Daftar</span>
                    </div>
                    <div class="step <?php echo ($latest_booking->payment_status == 'paid') ? 'completed' : 'active'; ?>">
                        <div class="circle"><i class="ri-wallet-3-line"></i></div>
                        <span>Pembayaran</span>
                    </div>
                    <div class="step">
                        <div class="circle"><i class="ri-passport-line"></i></div>
                        <span>Visa</span>
                    </div>
                    <div class="step">
                        <div class="circle"><i class="ri-flight-takeoff-line"></i></div>
                        <span>Berangkat</span>
                    </div>
                </div>
            </div>

            <div class="dash-grid-2">
                <div class="dash-card">
                    <h3><i class="ri-file-text-line"></i> Dokumen Perjalanan</h3>
                    <p>Unduh dokumen penting Anda di sini.</p>
                    <div class="action-list">
                        <a href="#" class="action-item">
                            <i class="ri-file-pdf-line"></i> E-Sertifikat
                        </a>
                        <a href="#" class="action-item">
                            <i class="ri-id-card-line"></i> ID Card Digital
                        </a>
                    </div>
                </div>
                
                <div class="dash-card">
                    <h3><i class="ri-customer-service-2-line"></i> Bantuan</h3>
                    <p>Hubungi pembimbing atau admin travel.</p>
                    <a href="https://wa.me/62812345678" class="umh-btn umh-btn-outline full-width">Chat WhatsApp</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>