# Sumedha Air WordPress Deployment Guide

## Overview

This WordPress installation is ready for deployment to a web hosting environment with PHP and MySQL. All theme files, images, and configuration files are in place.

## Current Status

### ✅ Complete
- WordPress core installed (latest version)
- Sumedha Air custom theme fully developed
- All template files (header, footer, index, page templates)
- Complete CSS styling with brand colors
- Mobile-responsive design
- JavaScript for mobile menu
- Hero and service images (high-quality stock photos)
- Company logo in theme directory
- wp-config.php created with security keys
- .htaccess for SEO-friendly permalinks

### ⚠️ Requires Configuration
- Database connection (see section below)
- Contact information update (placeholder values)
- WordPress installation wizard
- Theme activation
- Page creation and menu setup
- Contact Form 7 plugin installation

---

## Deployment Steps

### 1. Database Setup

**Before accessing WordPress, you must configure the database:**

**a) Create MySQL Database:**
```sql
CREATE DATABASE sumedha_air CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'sumedha_user'@'localhost' IDENTIFIED BY 'your_strong_password';
GRANT ALL PRIVILEGES ON sumedha_air.* TO 'sumedha_user'@'localhost';
FLUSH PRIVILEGES;
```

**b) Update wp-config.php:**
Edit `/wp-config.php` and update the database password:
```php
define( 'DB_PASSWORD', 'CHANGE_THIS_PASSWORD' ); // Line 23
```
Replace `'CHANGE_THIS_PASSWORD'` with your actual database password from step (a).

**Important:** The security keys are already generated. Do not regenerate them unless starting fresh.

---

### 2. Upload to Web Server

**Transfer all files to your web hosting:**

**Option A - FTP/SFTP:**
- Upload entire directory to your web root (public_html, www, or htdocs)
- Ensure all files including .htaccess are uploaded
- Check file permissions: 755 for directories, 644 for files

**Option B - Git Deployment:**
```bash
git clone [repository-url] /var/www/html/
```

**File structure after upload:**
```
/public_html/ (or web root)
├── index.php
├── wp-config.php
├── .htaccess
├── wp-admin/
├── wp-includes/
├── wp-content/
│   ├── themes/
│   │   └── sumedha-air/
│   └── plugins/
└── [other WordPress files]
```

---

### 3. Access WordPress Installation

**Navigate to your domain:**
```
https://yourdomain.com/wp-admin/install.php
```

**Installation wizard will prompt for:**
- **Site Title:** "Sumedha Air" or "Sumedha Air - Mountain Rescue Services"
- **Admin Username:** Create secure username (avoid "admin")
- **Admin Password:** Use strong password (minimum 16 characters)
- **Admin Email:** Your email for admin notifications
- **Search Engine Visibility:** Uncheck "Discourage search engines" for production

**Click "Install WordPress"** - Database tables will be created automatically.

---

### 4. WordPress Initial Configuration

**After installation, login to WordPress admin:**

**a) Activate Sumedha Air Theme:**
1. Go to `Appearance > Themes`
2. Find "Sumedha Air" theme
3. Click "Activate"

**b) Set Permalink Structure:**
1. Go to `Settings > Permalinks`
2. Select "Post name"
3. Click "Save Changes"
4. Verify .htaccess is updated (should happen automatically)

---

### 5. Create Pages

**Create three pages:**

**Page 1: Home**
1. Go to `Pages > Add New`
2. Title: "Home" (leave content empty - template is hardcoded)
3. Template: Default Template
4. Status: Publish

**Page 2: Services**
1. Go to `Pages > Add New`
2. Title: "Services"
3. Content: Leave empty
4. **Template:** Select "Services Template" from Page Attributes
5. Status: Publish

**Page 3: Contact**
1. Go to `Pages > Add New`
2. Title: "Contact"
3. Content: Leave empty for now (will add form shortcode later)
4. **Template:** Select "Contact Template" from Page Attributes
5. Status: Publish

---

### 6. Set Homepage

1. Go to `Settings > Reading`
2. Change "Your homepage displays" to "A static page"
3. **Front page:** Select "Home"
4. **Posts page:** Leave as "— Select —"
5. Click "Save Changes"

---

### 7. Configure Navigation Menu

