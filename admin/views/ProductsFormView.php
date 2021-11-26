<?php
    // load file Layout.php vào đây
    $this->fileLayout = "Layout.php"
?>

<div class="col-md-12">  
    <div class="panel panel-primary" style="border:2px solid #192a56; border-radius:5px">
        <div class="panel-heading" style="background:#192a56; color:#fff; padding:10px 15px">Chỉnh sửa sản phẩm </div>
        <div class="panel-body" style="padding:10px">
            <!-- muốn upload đc ảnh, phải có thuộc tính enctype="multipart/form-data" -->
            <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <!-- rows -->
                <div class="row" style="margin-top:5px; color:#222">
                    <div class="col-md-2">Tên</div>
                    <div class="col-md-10">
                    <input type="text" name="name" value="<?php echo isset($record->name) ? $record->name : ""; ?>" class="form-control" required>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px; color:#222">
                    <div class="col-md-2">Giá (vnd)</div>
                    <div class="col-md-10">
                    <input type="text" name="price" value="<?php echo isset($record->price) ? $record->price : "0"; ?>" class="form-control" required>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px; color:#222">
                    <div class="col-md-2">Giảm giá (0-100)</div>
                    <div class="col-md-10">
                    <input type="text" name="discount" value="<?php echo isset($record->discount) ? $record->discount : "0"; ?>" class="form-control" required>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px; color:#222">
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
                    <input type="file" name="photo1">
                    <input type="file" name="photo2">
                    <input type="file" name="photo3">
                    <input type="file" name="photo4">
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px; color:#222">
                    <div class="col-md-2">Loại</div>
                    <div class="col-md-10" >
                        <?php 
                            $categories = $this->modelCategories();
                        ?>
                        <select name="category_id" class="form-control" style="width:250px; color: #222">
                            <?php foreach($categories as $rows): ?>
                                <option <?php if(isset($record->id) && $record->category_id == $rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                                    <?php 
                                        $categoriesSub = $this->modelCategoriesSub($rows->id);
                                    ?>
                                    <?php foreach($categoriesSub as $rowsSub): ?>
                                        <option <?php if(isset($recordSub->id) && $record->category_id == $rowsSub->id): ?> selected <?php endif; ?> value="<?php echo $rowsSub->id; ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rowsSub->name; ?></option>
                                    <?php endforeach; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
            <!-- end rows -->
            <!-- rows -->
                <div class="row" style="margin-top:5px; color:#222">
                    <div class="col-md-2">Mô tả</div>
                    <div class="col-md-10">
                        <textarea name="mota"><?php echo isset($record->mota) ? $record->mota : ""; ?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("mota");
                        </script>
                    </div>
                </div>
                <!-- end rows -->
                <div class="row" style="margin-top:5px; color:#222">
                    <div class="col-md-2">Nội dung</div>
                    <div class="col-md-10">
                        <textarea name="noidung"><?php echo isset($record->noidung) ? $record->noidung : ""; ?></textarea>
                        <script type="text/javascript">
                            CKEDITOR.replace("noidung");
                        </script>
                    </div>
                </div>
                <!-- end rows -->
                <!-- rows -->
                <div class="row" style="margin-top:5px;">
                    <div class="col-md-2"></div>
                    <div class="col-md-10" >
                        <input style="background-color:#192a56; border:1px solid #192a56;" type="submit" value="Lưu" class="btn btn-primary">
                    </div>
                </div>
                <!-- end rows -->
            </form>
        </div>
    </div>
</div>