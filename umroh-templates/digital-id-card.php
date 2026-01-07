<?php
/**
 * Template Override: Digital ID Card
 */
if ( ! defined( 'ABSPATH' ) ) exit;
?>
<div class="umh-digital-id-wrapper" style="max-width: 400px; margin: 0 auto; padding: 20px;">
    <div class="umh-id-card" style="background: linear-gradient(135deg, #D4AF37 0%, #b8962d 100%); border-radius: 20px; padding: 30px; color: #fff; box-shadow: 0 10px 25px rgba(212, 175, 55, 0.3); text-align: center;">
        <div class="umh-card-logo" style="margin-bottom: 20px;">
            <h3 style="margin: 0; letter-spacing: 2px;">UMH ENTERPRISE</h3>
            <small>Digital Identity Card</small>
        </div>
        
        <div class="umh-user-photo" style="width: 120px; height: 120px; background: #fff; border-radius: 50%; margin: 0 auto 20px; border: 4px solid rgba(255,255,255,0.3); overflow: hidden; display: flex; align-items: center; justify-content: center;">
            <i class="ri-user-fill" style="font-size: 4rem; color: #D4AF37;"></i>
        </div>

        <h2 style="margin: 0 0 5px; font-size: 1.5rem;">ABDULLAH BIN FULAN</h2>
        <p style="margin: 0; opacity: 0.9; font-size: 0.9rem;">PASSPORT: X1234567</p>

        <div class="umh-qr-code" style="background: #fff; padding: 15px; border-radius: 12px; margin: 25px auto; width: 150px; height: 150px; display: flex; align-items: center; justify-content: center;">
            <!-- QR Code Placeholder -->
            <div style="width: 100%; height: 100%; background: #333;"></div>
        </div>

        <div class="umh-card-footer" style="border-top: 1px solid rgba(255,255,255,0.2); padding-top: 15px; font-size: 0.8rem;">
            <p style="margin: 0;">Berlaku Hingga: 31 Des 2026</p>
        </div>
    </div>
</div>
