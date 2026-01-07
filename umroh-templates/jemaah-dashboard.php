'''<?php
/**
 * Template Override: Jemaah Dashboard
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="umh-dashboard-container">
    <div class="umh-header-profile">
        <div class="umh-avatar" style="width: 80px; height: 80px; background: #D4AF37; border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-size: 2rem; margin-right: 20px;">
            <i class="ri-user-line"></i>
        </div>
        <div class="umh-user-info">
            <h2 style="margin: 0;">Assalamu'alaikum, Jemaah</h2>
            <p style="margin: 0; color: #666;">Member ID: UMH-2026-001</p>
        </div>
    </div>

    <div class="umh-dashboard-grid" style="display: grid; grid-template-columns: 1fr 2fr; gap: 30px;">
        <div class="umh-dashboard-sidebar">
            <nav class="umh-side-nav" style="background: #f9f9f9; border-radius: 8px; overflow: hidden;">
                <a href="#" style="display: block; padding: 15px 20px; background: #D4AF37; color: #fff; text-decoration: none;">Dashboard</a>
                <a href="#" style="display: block; padding: 15px 20px; border-bottom: 1px solid #eee; color: #333; text-decoration: none;">Riwayat Booking</a>
                <a href="#" style="display: block; padding: 15px 20px; border-bottom: 1px solid #eee; color: #333; text-decoration: none;">Upload Dokumen</a>
                <a href="#" style="display: block; padding: 15px 20px; color: #333; text-decoration: none;">Pengaturan Profil</a>
            </nav>
        </div>

        <div class="umh-dashboard-main">
            <h3 style="margin-bottom: 20px;">Booking Aktif</h3>
            <div class="umh-booking-card">
                <div style="display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 15px;">
                    <div>
                        <h4 style="margin: 0;">Paket Umroh Ramadhan 2026</h4>
                        <small style="color: #888;">Order ID: #ORD-99281</small>
                    </div>
                    <span class="status-badge badge-paid">Lunas</span>
                </div>
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; font-size: 0.9rem;">
                    <div><strong>Tanggal Berangkat:</strong> 15 Maret 2026</div>
                    <div><strong>Sisa Pelunasan:</strong> Rp 0</div>
                </div>
                <div style="margin-top: 20px;">
                    <a href="#" class="umh-btn umh-btn-outline" style="font-size: 0.8rem; padding: 5px 15px;">Lihat Itinerary</a>
                    <a href="#" class="umh-btn umh-btn-secondary" style="font-size: 0.8rem; padding: 5px 15px;">Download Invoice</a>
                </div>
            </div>
        </div>
    </div>
</div>
'''
