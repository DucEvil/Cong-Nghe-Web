<?php require 'data.php'; ?>
<!DOCTYPE html><html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>4 loài hoa đẹp cho xuân-hè</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
</head>
<body>
  <body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4">
    <div class="container">
        <a class="navbar-brand" href="#">Home</a>
        <div class="ms-auto">
            <a class="btn btn-outline-light" href="login.html">Đăng xuất (Tạm thời)</a>
        </div>
    </div>
</nav>

<div class="container">
    <?php foreach ($hoa_list as $i => $hoa): ?>
    <div class="row align-items-center mb-4 shadow-sm p-3 bg-white rounded">
        <div class="col-md-4">
            <img src="uploads/<?php echo $hoa['anh']; ?>" class="img-fluid rounded" alt="<?php echo $hoa['ten_hoa']; ?>">
        </div>
        <div class="col-md-8">
            <h5><?php echo ($i+1) . ". " . $hoa['ten_hoa']; ?></h5>
            <p><?php echo $hoa['mo_ta']; ?></p>
        </div>
    </div>
    <?php endforeach; ?>
</div>
</body>
</html>
