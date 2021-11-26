<?php 
    $this->fileLayout= "LayoutTrangTrong.php";
?>
<div class="middle" style="margin: 2rem 9rem;" >
    <h1 style="font-size: 3rem;font-weight:bold;"><?php echo $record->name; ?></h1>
    <img src="assets/upload/news/<?php echo $record->photo; ?>" style="width: 90%;margin-top:2rem;">
    <h3 style="margin-top: 2rem;font-size:2rem;font-weight:600;"><?php echo $record->mota; ?></h3>
    <h5 style="font-size: 1.5rem;;"><?php echo $record->noidung; ?></h5>
</div>