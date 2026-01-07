<?php
/**
 * Template Override: Booking Form
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="umh-booking-form-wrapper" style="max-width: 800px; margin: 0 auto;">
    <div class="umh-form-header" style="text-align: center; margin-bottom: 40px;">
        <h2>Formulir Pendaftaran Jemaah</h2>
        <p>Silakan lengkapi data di bawah ini untuk melanjutkan pemesanan.</p>
    </div>

    <form class="umh-booking-form">
        <div class="umh-form-section" style="margin-bottom: 30px; padding: 25px; background: #f9f9f9; border-radius: 8px;">
            <h4 style="margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">Data Personal</h4>
            <div class="umh-form-group" style="margin-bottom: 15px;">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Nama Lengkap (Sesuai Paspor)</label>
                <input type="text" class="umh-input" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
            </div>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="umh-form-group">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Nomor WhatsApp</label>
                    <input type="tel" class="umh-input" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
                <div class="umh-form-group">
                    <label style="display: block; margin-bottom: 5px; font-weight: 600;">Email</label>
                    <input type="email" class="umh-input" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
                </div>
            </div>
        </div>

        <div class="umh-form-section" style="margin-bottom: 30px; padding: 25px; background: #f9f9f9; border-radius: 8px;">
            <h4 style="margin-bottom: 20px; border-bottom: 1px solid #ddd; padding-bottom: 10px;">Pilihan Paket & Kamar</h4>
            <div class="umh-form-group">
                <label style="display: block; margin-bottom: 5px; font-weight: 600;">Tipe Kamar</label>
                <select class="umh-select" style="width: 100%; padding: 12px; border: 1px solid #ccc; border-radius: 4px;">
                    <option>Quad (4 Orang)</option>
                    <option>Triple (3 Orang)</option>
                    <option>Double (2 Orang)</option>
                </select>
            </div>
        </div>

        <div class="umh-form-actions" style="text-align: center;">
            <button type="submit" class="umh-btn umh-btn-primary" style="min-width: 200px;">Lanjutkan Pembayaran</button>
        </div>
    </form>
</div>
