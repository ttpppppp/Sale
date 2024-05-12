<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yêu cầu xóa dữ liệu</title>
</head>
<body>
    <h1>Yêu cầu xóa dữ liệu</h1>
    <form action="<?php echo base_url("index.php/deletefb") ?>" method="post">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Gửi yêu cầu</button>
    </form>
</body>
</html>
