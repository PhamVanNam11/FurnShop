<?php 
    $this->fileLayout = "Layout.php";
?>
<div class="col-md-12">  
    <div class="panel panel-primary" style="border:1px solid #192a56; border-radius:5px">
        <div class="panel-heading"  style="background:#192a56; color:#fff; padding:10px 15px">Chỉnh sửa </div>
        <div class="panel-body" style="padding:10px">
        <form method="post" action="<?php echo $action; ?>" style="color:#222222">
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Sản phẩm</div>
                <div class="col-md-10">
                <input style="color:#222222" type="text" name="name" value="<?php echo isset($record->name) ? $record->name : ""; ?>" class="form-control" required>
                </div>
            </div>
            <!-- end rows -->
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2">Parent</div>
                <div class="col-md-10">
                    <?php 
                        $category_id = isset($record->id) ? $record->id : 0;
                        $categories = $this->modelCategories($category_id);
                    ?>
                    <select name="parent_id" class="form-control" style="width: 250px;">
                        <option value="0"></option>
                        <?php foreach($categories as $rows): ?>
                            <option <?php if(isset($record->id) && $record->parent_id == $rows->id): ?> selected <?php endif; ?> value="<?php echo $rows->id; ?>"><?php echo $rows->name; ?></option>
                        <?php endforeach; ?>        
                    </select>
                </div>
            </div>
            <!-- rows -->
            <div class="row" style="margin-top:5px;">
                <div class="col-md-2"></div>
                <div class="col-md-10">
                    <input style="background-color: #192a56; border:1px solid #192a56" type="submit" value="Lưu" class="btn btn-primary">
                </div>
            </div>
            <!-- end rows -->
        </form>
        </div>
    </div>
</div>