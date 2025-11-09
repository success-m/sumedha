<?php
/**
 * The main template file - Homepage
 *
 * @package Sumedha_Air
 */

get_header();
?>

<!-- Hero Section -->
<section class="hero-section" style="background-image: url('<?php echo esc_url( get_template_directory_uri() . '/images/hero-bg.jpg' ); ?>');">
    <div class="hero-content">
        <h1 class="hero-headline">Mountain Rescue When Seconds Count</h1>
        <p class="hero-subheading">Nepal's trusted helicopter emergency service across all mountain regions</p>
        <div class="hero-cta">
            <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-primary">Request Rescue</a>
            <a href="tel:<?php echo esc_attr( str_replace( array( ' ', '-' ), '', sumedha_air_emergency_phone() ) ); ?>" class="hero-phone">
                <?php echo esc_html( sumedha_air_emergency_phone() ); ?>
            </a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="section-header">
        <h2 class="section-title">Our Services</h2>
        <p class="section-subtitle">Specialized rescue operations for every emergency</p>
    </div>

    <!-- Service 1: Mountain Rescue -->
    <div class="service-block">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/service-mountain-rescue.jpg' ); ?>" alt="Mountain Rescue" class="service-image">
        <div class="service-content">
            <div class="service-number">01</div>
            <h3 class="service-title">Mountain Rescue</h3>
            <p class="service-description">Expert helicopter rescue operations in Nepal's most challenging mountain terrain. Our experienced pilots and crew specialize in high-altitude emergency response.</p>
            <ul class="service-features">
                <li>High-altitude rescue capabilities up to 7000m</li>
                <li>Experienced mountain rescue specialists</li>
                <li>24/7 rapid response team ready</li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-primary">Learn More</a>
        </div>
    </div>

    <!-- Service 2: Medical Evacuation -->
    <div class="service-block">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/service-medical-evacuation.jpg' ); ?>" alt="Medical Evacuation" class="service-image">
        <div class="service-content">
            <div class="service-number">02</div>
            <h3 class="service-title">Medical Evacuation</h3>
            <p class="service-description">Critical medical evacuation services with trained medical personnel. Swift transport from remote areas to major hospitals for life-saving treatment.</p>
            <ul class="service-features">
                <li>Medical staff on board for critical care</li>
                <li>Direct hospital transfer coordination</li>
                <li>Advanced life support equipment available</li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-primary">Learn More</a>
        </div>
    </div>

    <!-- Service 3: Search & Rescue -->
    <div class="service-block">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/service-search-rescue.jpg' ); ?>" alt="Search & Rescue" class="service-image">
        <div class="service-content">
            <div class="service-number">03</div>
            <h3 class="service-title">Search & Rescue</h3>
            <p class="service-description">Comprehensive search and rescue operations across all regions of Nepal. Advanced equipment and trained personnel to locate and rescue individuals in distress.</p>
            <ul class="service-features">
                <li>Advanced search technology and equipment</li>
                <li>Coordination with local rescue teams</li>
                <li>Coverage across all Nepal regions</li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-primary">Learn More</a>
        </div>
    </div>

    <!-- Service 4: Emergency Transport -->
    <div class="service-block">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/images/service-emergency-transport.jpg' ); ?>" alt="Emergency Transport" class="service-image">
        <div class="service-content">
            <div class="service-number">04</div>
            <h3 class="service-title">Emergency Transport</h3>
            <p class="service-description">Rapid emergency transport services available 24/7. Whether medical emergency or urgent evacuation, our helicopters are ready to respond at any time.</p>
            <ul class="service-features">
                <li>24/7 availability for urgent situations</li>
                <li>Fast deployment and response times</li>
                <li>All-weather capable aircraft</li>
            </ul>
            <a href="<?php echo esc_url( home_url( '/services/' ) ); ?>" class="btn btn-primary">Learn More</a>
        </div>
    </div>
</section>

<!-- Why Choose Section -->
<section class="why-choose-section">
    <div class="section-header">
        <h2 class="section-title">Why Choose Sumedha Air</h2>
        <p class="section-subtitle">Your trusted partner for emergency rescue in Nepal</p>
    </div>

    <div class="trust-points">
        <div class="trust-point">
            <div class="trust-point-icon">⏰</div>
            <h3>24/7 Availability</h3>
            <p>Emergency response any time, any day. Our team is always ready to respond to your emergency call.</p>
        </div>

        <div class="trust-point">
            <div class="trust-point-icon">✈️</div>
            <h3>Experienced Crew</h3>
            <p>Certified pilots with mountain rescue expertise. Our crew has years of experience in Nepal's challenging terrain.</p>
        </div>

        <div class="trust-point">
            <div class="trust-point-icon">🗺️</div>
            <h3>Full Coverage</h3>
            <p>Serving all regions of Nepal including Everest, Annapurna, and Langtang. No location too remote.</p>
        </div>

        <div class="trust-point">
            <div class="trust-point-icon">🛡️</div>
            <h3>Safety First</h3>
            <p>Maintained fleet meeting international safety standards. Your safety is our top priority.</p>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="stats-container">
        <div class="stat-item">
            <div class="stat-number">24/7</div>
            <div class="stat-label">Always Available</div>
        </div>

        <div class="stat-item">
            <div class="stat-number">100%</div>
            <div class="stat-label">Nepal Coverage</div>
        </div>

        <div class="stat-item">
            <div class="stat-number">100+</div>
            <div class="stat-label">Successful Rescues</div>
        </div>

        <div class="stat-item">
            <div class="stat-number">5+</div>
            <div class="stat-label">Years Experience</div>
        </div>
    </div>
</section>

<!-- Emergency Contact Section -->
<section class="emergency-contact-section">
    <h2>Need Emergency Assistance?</h2>
    <p>Our team is standing by 24/7 to respond to your emergency</p>
    <a href="tel:<?php echo esc_attr( str_replace( array( ' ', '-' ), '', sumedha_air_emergency_phone() ) ); ?>" class="emergency-phone">
        <?php echo esc_html( sumedha_air_emergency_phone() ); ?>
    </a>
    <a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn btn-secondary" style="margin-top: 1rem;">Contact Us</a>
</section>

<?php
get_footer();
