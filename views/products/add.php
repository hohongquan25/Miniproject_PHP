<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
      <title>Index</title>
    </head>
    <body>

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
                    <label for="txtGia" class="col-sm-2 col-form-label">Giá</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" id="txtGia" name="txtGia">
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
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
