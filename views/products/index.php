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

  <div class="content">
  <div class="col-md-8">
    <table class="table table-striped">
        <thead>
      <tr>
        <th scope="col">STT</th>
        <th scope="col">Tên sản phẩm</th>
        <th scope="col">Ảnh</th>
        <th scope="col">Giá</th>
        <th scope="col">Chi tiết</th>
        <th scope="col">Sửa</th>
        <th scope="col">Xóa</th>
      </tr>
    </thead>
    <tbody>
        <?php
        //lấy dữ liệu từ CSDL và để ra bảng (phần lặp lại)
        //bước 1:kết nối tời csdl(mysql)
        $conn = mysqli_connect('localhost','root','','mini-project');
            if(!$conn){
                die("Không thể kết nối,kiểm tra lại các tham số kết nối");
                    }

         //bước 2 khai báo câu lệnh thực thi và thực hiện truy vấn
        $sql = "SELECT*FROM products";
        $result = mysqli_query($conn,$sql);

        //bước 3 xử lý kết quả trả về
        if(mysqli_num_rows($result) > 0){
            $i=1;
            while($row = mysqli_fetch_assoc($result)){
    ?>
      <tr>
        <th scope="row"><?php echo $i; ?> </th>
        <td><?php echo $row['pr_name']; ?></td>
        <td><img src="<?php echo $row['pr_image']; ?>" width="50px"></td>
        <td><a href="#"><i class="fas fa-info-circle"></i></a></td>
        <td><a href="#"><i class="fas fa-edit"></i></a></td>
        <td><a href="xoa.php?pr_id=<?php echo $row['pr_id']; ?>"><i class="fas fa-trash"></i></a></td>
      </tr>
      <?php
        $i++;
            }
        }
        ?>
    </tbody>

    </table>
    <div>
      <button type="button" class="btn btn-info"><a href="index.php?controller=product&action=add" style="text-decoration: none;">Thêm sản phẩm</a></button>
    </div>
  </div>
  </div>
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