**Create Primary Menu:**
1. Go to `Appearance > Menus`
2. Menu Name: "Primary Menu"
3. Click "Create Menu"
4. Add pages: Check Home, Services, Contact
5. Click "Add to Menu"
6. **Menu Settings:** Check "Primary Menu" under Display location
7. Click "Save Menu"

**Optional - Create Footer Menu:**
1. Click "create a new menu"
2. Menu Name: "Footer Menu"
3. Add same pages (Home, Services, Contact)
4. Check "Footer Menu" under Display location
5. Click "Save Menu"

---

### 8. Install Contact Form 7 Plugin

**Install and configure contact form:**

**a) Install Plugin:**
1. Go to `Plugins > Add New`
2. Search for "Contact Form 7"
3. Click "Install Now" on Contact Form 7 by Takayuki Miyoshi
4. Click "Activate"

**b) Create Contact Form:**
1. Go to `Contact > Add New` (or `Contact > Contact Forms > Add New`)
2. Form Title: "Sumedha Air Contact Form"
3. Replace default form code with:

```
<label> Full Name*
    [text* your-name] </label>

<label> Email Address*
    [email* your-email] </label>

<label> Phone Number*
    [tel* your-phone placeholder "+977-XXX-XXXX"] </label>

<label> Service Type*
    [select* service-type "Select a service..." "Mountain Rescue" "Medical Evacuation" "Search & Rescue" "Emergency Transport" "Inter-Hospital Transfer" "General Inquiry"] </label>

<label> Inquiry Type*
    [radio inquiry-type default:1 "Emergency Request" "General Inquiry"] </label>

<label> Message*
    [textarea* your-message placeholder "Please describe your situation or inquiry..."] </label>

[submit "Send Message"]
```

**c) Configure Email Settings (Mail tab):**
- **To:** your-admin-email@domain.com
- **From:** [your-email] <wordpress@yourdomain.com>
- **Subject:** [Sumedha Air Contact] New inquiry - [inquiry-type]
- **Additional Headers:** Reply-To: [your-email]
- **Message Body:**
```
New contact form submission from Sumedha Air website:

Name: [your-name]
Email: [your-email]
Phone: [your-phone]
Service Type: [service-type]
Inquiry Type: [inquiry-type]

Message:
[your-message]

---
This email was sent from the contact form on Sumedha Air website.
```

**d) Customize Messages (Messages tab):**
- **Message sent successfully:** "Thank you! We'll contact you within 24 hours. For emergencies, please call [YOUR-PHONE]"
- **Failed to send:** "Something went wrong. Please try again or call us directly at [YOUR-PHONE]"

**e) Save form and copy shortcode** (will look like `[contact-form-7 id="123" title="Sumedha Air Contact Form"]`)

**f) Add Form to Contact Page:**
1. Go to `Pages > All Pages`
2. Edit "Contact" page
3. Paste the contact form shortcode in page content
4. Click "Update"

---

### 9. Update Contact Information

**CRITICAL: Replace placeholder contact information with actual company details.**

**Edit theme file:**
`wp-content/themes/sumedha-air/functions.php`

**Lines 138, 145, and 152 - Update these three functions:**

```php
// Line 138: Emergency phone number
function sumedha_air_emergency_phone() {
    return apply_filters( 'sumedha_air_emergency_phone', '+977-1-XXXXXXX' ); // UPDATE THIS
}

// Line 145: Email address
function sumedha_air_emergency_email() {
    return apply_filters( 'sumedha_air_emergency_email', 'contact@sumedhaair.com' ); // UPDATE THIS
}

// Line 152: Physical address
function sumedha_air_address() {
    return apply_filters( 'sumedha_air_address', 'Tribhuvan International Airport, Kathmandu, Nepal' ); // UPDATE THIS
}
```

**After updating:**
- Phone number appears in header, hero section, contact page, footer
- Email appears in contact page sidebar and footer
- Address appears in contact page sidebar and footer

**Also update:**
- Contact Form 7 success/error messages with real phone number
- Contact Form 7 mail recipient email address

---

### 10. Testing Checklist

**Before launch, verify:**

**Visual:**
- [ ] Logo displays correctly in header
- [ ] Hero section fullscreen with mountain/helicopter background
- [ ] Services section shows 4 services with alternating layout
- [ ] All service images display correctly
- [ ] Brand colors correct: Green #90c33e, Charcoal #2c3e50, Orange #ff6b35
- [ ] Emergency phone number prominent (orange) in header

