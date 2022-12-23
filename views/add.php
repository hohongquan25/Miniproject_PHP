<?php include 'include/header.php';?>

      <main class="mt-4">
        <div class="container">
            <div class="row">
              <div class="col-md-12">
                <h2>Thêm dữ liệu</h2>
                <form action="" method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="txtSP" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txtSP" name="txtSP">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="hinh" class="col-sm-2 col-form-label">Ảnh</label>
                    <div class="col-sm-10">
                      <input type="file" class="form-control" id="hinh" name="hinh">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="price" class="col-sm-2 col-form-label">Giá</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price">

                    </div>
                  </div>
                  
                  </div>
                  <button type="submit" class="btn btn-primary" name="btnSave">Lưu</button>
                </form>
              </div>
            </div>
        </div>
      </main>
 <?php include 'include/footer.php';?>
