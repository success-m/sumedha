-- Create database and user (already handled by environment variables, but adding for clarity)
CREATE DATABASE IF NOT EXISTS sumedha_air CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER IF NOT EXISTS 'wordpress'@'%' IDENTIFIED BY 'wordpress';
GRANT ALL PRIVILEGES ON sumedha_air.* TO 'wordpress'@'%';
FLUSH PRIVILEGES;
