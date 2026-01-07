<?php
/**
 * Template Override: Catalog Grid
 * This file overrides the default catalog grid from the UMH plugin.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}
?>

<div class="umh-catalog-grid">
    <!-- The plugin will typically loop through packages here -->
    <!-- This is a structural example for the theme developer -->
    <div class="umh-card">
        <div class="umh-card-image">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.jpg" alt="Package Placeholder" style="width:100%; height:100%; object-fit:cover;">
        </div>
        <div class="umh-card-body">
            <h3 class="umh-package-title">Paket Umroh Reguler</h3>
            <p class="umh-package-meta">9 Hari | Keberangkatan: Jakarta</p>
            <div class="umh-price-tag">
                <span class="umh-price">Rp 25.000.000</span>
            </div>
            <div class="umh-actions" style="margin-top: 20px;">
                <a href="#" class="umh-btn umh-btn-primary">Detail Paket</a>
            </div>
        </div>
    </div>
</div>
