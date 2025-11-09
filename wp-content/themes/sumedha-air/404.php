<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Sumedha_Air
 */

get_header();
?>

<div class="error-404-content">
    <h1>404</h1>
    <h2>Page Not Found</h2>
    <p>Sorry, the page you're looking for doesn't exist or has been moved.</p>

    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn btn-primary">Return to Homepage</a>

    <div style="margin-top: 3rem; padding: 2rem; background-color: #f5f5f5; border-radius: 8px;">
        <h3 style="color: #2c3e50; margin-bottom: 1rem;">Need Emergency Assistance?</h3>
        <p style="color: #666;">If you're looking for emergency rescue services, contact us immediately:</p>
        <a href="tel:<?php echo esc_attr( str_replace( array( ' ', '-' ), '', sumedha_air_emergency_phone() ) ); ?>" style="display: block; font-size: 1.75rem; font-weight: 700; color: #ff6b35; margin: 1rem 0;">
            <?php echo esc_html( sumedha_air_emergency_phone() ); ?>
        </a>
        <p style="margin-bottom: 0;">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary">Contact Us</a>
        </p>
    </div>

    <div style="margin-top: 2rem;">
        <h3 style="color: #2c3e50;">Quick Links</h3>
        <ul style="list-style: none; padding: 0;">
            <li style="margin-bottom: 0.5rem;">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: #90c33e; font-weight: 500;">Home</a>
            </li>
            <li style="margin-bottom: 0.5rem;">
                <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" style="color: #90c33e; font-weight: 500;">Services</a>
            </li>
            <li style="margin-bottom: 0.5rem;">
                <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" style="color: #90c33e; font-weight: 500;">Contact</a>
            </li>
        </ul>
    </div>
</div>

<?php
get_footer();
