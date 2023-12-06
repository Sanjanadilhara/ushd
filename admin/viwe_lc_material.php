<?php
session_start();
include("connection.php");
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$_SESSION['cid'] = $id;
}


$cid = $_SESSION['cid'];

$result = mysqli_query($conn, "SELECT * FROM material WHERE cid='$cid'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <title>Enter Course Details</title>
	<link rel="stylesheet" href="icon/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="main-ind.css">
</head>

<body>
	<div class="top-bar">
	<img class="panel-icon" src="picon.png" onclick="openPanel()"><div class="logo">USHD</div><div class="logout" onclick="logout()"><label class="lg-text">logout</label><i class="pdl flr fa fa-sign-out" aria-hidden="true"></i></div>
	</div>
	<div class="panel" id="panel">
	<br>
	<br>
	<div class="item sfont" onclick="setPage(0)" id="item1"><i class="flt fa fa-tachometer" aria-hidden="true"></i>dashboard</div>
	<div class="item sfont" onclick="setPage(1)" id="item2"><i class="flt fa fa-user" aria-hidden="true"></i>teacher</div>
	<div class="item sfont" onclick="setPage(2)" id="item3"><i class="flt fa fa-user" aria-hidden="true"></i>Student</div>
	<div class="item sfont" onclick="setPage(3)" id="item4"><i class="flt fa fa-sticky-note" aria-hidden="true"></i>notice</div>
	<div class="item hide sfont" onclick="setPage(4)" id="item5"><i class="flt fa fa-comments" aria-hidden="true"></i>form</div>
	<div class="item sfont" onclick="setPage(5)" id="item6"><i class="flt fa fa-sitemap" aria-hidden="true"></i>course<i class="flr fa fa-caret-down" aria-hidden="true"></i></div>
	<div class="drop-item sd-active sfont" onclick="setPage(9)" id="item7" >view lecture material</div>
	<div class="drop-item sfont" onclick="setPage(10)" id="item8" >add lecture material</div>
	<div class="drop-item sfont" onclick="setPage(11)" id="item9" >manage lecture material</div>
	<div class="item sfont" onclick="setPage(12)" id="item10"><i class="flt fa fa-sitemap" aria-hidden="true"></i>result<i class="flr fa fa-caret-down" aria-hidden="true"></i></div>
	<div class="drop-item sfont" onclick="setPage(13)" id="item11" >view result</div>
	<div class="drop-item sfont" onclick="setPage(14)" id="item12" >add result</div>
	<div class="drop-item sfont" onclick="setPage(15)" id="item13" >manage result</div>
	<div class="item sfont" onclick="setPage(16)" id="item14">activity log</div>
	<div class="item sfont" onclick="setPage(17)" id="item15">user log</div>
	</div>

		
		
		
            <!--nav bar-->
			<div class="cont" id="cont">




                <div class="container">

                <div class="row">
                    <div class="col text-white" id="adclr">

                        <h3 class="text-center">Viwe lecture Material</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="container mt-4 ">
                        <div class="row">

                            <?php

                            if (mysqli_num_rows($result) > 0) {
                                $i = 0;
                                while ($row = mysqli_fetch_array($result)) {
                            ?>

                                    <div class="container mt-2 p-sm-4 col-9">
                                        <div class="card  col-sm-12 mt-2">
                                            <h5 class="card-header"><?php echo $row["title"]; ?></h5>
                                            <div class="card-body">
                                                <h5 class="card-title"><?php echo $row["linktitle"]; ?></h5>
                                                <p class="card-text"><a href="<?php echo $row["link"]; ?>" target="_blank"><?php echo $row["link"]; ?></a></p>
                                                <?php 
                                                if(empty($row['mname'])){

                                                }else{
                                                    ?><p class="card-text">Read contand</p>
                                                <a href="upload/<?php echo $row['mname'] ?>" class="btn btn-primary" target="_blank">Read</a>

                                               <?php }
                                                ?>                                                
                                                
                                            </div>
                                        </div>
                                    </div>

                                <?php
                                    $i++;
                                }
                                ?>
                            <?php
                            } else {
                                echo "No result found";
                            }



                            ?>
                        </div>
                    </div>


                </div>
                </div>
				</div>

	<script src="main-ind.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>

</html>