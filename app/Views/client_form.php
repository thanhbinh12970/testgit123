<?php
/** @var string $errorMessage */
/** @var string $successMessage */
/** @var array $client */
?>

<div class="container my-5">
    <h2>Thêm/Cập Nhật Khách Hàng</h2>

    <?php if (!empty($errorMessage)): ?>
        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong><?php echo $errorMessage; ?></strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php endif; ?>

    <?php if (!empty($successMessage)): ?>
        <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong><?php echo $successMessage; ?></strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    <?php endif; ?>

    <form method="POST" action="/myshop/index.php?action=save">
        <input type="hidden" name="id" value="<?php echo $client['id'] ?? ''; ?>">

        <div class="mb-3">
            <label class="form-label">Tên</label>
            <input type="text" class="form-control" name="name" value="<?php echo $client['name'] ?? ''; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?php echo $client['email'] ?? ''; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Số điện thoại</label>
            <input type="text" class="form-control" name="phone" value="<?php echo $client['phone'] ?? ''; ?>" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" value="<?php echo $client['address'] ?? ''; ?>" required>
        </div>

        <div class="d-flex justify-content-between">
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a class="btn btn-outline-primary" href="/myshop/index.php" role="button">Hủy</a>
        </div>
    </form>
</div>
