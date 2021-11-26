<?php 
    $this->fileLayout= "LayoutTrangTrong.php";
?>
<h1 style="margin:20px">Tin tức</h1>
        <div class="wrapper-blog" style="margin: 20px 90px;" > 
          <!-- list news -->
          <div class="row">
            <?php foreach($data as $rows): ?>
                <div class="col-md-6" style="margin-top: 20px;"> 
                    <a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" class="image"> 
                        <img src="assets/upload/news/<?php echo $rows->photo; ?>" alt="<?php echo $rows->name; ?>" title="<?php echo $rows->name; ?>" style="width:100%;height: 350px;overflow:hidden; margin-top:10px" class="img-responsive"> 
                    </a>
                    <h3 style="margin: 20px 0;"><a href="index.php?controller=news&action=detail&id=<?php echo $rows->id; ?>" style="color:#192a56; font-size:2.2rem;text-decoration:none;"><?php echo $rows->name; ?></a></h3>
                    <h5 class="desc"><?php echo $rows->mota; ?></h5>
                </div>
            <?php endforeach; ?>    
          </div>
          <!-- end list news --> 
          <div class="pagination pull-right" style="margin-top: 4rem;">
            <li><a href="#" style="font-size: 2rem; color:#192a56; text-decoration:none;padding:4px; border:1px solid #192a56; border-radius:5px;">Trang</a></li>
            <?php for($i =1; $i <=$numPage; $i++): ?>
                <li><a href="index.php?controller=news&p=<?php echo $i; ?>" style="font-size: 1.9rem; text-decoration:none; padding:4px; color:#192a56;margin-left:10px;"><?php echo $i; ?></a></li>
            <?php endfor; ?>    
          </div>
        </div>