<?php include 'include/header.php';?>
<?php 
  $model = new Model();
  $row = $model->getProductByID($_GET['id']);  
  EditController::editProduct($_GET['id']);
?>
      <main class="mt-4">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2>Sửa thông tin sản phẩm</h2>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="txtSP" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" value = <?= "\"".$row['pr_name']."\"" ?> id="txtSP" name="txtSP" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="hinh" class="col-sm-2 col-form-label">Ảnh</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="hinh" name="hinh" value = <?= "\"".$row['pr_image']."\"" ?>>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Giá</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" value = <?= "\"".$row['pr_price']."\"" ?>>

                    </div>
                  </div>

                    <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label">Ngày sản xuất</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" id="date" name="date" value = <?= "\"".$row['pr_date']."\"" ?>>

                    </div>
                  </div>
                  
                  </div>
                  <button type="submit" class="btn btn-primary" name="btnEdit">Lưu</button>
                </form>
              </div>
            </div>
        </div>
      </main>
 <?php include 'include/footer.php';?>
