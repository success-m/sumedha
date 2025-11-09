FROM wordpress:6.5-php8.2

# Set working directory
WORKDIR /var/www/html

# Install additional PHP extensions if needed
RUN apt-get update && apt-get install -y \
    default-mysql-client \
    && rm -rf /var/lib/apt/lists/*

# Copy custom theme files
COPY wp-content/* /var/www/html/wp-content/

# Set proper permissions
RUN chown -R www-data:www-data /var/www/html/wp-content

# Health check
HEALTHCHECK --interval=30s --timeout=10s --start-period=5s --retries=3 \
    CMD curl -f http://localhost/ || exit 1
