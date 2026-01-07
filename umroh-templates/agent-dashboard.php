<?php
/**
 * Template Override: Agent Dashboard
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="umh-dashboard-container agent-dashboard">
    <div class="umh-header-profile" style="background: #333; color: #fff; padding: 30px; border-radius: 8px; margin-bottom: 30px;">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <div>
                <h2 style="margin: 0; color: #D4AF37;">Portal Agen</h2>
                <p style="margin: 5px 0 0;">Selamat datang kembali, Partner!</p>
            </div>
            <div class="umh-agent-stats" style="text-align: right;">
                <div style="font-size: 0.8rem; text-transform: uppercase; opacity: 0.8;">Total Komisi</div>
                <div style="font-size: 1.5rem; font-weight: bold; color: #D4AF37;">Rp 12.500.000</div>
            </div>
        </div>
    </div>

    <div class="umh-agent-tools" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px;">
        <div class="umh-stat-card" style="padding: 20px; border: 1px solid #eee; border-radius: 8px; text-align: center;">
            <i class="ri-links-line" style="font-size: 2rem; color: #D4AF37;"></i>
            <h4>Link Referral</h4>
            <p style="font-size: 0.8rem; color: #666;">Bagikan link untuk komisi</p>
        </div>
        <div class="umh-stat-card" style="padding: 20px; border: 1px solid #eee; border-radius: 8px; text-align: center;">
            <i class="ri-group-line" style="font-size: 2rem; color: #D4AF37;"></i>
            <h4>Total Jemaah</h4>
            <p style="font-size: 0.8rem; color: #666;">24 Jemaah Terdaftar</p>
        </div>
        <div class="umh-stat-card" style="padding: 20px; border: 1px solid #eee; border-radius: 8px; text-align: center;">
            <i class="ri-wallet-line" style="font-size: 2rem; color: #D4AF37;"></i>
            <h4>Pencairan</h4>
            <p style="font-size: 0.8rem; color: #666;">Tarik komisi ke rekening</p>
        </div>
    </div>
</div>
