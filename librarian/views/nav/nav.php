<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="?controller=pages&action=home">Library Assistant</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <!--                <li class="dropdown nav-item">-->
                <!--                    <a href="#" class="dropdown-toggle nav-link icon d-flex align-items-center" data-toggle="dropdown">-->
                <!--                        <i class="ion-ios-apps mr-2"></i>-->
                <!--                        Components-->
                <!--                        <b class="caret"></b>-->
                <!--                    </a>-->
                <!--                    <div class="dropdown-menu dropdown-menu-left">-->
                <!--                        <a href="#" class="dropdown-item"><i class="ion-ios-apps mr-2"></i> All Components</a>-->
                <!--                        <a href="#" class="dropdown-item"><i class="ion-ios-document mr-2"></i> Documentation</a>-->
                <!--                    </div>-->
                <!--                </li>-->
                <?php
                if (!isset($_SESSION['user'])) {
                    ?>
                    <li class="nav-item"><a onclick="document.getElementById('id01').style.display='block'" href="#"
                                            class="nav-link icon d-flex align-items-center"><i
                                    class="ion-ios-log-in"></i>&nbsp;&nbsp;ลงชื่อเข้าใช้</a>
                    </li>
                    <?php
                } else {
                    ?>
                    <li class="nav-item"><a href="?controller=book&action=managePage"
                                            class="nav-link icon d-flex align-items-center"><i class="ion-ios-book"></i>&nbsp;&nbsp;หนังสือทั้งหมด</a>
                    </li>
                    <li class="nav-item"><a href="?controller=book&action=bookStatusPage"
                                            class="nav-link icon d-flex align-items-center"><i
                                    class="ion-ios-git-compare"></i>&nbsp;&nbsp;ยืม-คืนหนังสือ</a></li>
                    <li class="nav-item"><a href="?controller=librarian&action=addPage"
                                            class="nav-link icon d-flex align-items-center"><i
                                    class="ion-ios-person-add"></i>&nbsp;&nbsp;เพิ่มบรรณารักษ์</a>
                    </li>
                    <li class="nav-item"><a href="?controller=pages&action=logout"
                                            class="nav-link icon d-flex align-items-center"><i
                                    class="ion-ios-log-out"></i>&nbsp;&nbsp;ลงชื่อออก</a>
                    </li>
                    <?php
                }
                ?>
                <!--                <li class="nav-item"><a href="#" class="nav-link icon d-flex align-items-center"><i class="ion-logo-facebook"></i></a></li>-->
                <!--                <li class="nav-item"><a href="#" class="nav-link icon d-flex align-items-center"><i class="ion-logo-twitter"></i></a></li>-->
                <!--                <li class="nav-item"><a href="#" class="nav-link icon d-flex align-items-center"><i class="ion-logo-instagram"></i></a></li>-->
            </ul>
        </div>
    </div>
</nav>
<?php
if (!isset($_SESSION['user'])) {
    ?>
    <style>
        /* Bordered form */
        form {
            border: 3px solid #f1f1f1;
        }

        /* Full-width inputs */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        /* Add a hover effect for buttons */
        button:hover {
            opacity: 0.8;
        }

        /* Extra style for the cancel button (red) */
        .cancelbtn {
            float: right;
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        /* Center the avatar image inside this container */
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        /* Avatar image */
        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        /* Add padding to containers */
        .container {
            padding: 16px;
        }

        /* The "Forgot password" text */
        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0, 0, 0); /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
            padding-top: 60px;
        }

        /* Modal Content/Box */
        .modal-content {
            background-color: #fefefe;
            margin: 5px auto; /* 15% from the top and centered */
            border: 1px solid #888;
            width: 80%; /* Could be more or less, depending on screen size */
        }

        /* The Close Button */
        .close {
            /* Position it in the top right corner outside of the modal */
            position: absolute;
            right: 25px;
            top: 0;
            color: #000;
            font-size: 35px;
            font-weight: bold;
        }

        /* Close button on hover */
        .close:hover,
        .close:focus {
            color: red;
            cursor: pointer;
        }

        /* Add Zoom Animation */
        .animate {
            -webkit-animation: animatezoom 0.6s;
            animation: animatezoom 0.6s
        }

        @-webkit-keyframes animatezoom {
            from {
                -webkit-transform: scale(0)
            }
            to {
                -webkit-transform: scale(1)
            }
        }

        @keyframes animatezoom {
            from {
                transform: scale(0)
            }
            to {
                transform: scale(1)
            }
        }
    </style>
    <!-- The Modal -->
    <div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
        class="close" title="Close Modal">&times;</span>

        <!-- Modal Content -->
        <form class="modal-content animate" method="post">
            <input type="hidden" name="controller" value="pages" id="controller">
            <input type="hidden" name="action" value="login" id="action">
            <div class="container">
                <label for="uname"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="uname" required>

                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>

                <button type="submit">Login</button>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">
                    Cancel
                </button>
            </div>
        </form>
    </div>
    <script>
        // Get the modal
        var modal = document.getElementById('id01');

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
    <?php
}
?>