<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hoa Mới</title>
</head>
<body>
    <h2>Thêm loài hoa mới</h2>

    <form action="upload.php" method="post" enctype="multipart/form-data">

        <label>Tên hoa:</label><br>
        <input type="text" name="ten_hoa" required><br><br>

        <label>Mô tả:</label><br>
        <textarea name="mo_ta" rows="4" cols="40" required></textarea><br><br>

        <label>Chọn ảnh hoa:</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>

        <input type="submit" value="Thêm hoa">
    </form>

</body>
</html>