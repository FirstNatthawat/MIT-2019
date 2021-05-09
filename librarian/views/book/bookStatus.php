<style>
    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 60%;
        }
    }
</style>

<div class="main-section">
    <?php include('views/nav/nav.php'); ?>
    <section class="hero-wrap js-fullheight">
        <div class="container">
            <div class="row description js-fullheight align-items-center justify-content-center">
                <div class="col-md-8 text-center">
                    <div class="text">
                        <h1>บันทึกการยืม-คืนหนังสือ</h1>
                        <br/><br/>
                        <form method="post">
                            <imput type="hidden" name="controller" value="book">
                            <input type="hidden" name="action" value="bookStatusPage">
                            <input type="text" name="ISBN" minlength="13" maxlength="13" placeholder="     เลข ISBN ของหนังสือ">
                            <input type="submit" style="display:none"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<button style="display: none;" id="model-book" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>
<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">ข้อมูลหนังสือ</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row" style="padding: 10px">
                    <div class="col-sm-5">
                        <center><img src='images/bookImg/<?php echo $book->image_path ?>'
                                     style='width: 70%; height: 70%'></center>
                    </div>
                    <div class="col-sm-7" style="font-size: 120%; padding: 25px;">
                        <table>
                            <tr>
                                <th>ISBN :</th>
                                <td>&nbsp;&nbsp;<?php echo $book->ISBN ?></td>
                            </tr>
                            <tr>
                                <th>หมวดหมู่ :</th>
                                <td>&nbsp;&nbsp;<?php echo $book->categoryName ?></td>
                            </tr>
                            <tr>
                                <th>ชื่อหนังสือ :</th>
                                <td>&nbsp;&nbsp;<?php echo $book->name ?></td>
                            </tr>
                            <tr>
                                <th>ชื่อผู้แต่ง :</th>
                                <td>&nbsp;&nbsp;<?php echo $book->author ?></td>
                            </tr>
                            <tr>
                                <th>จำนวนทั้งหมด (เล่ม) :</th>
                                <td>&nbsp;&nbsp;<?php echo $book->amount ?></td>
                            </tr>
                            <tr>
                                <th>จำนวนคงเหลือ (เล่ม) :</th>
                                <td>&nbsp;&nbsp;<?php echo $book->remain ?></td>
                            </tr>
                            <tr>
                                <th>ตำแหน่งหนังสือ :</th>
                                <td>&nbsp;&nbsp;<?php echo $book->location ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php
                echo "<a class=\"btn btn-success \" href=\"?controller=book&action=borrow_book&ISBN=$book->ISBN\">
                                        <i class=\"fa fa-pencil\" aria-hidden=\"true\"></i> ยืม</a>

                                    <a class=\"btn btn-danger \" href=\"?controller=book&action=return_book&ISBN=$book->ISBN\">
                                        <i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i> คืน</a>";
                ?>
            </div>
        </div>

    </div>
</div>

<?php include('views/loader/loader.php'); ?>
<?php
if (isset($book)) {
    echo "<script>
        $(document).ready(function(){
            $('#model-book').click();
        });
</script>";
}
?>
