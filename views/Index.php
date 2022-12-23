
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
        <th scope="col">Ngày sản xuất</th>
        <th scope="col">Chi tiết</th>
        <th scope="col">Sửa</th>
        <th scope="col">Xóa</th>
      </tr>
    </thead>
    <tbody>
        <?php
        			$rows = Index::getList();
        			foreach ($rows as $row){
			        echo "<tr>";
			        echo "<th scope=\"row\">" . $row['pr_id']."</th>";
			        echo "<td>". $row['pr_name'] ."</td>";
			        echo "<td><img src=\"". $row['pr_image']. "\" width=\"50px\"></td>";
              echo "<td>". $row['pr_price']. "</td>";
			        echo "<td>". $row['pr_date']. "</td>";
			        echo "<td><a href=\"#\"><i class=\"fas fa-info-circle\"></i></a></td>";
			        echo "<td><a href=\"index.php?url=edit&id=".$row['pr_id']."\"><i class=\"fas fa-edit\"></i></a></td>";
			        echo "<td><a href=\"index.php?url=delete&id=".$row['pr_id']. "\"><i class=\"fas fa-trash\"></i></a></td>";
			      	echo "</tr>";
			        }
        ?>
    </tbody>

    </table>
    <div>
      <button type="button" class="btn btn-info"><a href="index.php?url=add" style="text-decoration: none;">Thêm sản phẩm</a></button>
    </div>
  </div>
  </div>
  <?php include 'include/footer.php';?>
