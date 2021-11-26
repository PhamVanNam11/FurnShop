<?php 
	//load file layout vao day
	$this->fileLayout = "Layout.php";
 ?>
 <div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=news&action=create" style="background:#192a56; border:1px solid #192a56" class="btn btn-primary">Thêm tin tức</a>
    </div>
    <div class="panel panel-primary" style="border:2px solid #192a56; border-radius:5px">
        <div class="panel-heading" style="background:#192a56; color:#fff; padding:10px 15px">Tin tức</div>
        <div class="panel-body" style="padding:10px">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="width:100px; color:#222">Ảnh</th>
                    <th style="color:#222">Tên</th>
                    <th style="width:60px; color:#222">Hot</th>
                    <th style="width:170px;color:#222">Chức năng</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td>
                        <?php if($rows->photo != "" && file_exists("../assets/upload/news/".$rows->photo)): ?>
                            <img src="../assets/upload/news/<?php echo $rows->photo; ?>" style="max-width: 100px;">
                        <?php endif; ?>
                    </td>
                    <td style="color:#222"><?php echo $rows->name; ?></td>
                    <td style="text-align:center; color:#192a56">
                        <?php if(isset($rows->hot) && $rows->hot == 1): ?>
                            <span class="fa fa-check"></span>
                        <?php endif; ?>
                    </td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=news&action=update&id=<?php echo $rows->id; ?>" style="color: #222;text-decoration:none"><i class="fas fa-edit"></i>Sửa</a>&nbsp;
                        <a href="index.php?controller=news&action=delete&id=<?php echo $rows->id; ?>" style="color: #222;text-decoration:none" onclick="return window.confirm('Are you sure?');"><i class="fas fa-trash-alt"></i>Xóa</a>
                    </td>
                </tr>
            	<?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
            	<li class="page-item"><a href="#" class="page-link" style="color:#666">Trang</a></li>
            	<?php for($i = 1; $i <= $numPage; $i++): ?>
            		<li class="page-item"><a href="index.php?controller=news&p=<?php echo $i; ?>" class="page-link" style="color:#888"><?php echo $i; ?></a></li>
            	<?php endfor; ?>
            </ul>
        </div>
    </div>
</div>