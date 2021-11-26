<?php 
    $this->fileLayout = "Layout.php";
?>

<div class="col-md-12">
    <div style="margin-bottom:5px;">
        <a href="index.php?controller=categories&action=create" style="background:#192a56; border:1px solid #192a56" class="btn btn-primary"><i class="fas fa-user-plus"></i> Thêm mới</a>
    </div>
    <div class="panel panel-primary" style="border:2px solid #192a56; border-radius:5px">
        <div class="panel-heading" style="background:#192a56; color:#fff; padding:10px 15px">Danh sách </div>
        <div class="panel-body" style="padding:10px">
            <table class="table table-bordered table-hover">
                <tr>
                    <th style="color:#222222">Sản phẩm</th>
                    <th style="width:170px;color:#222222">Chức năng</th>
                </tr>
                <?php foreach($data as $rows): ?>
                <tr>
                    <td style="color:#222" ><?php echo $rows->name; ?></td>
                    <td style="text-align:center;">
                        <a href="index.php?controller=categories&action=update&id=<?php echo $rows->id; ?>" style="color: #222222;text-decoration:none"><i class="fas fa-edit"></i>Sửa</a>&nbsp;
                        <a href="index.php?controller=categories&action=delete&id=<?php echo $rows->id; ?>" onclick="return window.confirm('Xóa?');" style="color: #222222;text-decoration:none"><i class="fas fa-trash-alt"></i>Xóa</a>
                    </td>
                </tr>
                        <?php 
                            $categoriesSub = $this->modelCategoriesSub($rows->id);
                        ?>
                        <?php foreach($categoriesSub as $rowsSub): ?>
                        <tr>
                            <td style="color:#444; padding-left: 40px;" ><?php echo $rowsSub->name; ?></td>
                            <td style="text-align:center;">
                                <a href="index.php?controller=categories&action=update&id=<?php echo $rowsSub->id; ?>" style="color: #222;text-decoration:none"><i class="fas fa-edit"></i>Sửa</a>&nbsp;
                                <a href="index.php?controller=categories&action=delete&id=<?php echo $rowsSub->id; ?>" onclick="return window.confirm('Xóa?');" style="color: #222222;text-decoration:none"><i class="fas fa-trash-alt"></i>Xóa</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item"><a href="#" class="page-link" style="color:#666">Trang</a></li>
                <?php for($i =1; $i<= $numPage; $i++): ?>
                    <li class="page-item"><a href="index.php?controller=categories&p=<?php echo $i; ?>" class="page-link" style="color:#888"><?php echo $i; ?></a></li>
                <?php endfor; ?>    
            </ul>
        </div>
    </div>
</div>