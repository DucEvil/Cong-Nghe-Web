<?php
// TODO 1: Khởi động session
session_start();

// TODO 2: Kiểm tra xem người dùng đã nhấn nút "Đăng nhập" (gửi form) chưa
if (isset($_POST['username'])) {

    // TODO 3: Lấy dữ liệu 'username' và 'password' từ $_POST
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // TODO 4: (Giả lập) Kiểm tra logic đăng nhập
    if ($user == 'admin' && $pass == '123') {

        // TODO 5: Nếu thành công, lưu tên username vào SESSION
        $_SESSION['username'] = $user;

        // TODO 6: Chuyển hướng người dùng sang trang "chào mừng"
        header('Location: index.php');
        exit;

    } else {
        // Nếu thất bại, chuyển hướng về login.html
        header('Location: trangchu.php');
        exit;
    }

} else {
    // TODO 7: Nếu người dùng truy cập trực tiếp file này (không qua POST)
    header('Location: login.html');
    exit;
}
?>