**Functionality:**
- [ ] All navigation links work (Home, Services, Contact)
- [ ] Click phone numbers → initiates call on mobile
- [ ] Click email → opens email client
- [ ] Contact form submits successfully
- [ ] Form validation shows error messages for invalid input
- [ ] Email received after form submission
- [ ] Success message displays after submission

**Responsive:**
- [ ] Mobile (< 768px): Hamburger menu works, content stacks
- [ ] Tablet (768px-1023px): Layout adapts appropriately
- [ ] Desktop (1024px+): Full design displays correctly
- [ ] Test on actual mobile device (iOS and Android)

**Performance:**
- [ ] Homepage loads in under 3 seconds
- [ ] Images optimized (hero < 500KB, services < 300KB each)
- [ ] No browser console errors
- [ ] No broken links or 404 errors

**Cross-browser:**
- [ ] Google Chrome (latest)
- [ ] Mozilla Firefox (latest)
- [ ] Safari (Mac/iOS)
- [ ] Microsoft Edge (latest)

**SEO:**
- [ ] Page titles display correctly
- [ ] Permalink structure working (yourdomain.com/services/)
- [ ] No "discourage search engines" setting active
- [ ] Proper heading hierarchy (H1, H2, H3)

---

## Troubleshooting

### Issue: "Error establishing database connection"
**Solution:**
- Verify database credentials in wp-config.php (lines 18-32)
- Ensure MySQL database exists and user has permissions
- Check database host (usually 'localhost')
- Test database connection with MySQL command line

### Issue: Logo doesn't display
**Solution:**
- Verify `sumedha_logo.JPEG` exists at: `wp-content/themes/sumedha-air/sumedha_logo.JPEG`
- Check file permissions (644)
- Clear browser cache

### Issue: Images don't display on homepage
**Solution:**
- Verify all images exist in: `wp-content/themes/sumedha-air/images/`
- Required files: hero-bg.jpg, service-mountain-rescue.jpg, service-medical-evacuation.jpg, service-search-rescue.jpg, service-emergency-transport.jpg
- Check file permissions (644)

### Issue: Homepage shows blog posts instead of custom content
**Solution:**
- Go to Settings > Reading
- Set "A static page" and select "Home" as Front page
- Save changes

### Issue: Contact form doesn't appear
**Solution:**
- Verify Contact Form 7 plugin installed and activated
- Check Contact page content includes form shortcode
- Refresh page and clear cache

### Issue: Form emails not sending
**Solution:**
- Test WordPress email with "WP Mail SMTP" plugin
- Configure SMTP settings if host email unreliable
- Check spam folder
- Verify admin email in CF7 Mail settings

### Issue: Permalinks not working (404 on pages)
**Solution:**
- Check .htaccess exists in root directory
- Verify Apache mod_rewrite enabled
- Re-save permalink settings: Settings > Permalinks > Save

### Issue: Mobile menu doesn't open
**Solution:**
- Check browser console for JavaScript errors
- Verify menu.js loaded (check Network tab in DevTools)
- Ensure footer.php includes `<?php wp_footer(); ?>`
- Clear browser cache

---

## File Structure Reference

```
/sumedha/ (WordPress root)
├── index.php                    WordPress entry point
├── wp-config.php               Database and security configuration
├── .htaccess                   Permalink rewrite rules
├── wp-admin/                   WordPress admin area
├── wp-includes/                WordPress core files
├── wp-content/
│   ├── themes/
│   │   └── sumedha-air/       CUSTOM THEME
│   │       ├── style.css           Complete styling (17KB)
│   │       ├── functions.php       Theme setup and functions (4KB)
│   │       ├── header.php          Header with navigation (3KB)
│   │       ├── footer.php          Footer template (2.7KB)
│   │       ├── index.php           Homepage template (7.7KB)
│   │       ├── page.php            Default page template (363 bytes)
│   │       ├── page-services.php   Services page template (7.6KB)
│   │       ├── page-contact.php    Contact page template (6.3KB)
│   │       ├── 404.php             Error page template (1.9KB)
│   │       ├── sumedha_logo.JPEG   Company logo (19KB)
│   │       ├── images/             Service and hero images
│   │       │   ├── hero-bg.jpg            (490KB)
│   │       │   ├── service-mountain-rescue.jpg     (108KB)
│   │       │   ├── service-medical-evacuation.jpg  (34KB)
│   │       │   ├── service-search-rescue.jpg       (104KB)
│   │       │   └── service-emergency-transport.jpg (99KB)
│   │       └── js/
│   │           └── menu.js         Mobile menu functionality (1.7KB)
│   └── plugins/
│       ├── akismet/               Spam protection (included with WordPress)
│       └── contact-form-7/        Contact form plugin (install via admin)
└── [other WordPress core files]
```

