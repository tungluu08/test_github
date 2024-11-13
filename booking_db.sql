-- Tạo cơ sở dữ liệu
CREATE DATABASE IF NOT EXISTS booking_db;
USE booking_db;

-- Tạo bảng booking
CREATE TABLE IF NOT EXISTS booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    booking_number VARCHAR(50) NOT NULL,
    shipping_company VARCHAR(100) NOT NULL,
    container_type VARCHAR(50),
    pickup_address VARCHAR(255),
    booking_type ENUM('export', 'import', 'domestic') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
--oi zoi oi
