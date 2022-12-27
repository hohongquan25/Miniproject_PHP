<?php
	if ($data['isDelete'] === TRUE) {
		echo "<script>alert('Xóa sản phẩm thành công !');document.location='index.php'</script>";
	}

	else  {
		   echo "<script>alert('Xóa sản phẩm không thành công, vui lòng thử lại!');history.back()</script>";
	}
?>