---

## Image Assets

All images are high-quality stock photos optimized for web:

**Hero Background:** 1920x1080px, 490KB
- Dramatic helicopter/mountain scene
- Dark overlay for text readability

**Service Images:** 800x600px, ~100KB each
- Mountain Rescue: Helicopter rescue operation
- Medical Evacuation: Medical transport scene
- Search & Rescue: Rescue team in action
- Emergency Transport: Helicopter emergency response

**Logo:** 18KB JPEG, Sumedha Air brand logo with green accent

**Image Optimization:**
- All images compressed for fast loading
- Hero background targets < 500KB
- Service images target < 300KB each
- JPEG format for optimal photo compression

---

## Brand Colors

**Defined in style.css (lines 17-25) as CSS variables:**
- `--brand-green: #90c33e` - Primary brand color (logo green)
- `--dark-charcoal: #2c3e50` - Professional dark base
- `--accent-orange: #ff6b35` - Emergency/urgency color
- `--white: #ffffff` - Clean backgrounds
- `--light-gray: #f5f5f5` - Section backgrounds
- `--medium-gray: #666666` - Secondary text
- `--light-green: #d4e8b4` - Subtle highlights

**Usage:**
- Green: Logo, primary CTA buttons, success messages, brand highlights
- Charcoal: Headers, navigation, footer, body text
- Orange: Emergency phone numbers, urgent CTAs, 24/7 badges
- White/Gray: Backgrounds, text on dark surfaces

---

## Theme Features

**Design Approach:**
- Bold fullscreen hero section
- Alternating image/content service blocks
- Mobile-first responsive design
- Hardcoded content (no page builder dependency)
- Fast and lightweight

**Responsive Breakpoints:**
- Mobile: < 768px (stacked layout, hamburger menu)
- Tablet: 768px - 1023px (2-column grids)
- Desktop: 1024px+ (full design, 4-column grids)

**Key Sections:**
1. Hero: Full viewport height with background image
2. Services: 4 featured services with alternating layout
3. Why Choose: 4 trust points in grid
4. Stats Bar: 24/7, coverage, rescues, experience
5. Emergency Contact: Prominent CTA

**WordPress Integration:**
- Custom image sizes (service-image: 800x600, hero-image: 1920x1080)
- Two navigation menus (primary and footer)
- Contact Form 7 support with fallback HTML
- Performance optimizations (emoji removal, head cleanup)
- SEO-friendly structure

---

## Security Notes

**Already Configured:**
- Unique authentication keys and salts generated
- WordPress version number removed from head
- Unnecessary meta tags removed
- File permissions should be: 755 (directories), 644 (files)

**Recommended Additional Security:**
1. **Change database password** in wp-config.php (line 23)
2. **Use strong admin password** during WordPress installation
3. **Install security plugin:** Wordfence or Sucuri
4. **Enable SSL certificate** (HTTPS) - critical for contact form
5. **Regular updates:** Keep WordPress core, theme, and plugins updated
6. **Backup regularly:** Database and wp-content directory
7. **Limit login attempts:** Use plugin like Limit Login Attempts Reloaded

**wp-config.php Security:**
```php
// Already set to false (production mode)
define( 'WP_DEBUG', false );

// Optional additions for hardening:
define( 'DISALLOW_FILE_EDIT', true ); // Disable file editor in admin
define( 'FORCE_SSL_ADMIN', true );    // Force SSL for admin (if SSL enabled)
```

---

## Performance Optimization

**Already Implemented:**
- Minification-ready CSS structure
- Optimized images (compressed)
- Emoji scripts removed
- Clean WordPress head
- No jQuery dependency
- Minimal JavaScript (mobile menu only)

**Recommended Additional Optimization:**
1. **Caching plugin:** WP Super Cache or W3 Total Cache
2. **Image optimization plugin:** Smush or ShortPixel
3. **CDN integration:** Cloudflare or KeyCDN
4. **Enable Gzip compression** in .htaccess
5. **Database optimization:** WP-Optimize plugin
6. **Lazy loading:** Native WordPress lazy loading (enabled by default in WP 5.5+)

