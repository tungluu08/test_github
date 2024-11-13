<?php
// Thông tin kết nối cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "booking_db";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// Kiểm tra nếu form được gửi đi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $booking_number = $_POST['booking_number'];
    $shipping_company = $_POST['shipping_company'];
    $container_type = $_POST['container_type'] ?? null;
    $pickup_address = $_POST['pickup_address'] ?? null;
    $booking_type = $_POST['booking_type'];

    // Câu lệnh SQL để chèn dữ liệu vào bảng booking
    $sql = "INSERT INTO booking (booking_number, shipping_company, container_type, pickup_address, booking_type)
            VALUES (?, ?, ?, ?, ?)";

    // Chuẩn bị câu lệnh
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $booking_number, $shipping_company, $container_type, $pickup_address, $booking_type);

    // Thực thi câu lệnh và kiểm tra kết quả
    if ($stmt->execute()) {
        echo "Booking đã được lưu thành công!";
    } else {
        echo "Lỗi: " . $stmt->error;
    }

    // Đóng kết nối
    $stmt->close();
    $conn->close();
}
?>

