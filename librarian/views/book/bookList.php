<div class="main-section">
    <?php include('views/nav/nav.php'); ?>
    <section class="hero-wrap js-fullheight">
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1>หนังสือทั้งหมด</h1>
                        <!--                        <h4 class="mb-5">Free Bootstrap 4 UI Kit on Tools Design.</h4>-->
                        <!--                        <p><a href="#" class="btn btn-white px-4 py-3"><i class="ion-ios-cloud-download mr-2"></i>Download Tools</a></p>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="text">
                        <a href="?controller=book&action=addPage">
                            <button class="btn btn-primary btn-round"> เพิ่มหนังสือ </button><br/><br/>
                        </a>
                        <table class="table table-bordered tabledata display" id="BooksTable" style="width:100%">
                            <thead>
                            <tr>
                                <th>ปกหนังสือ</th>
                                <th>ISBN</th>
                                <th>หมวดหมู่</th>
                                <th>ชื่อหนังสือ</th>
                                <th>ชื่อผู้แต่ง</th>
                                <th>จำนวนทั้งหมด (เล่ม)</th>
                                <th>จำนวนคงเหลือ (เล่ม)</th>
                                <th>ตำแหน่งหนังสือ</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php //print_r($user_list);
                            foreach ($books as $book) {
                                echo "<tr>
                      <td><img src='images/bookImg/$book->image_path' style='width: 107px; height: 160px'></td>
                      <td>$book->ISBN</td>
                      <td>$book->categoryName</td>
                      <td>$book->name</td>
                      <td>$book->author</td>
                      <td>$book->amount</td>
                      <td>$book->remain</td>
                      <td>$book->location</td>
                      ";
                                ?>
                                <td align="center">
                                    <a class="btn btn-success edit_spec2" href="?controller=book&action=editPage&ISBN=<?php echo $book->ISBN?>">
                                        <i class="fa fa-pencil" aria-hidden="true"></i> แก้ไข</a>

                                    <a class="btn btn-danger delete_spec" href="?controller=book&action=delete_book&ISBN=<?php echo $book->ISBN?>"
                                       onclick="return confirm('คุณต้องการลบหนังสือ <?php echo $book->name ?> จากคลังข้อมูลหรือไม่?')">
                                        <i class="fa fa-trash-o" aria-hidden="true"></i> ลบ</a>
                                </td>
                                </tr>
                            <?php } ?>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('views/loader/loader.php'); ?>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/rowreorder/1.2.6/js/dataTables.rowReorder.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    $(document).ready( function () {
        $('#BooksTable').DataTable({
            /*rowReorder: {
                selector: 'td:nth-child(2)'
            },*/
            responsive: true,
            "order": [[ 2, 'asc' ]],
            "columnDefs": [
                { "orderable": false, "targets": 0 },
                { "orderable": false, "targets": 8 },
                { responsivePriority: 1, targets: 3 }
            ]
        } );
    } );
</script>