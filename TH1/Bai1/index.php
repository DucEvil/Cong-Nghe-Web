<?php
// Bước 1: Gọi file data.php chứa mảng dữ liệu (giả lập CSDL)
require 'data.php';

// Bước 2: Nhận thông báo thành công tạo mới qua phương thức GET (nếu có)
$success = $_GET['success'] ?? "";


?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Quản lý Hoa</title>
    <!-- Chèn CSS nếu cần, ví dụ Bootstrap hay style.css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
    <a class="navbar-brand" href="index.php">Quản lý Hoa</a>
    <div class="ms-auto">
      <a class="btn btn-outline-light" href="login.html">Đăng xuất (Tạm thời)</a>
    </div>
  </div>
</nav>


<div class="container">
    <h1>Dashboard</h1>
    <p>Dữ liệu trong ví dụ này đang được lưu cố định trong một mảng PHP (chưa dùng CSDL).</p>

    <!-- Bước 3: Hiển thị thông báo nếu có tham số ?success=created -->
    <?php if ($success == "created"): ?>
        <div style="padding: 10px; background:#d1e7dd; color:#0f5132; border-radius:4px; margin-bottom:16px;">
            Giả lập: Thêm Hoa mới thành công! (thông báo thông qua tham số GET trong URL).
        </div>
    <?php endif; ?>

    <!-- Bước 4: Hiển thị bảng dữ liệu -->
    <table class="table">
        <thead>
        <tr>
            <th >#</th>
            <th style="width : 100px">Tên hoa</th>
            <th>Mô tả</th>
            <th>Ảnh</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($hoa_list)): ?>
            <!-- Duyệt từng bản ghi trong mảng -->
            <?php foreach ($hoa_list as $index => $hoa): ?>
                <tr>
                    <td><?php echo $index + 1; ?></td>
                    <td><?php echo htmlspecialchars($hoa['ten_hoa']); ?></td>
                    <td><?php echo htmlspecialchars($hoa['mo_ta']); ?></td>
                    <td>
                        <img src="uploads/<?php echo htmlspecialchars($hoa['anh']); ?>" alt="<?php echo htmlspecialchars($hoa['ten_hoa']); ?>" style="max-width:100px;">
                    </td>
                    <td style="text-align:center;">
                        <input type="checkbox" name="delete[]" value="<?php echo $index; ?>">
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            
            <tr>
                <td colspan="7">Chưa có hoa nào trong mảng.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <a href="create.php" class="btn btn-primary"> Thêm Hoa</a>
    <a href="update.php" class="btn btn-primary"> Sửa Hoa</a>
    <a href="delete.php" class="btn btn-primary"> Xóa Hoa</a>
</div>
</body>
</html>
