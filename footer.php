</div><!-- .site-content -->

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-grid">
            <!-- Kolom 1: Tentang & Izin -->
            <div class="footer-widget">
                <h4 class="widget-title">Tentang Kami</h4>
                <p>Penyelenggara Perjalanan Ibadah Umroh (PPIU) resmi yang berkomitmen melayani jamaah sepenuh hati sesuai sunnah.</p>
                <div class="legal-badge">
                    <i class="ri-government-line"></i> Izin PPIU No. 123/2024
                </div>
            </div>

            <!-- Kolom 2: Navigasi Cepat -->
            <div class="footer-widget">
                <h4 class="widget-title">Tautan Cepat</h4>
                <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer-menu',
                    'container'      => false,
                    'depth'          => 1,
                ) );
                ?>
            </div>

            <!-- Kolom 3: Kontak -->
            <div class="footer-widget">
                <h4 class="widget-title">Hubungi Kami</h4>
                <ul class="contact-list">
                    <li><i class="ri-map-pin-line"></i> Jl. Rasuna Said Kav. 10, Jakarta Selatan</li>
                    <li><i class="ri-phone-line"></i> +62 21 555 7777</li>
                    <li><i class="ri-whatsapp-line"></i> +62 812 3456 7890</li>
                    <li><i class="ri-mail-line"></i> info@travelumroh.com</li>
                </ul>
            </div>
        </div>
        
        <div class="site-info">
            <p>&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>