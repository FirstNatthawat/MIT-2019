<div class="main-section">
    <?php include('views/nav/nav.php'); ?>
    <section class="hero-wrap js-fullheight">
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1>แก้ไขข้อมูลหนังสือ</h1>
                        <!--                        <h4 class="mb-5">Free Bootstrap 4 UI Kit on Tools Design.</h4>-->
                        <!--                        <p><a href="#" class="btn btn-white px-4 py-3"><i class="ion-ios-cloud-download mr-2"></i>Download Tools</a></p>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <form method="post" enctype="multipart/form-data">
                            <div class="row form-group">
                                <div class="col-sm-4">ชื่อ</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="name" type="text" required maxlength="100" value="<?php echo $book->name ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">ชื่อผู้แต่ง</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="author" type="text" required maxlength="100" value="<?php echo $book->author ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">จำนวนหน้า</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="page" type="text" required maxlength="6" value="<?php echo $book->page ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">จำนวนที่นำเข้า</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="amount" type="text" required maxlength="2" value="<?php echo $book->amount ?>">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">หมวด</div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="category" required>
                                        <?php
                                        foreach ($category as $cat) {
                                            echo '<option ';
                                            if ($cat->categoryID == $book->category){
                                                echo 'selected="selected"';
                                            }
                                            echo 'value="' . $cat->categoryID . '" >' . $cat->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">ที่ตั้งหนังสือ</div>
                                <div class="col-sm-4">
                                    <?php
                                    $location = (explode("-",$book->location));
                                    ?>
                                    <input class="form-control" name="location" type="text" required minlength="4" value="<?php echo $location[1]?>"><br>
                                    <p style="color: red;"> *ระบุเป็นตำแหน่งตู้หนังสือและชั้นหนังสือ เช่น ตู้ที่ 5 ชั้นที่ 4 จะเป็น 0504</p>
                                </div>
                            </div>
                            <input type="hidden" name="ISBN" value="<?php echo $book->ISBN ?>">
                            <input type="hidden" name="controller" value="book" id="controller">
                            <input type="hidden" name="action" value="edit_book" id="action">
                            <button type="submit">บันทึก</button>
                            <a href="?controller=book&action=managePage"><button >ยกเลิก</button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('views/loader/loader.php'); ?>