**Gzip Compression (.htaccess addition):**
```apache
# Add after WordPress rewrite rules
<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE text/html text/plain text/xml text/css text/javascript application/javascript
</IfModule>
```

---

## Maintenance

**Regular Tasks:**
- **Weekly:** Check contact form submissions working
- **Monthly:** Update WordPress core and plugins
- **Quarterly:** Review and optimize database
- **Annually:** Review contact information accuracy
- **As needed:** Update service descriptions or images

**Backup Strategy:**
- **Files:** Backup wp-content directory (contains theme, images, plugins)
- **Database:** Export MySQL database regularly
- **Frequency:** Daily (automated) or weekly (manual minimum)
- **Storage:** Off-site backup (cloud storage or backup service)
- **Plugin recommendation:** UpdraftPlus for automated backups

**Updating Content:**
- **Contact info:** Edit functions.php (lines 138, 145, 152)
- **Services:** Edit page-services.php template
- **Homepage content:** Edit index.php template
- **Images:** Replace files in images/ directory (keep same filenames)

---

## Support & Resources

**WordPress Documentation:**
- Official docs: https://wordpress.org/documentation/
- Theme development: https://developer.wordpress.org/themes/

**Contact Form 7:**
- Documentation: https://contactform7.com/docs/
- Support forum: https://wordpress.org/support/plugin/contact-form-7/

**Theme Support:**
- Theme files location: wp-content/themes/sumedha-air/
- All templates are well-commented for easy modification
- CSS organized by section for easy updates

**Getting Help:**
- WordPress support forums: https://wordpress.org/support/
- Web hosting support (for server/database issues)
- Theme customization: Hire WordPress developer if extensive changes needed

---

## Deployment Checklist

**Pre-Deployment:**
- [ ] Database created and credentials updated in wp-config.php
- [ ] All files uploaded to web server
- [ ] File permissions set correctly (755/644)
- [ ] Domain DNS pointing to hosting server

**Initial Setup:**
- [ ] WordPress installation wizard completed
- [ ] Sumedha Air theme activated
- [ ] Three pages created (Home, Services, Contact)
- [ ] Homepage set as static front page
- [ ] Navigation menus configured (primary and footer)
- [ ] Permalink structure set to "Post name"

**Plugin Configuration:**
- [ ] Contact Form 7 installed and activated
- [ ] Contact form created with all required fields
- [ ] Form shortcode added to Contact page
- [ ] Form email settings configured
- [ ] Test form submission successful

**Content Updates:**
- [ ] Emergency phone number updated in functions.php
- [ ] Email address updated in functions.php
- [ ] Physical address updated in functions.php
- [ ] Contact Form 7 messages updated with real phone number
- [ ] Contact Form 7 mail recipient set to correct email

**Testing:**
- [ ] All visual elements display correctly
- [ ] All navigation links work
- [ ] Contact form submits and sends email
- [ ] Phone/email links work correctly
- [ ] Mobile responsive on actual devices
- [ ] Cross-browser testing completed
- [ ] Performance test (page load < 3 seconds)
- [ ] No console errors or broken links

**Security:**
- [ ] SSL certificate installed and HTTPS working
- [ ] Strong admin password set
- [ ] Database password changed from placeholder
- [ ] Security plugin installed (recommended)
- [ ] Backup solution configured

**Launch:**
- [ ] Search engine visibility enabled (Settings > Reading)
- [ ] Final content review
- [ ] Contact information verified
- [ ] Emergency contact tested on mobile
- [ ] Site announced/live

---

## Conclusion

Your Sumedha Air WordPress website is fully prepared for deployment. All theme files, images, and configurations are in place. Follow the deployment steps above to launch your professional helicopter rescue services website.

**What's Ready:**
- Complete custom WordPress theme
- Mobile-responsive design with brand colors
- All images optimized and in place
- Contact form integration ready
- SEO-friendly structure
- Fast-loading, professional design

**What You Need:**
- Web hosting with PHP and MySQL
- Domain name pointed to hosting
- Real contact information for updates
- SSL certificate for secure contact form
- Time to complete the deployment steps above

**Estimated deployment time:** 1-2 hours for someone familiar with WordPress, 2-4 hours for first-time deployment.

Good luck with your launch! Your professional website will effectively showcase Sumedha Air's critical mountain rescue services.
