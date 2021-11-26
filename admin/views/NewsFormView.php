<?php 
	//load file Layout.php vao day
	$this->fileLayout = "Layout.php";
 ?>
 <div class="col-md-12">  
    <div class="panel panel-primary" style="border:2px solid #192a56; border-radius:5px">
        <div class="panel-heading" style="background:#192a56; color:#fff; padding:10px 15px">Sửa tin tức</div>
        <div class="panel-body" style="padding:10px">
        <!-- muon upload duoc anh, file thi phai co thuoc tinh enctype="multipart/form-data" -->
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <!-- rows -->
            <div class="row" style="margin-top:5px; color:#222">
                <div class="col-md-2">Tên</div>
                <div class="col-md-10">
                    <input  style="color: #222;" type="text" name="name" value="<?php echo isset($record->name) ? $record->name : ""; ?>" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;color:#222">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input type="checkbox" <?php if(isset($record->hot) && $record->hot == 1): ?> checked <?php endif; ?> name="hot" id="hot"> <label for="hot">Hot</label>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px; color:#222">
                <div class="col-md-2">Ảnh</div>
                <div class="col-md-10">
                    <input type="file" name="photo">
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px; color:#222">
                <div class="col-md-2">Mô tả</div>
                <div class="col-md-10">
                    <textarea name="mota"><?php echo isset($record->mota)?$record->mota:""; ?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("mota");
                    </script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;color:#222">
                <div class="col-md-2">Nội dung</div>
                <div class="col-md-10">
                    <textarea name="noidung"><?php echo isset($record->noidung)?$record->noidung:""; ?></textarea>
                    <script type="text/javascript">
                        CKEDITOR.replace("noidung");
                    </script>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input style="background-color:#192a56; border:1px solid #192a56;" type="submit" value="Lưu" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>