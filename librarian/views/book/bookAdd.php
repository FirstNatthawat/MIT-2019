<div class="main-section">
    <?php include('views/nav/nav.php'); ?>
    <section class="hero-wrap js-fullheight">
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1>เพิ่มข้อมูลหนังสือ</h1>
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
                                <div class="col-sm-4">ISBN</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="ISBN" type="text" required maxlength="13" minlength="13">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">Picture</div>
                                <div class="col-sm-4">
                                    <input class="form-control" type="file" name="fileToUpload" required><br>
                                    <p style="color: red;"> *ขนาดภาพไม่เกิน 3MB และชื่อภาพไม่ควรใช้ภาษาไทย</p>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">ชื่อ</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="name" type="text" required maxlength="100">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">ชื่อผู้แต่ง</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="author" type="text" required maxlength="100">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">จำนวนหน้า</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="page" type="text" required maxlength="6">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">จำนวนที่นำเข้า</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="amount" type="text" required maxlength="2">
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">หมวด</div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="category" required>
                                        <?php
                                        foreach ($category as $cat) {
                                            echo '<option value="' . $cat->categoryID . '" >' . $cat->name . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">ที่ตั้งหนังสือ</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="location" type="text" required minlength="4"><br>
                                    <p style="color: red;"> *ระบุเป็นตำแหน่งตู้หนังสือและชั้นหนังสือ เช่น ตู้ที่ 5 ชั้นที่ 4 จะเป็น 0504</p>
                                </div>
                            </div>
                            <input type="hidden" name="controller" value="book" id="controller">
                            <input type="hidden" name="action" value="add_book" id="action">
                            <button type="submit">บันทึก</button>
                            <button type="reset">ยกเลิก</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('views/loader/loader.php'); ?>
