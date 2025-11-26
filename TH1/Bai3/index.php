<?php
$target_file = "65HTTT_Danh_sach_diem_danh.csv";

if (!file_exists($target_file)) {
    echo "Không tìm thấy file 65HTTT_Danh_sach_diem_danh.csv!";
    exit;
}
$students = [];
if (($handle = fopen($target_file, "r")) !== false) {
     $header = fgetcsv($handle, 1000, ",");
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $students[] = $data;
    }
    fclose($handle);
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sinh viên</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Danh sách sinh viên</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>STT</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Lastname</th>
                    <th>Firstname</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Course1</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($students as $i => $student): ?>
                    <tr>
                        <td><?php echo $i + 1; ?></td>
                        <?php foreach ($student as $field): ?>
                            <td><?php echo htmlspecialchars($field); ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>