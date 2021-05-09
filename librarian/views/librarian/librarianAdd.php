<div class="main-section">
    <?php include('views/nav/nav.php'); ?>
    <section class="hero-wrap js-fullheight">
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1>เพิ่มบรรณารักษ์</h1>
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
                                <div class="col-sm-4">Username</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="username" type="text" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">Password</div>
                                <div class="col-sm-4">
                                    <input class="form-control" type="Password" name="password" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">ชื่อ</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="name" type="text" required>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-sm-4">นามสกุล</div>
                                <div class="col-sm-4">
                                    <input class="form-control" name="surname" type="text" required>
                                </div>
                            </div>
                            <input type="hidden" name="controller" value="librarian" id="controller">
                            <input type="hidden" name="action" value="add" id="action">
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
