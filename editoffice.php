<?php

include 'restrict.php';

if(isset($_SESSION['login_ho']))
	{
		include 'connection.php';
		$ui=mysqli_real_escape_string($conn,$_SESSION['login_ho']);
	}

	$result = mysqli_query($conn," SELECT * 
  FROM office  
  WHERE uid= '$ui'");
	
	$row=mysqli_fetch_assoc($result);


	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$sign="BR";

	include 'unique.php';
	$uid=$_SESSION['login_ho'];
	$area=$_POST['area'];
	$addr=$_POST['addr'];
	$size=$_POST['size'];
	$method=$_POST['method'];
	$price=$_POST['price'];
    $furnished=$_POST['furnished'];
    $room=$_POST['room'];


$sql="UPDATE office
SET area='$area',addr='$addr',size='$size',furnish='$furnished',roomno='$room',pricing='$method',price='$price'
WHERE uid='$uid'";

//$sql="INSERT INTO board(area,addr,size,pricing,pid,price,uid) VALUES('$area','$addr','$size','$method','$postid','$price','$uid')";
//$sqql="INSERT INTO apartment(Bedroom_no,Bathroom_no,Dining_no,Garage_facility,Lift_facility,Apart_no,House_no) VALUES('$Bedroom_no','$Bathroom_no','$Bathroom_no','$Garage_facility','$Lift_facility','$Apartment_number','$House_no')";
//$sqqql="INSERT INTO roommate(Post_id,Fare_per_seat,number_of_vacant_seat,Total_members,Maid_availability,User_id,Apart_no) VALUES('$postid','$Fare','$seatno','$tmem','$Availability','$UserId','$Apartment_number')";


if((!mysqli_query($conn,$sql)))//&(!mysqli_query($conn,$sqql))&(!mysqli_query($conn,$sqqql)))
		{
			echo "<script type='text/javascript'>alert('Posting Failed ! ')</script>";
			echo "<script language='javascript' type='text/javascript'> location.href='boardrm.php' </script>";
		}
		else
		{
			echo "<script type='text/javascript'>alert('Updation Completed ! ')</script>";
			echo "<script language='javascript' type='text/javascript'> location.href='boardrm.php' </script>";
		}
include 'insert_brimage.php';


}

 ?>
 

<html>
<head>
	<meta charset="utf-8" />
	<title>Office Room Post </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="blurBg-false" style="background-color:#EBEBEB">

<link rel="stylesheet" type="text/css" href="style/style.css"/>
<div id="header"> 
                <div id="logo"> 
                    <div id="logo_text"> 
                        <h1><a href="index.php">Online Space <span class="logo_colour">Rental</span></a></h1> 
                        <h2>Find Your Office & Shop Space Online</h2> 
                    </div>                     
                </div>                 
                <div id="menubar"> 
                    <ul id="menu"> 
                        <li class="selected">
                            <a href="index.php">Home</a>
                        </li>                         
                        <li>
                            <a href="login.php">Login</a>
                        </li>                         
                        <li>
                            <a href="">Find Office Space </a>
                        </li>                         
                        <li>
                            <a href="">Find Shop Space</a>
                        </li>                         
                    </ul>                     
                </div>                 
</div> 

<br><br><br>
<!-- Start Formoid form-->
<link rel="stylesheet" href="office_files/formoid1/formoid-solid-light-green.css" type="text/css" />
<!-- <script type="text/javascript" src="office_files/formoid1/jquery.min.js"></script> -->
<form enctype="multipart/form-data" class="formoid-solid-light-green" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post"><div class="title"><h2>Board Room Post</h2></div>
	<div class="element-select" title="Select Area"><label class="title"><span class="required">*</span></label><div class="item-cont"><div class="large"><span><select name="area" >

		<option value="" ><?php echo $row['area'] ?></option>
		<option value="Dohar">Dohar</option>
		<option value="Keraniganj">Keraniganj</option>
		<option value="Dhamrai">Dhamrai</option>
		<option value="Nawabganj">Nawabganj</option>
		<option value="Savar">Savar</option>
		<option value="Ramna">Ramna</option>
		<option value="Pallabi">Pallabi</option>
		<option value="Mirpur">Mirpur</option>
		<option value="Demra">Demra</option>
		<option value="Uttara">Uttara</option>
		<option value="Khilgaon">Khilgaon</option>
		<option value="Tejgaon">Tejgaon</option>
		<option value="Jatrabari">Jatrabari</option>
		<option value="Rampura">Rampura</option>
		<option value="Sherebangla Nagar">Sherebangla Nagar</option>
		<option value="Shahjanpur">Shahjanpur</option></select><i></i><span class="icon-place"></span></span></div></div></div>
	<div class="element-textarea" title="Address"><label class="title"><span class="required">*</span></label><div class="item-cont"><textarea class="small" name="addr" cols="20" rows="5" required="required" placeholder="Address"><?php echo $row['addr'] ?></textarea><span class="icon-place"></span></div></div>
	<div class="element-input" title="Space Size"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="number" name="size" required="required" placeholder="Space Size" value="<?php echo $row['size'] ?>"/><span class="icon-place"></span></div></div>
	<div class="element-radio" title="Pricing Method"><label class="title">Pricing Method   <span class="required">*</span></label>		<div class="column column3"><label><input type="radio" name="method" value="Full Time" required="required"/><span>Full Time</span></label></div><span class="clearfix"></span>
		<div class="column column3"><label><input type="radio" name="method" value="Part Time" required="required"/><span>Part Time</span></label></div><span class="clearfix"></span>
		<div class="column column3"><label><input type="radio" name="method" value="Pay as you Go" required="required"/><span>Pay as you Go</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-number" title="Room Number"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="number" min="0" max="10" name="room" required="required" placeholder="Room Number" value="<?php echo $row['roomno'] ?>"/><span class="icon-place"></span></div></div>
	<div class="element-radio" title="Furnished ? "><label class="title">Furnished ? <span class="required">*</span></label>		<div class="column column1"><label><input type="radio" name="furnished" value="Furnished" required="required"/><span>Furnished</span></label><label><input type="radio" name="furnished" value="Non-Furnished" required="required"/><span>Non-Furnished</span></label></div><span class="clearfix"></span>
</div>
	<div class="element-number" title="Price /Rent"><label class="title"><span class="required">*</span></label><div class="item-cont"><input class="large" type="number" min="0" max="1000000" name="price" required="required" placeholder="Price/Rent" value="<?php echo $row['price'] ?>"/><span class="icon-place"></span></div></div>
	<div class="element-file" title="Image"><label class="title"><span class="required">*</span></label><div class="item-cont"><label class="large" ><div class="button">Choose Image</div><input type="file" class="file_input" name="file[]"  multiple /><div class="file_text">No file selected</div><span class="icon-place"></span></label></div></div>
<div class="submit"><input type="submit" value="Submit"/></div></form><p class="frmd"><a href="http://formoid.com/v29.php">contact us form</a> Formoid.com 2.9</p><script type="text/javascript" src="office_files/formoid1/formoid-solid-light-green.js"></script>
<!-- Stop Formoid form-->

<br><br><br><br>
<div class="pg-empty-placeholder" style="width: 30%; float: right; height: 200px; background-color: #b7b1b1;"> 
            <h2 style="text-align: center;"><u>Contact Us</u></h2> 
            <p align="center"><b>Email</b></p> 
            <p align="center">cinmoy98@gmail.com</p> 
            <p align="center"><b>Phone</b></p> 
            <p align="center">01727239595</p> 
        </div>         
        <div class="pg-empty-placeholder" style="width: 30%; float: right; height: 200px; background-color: #b7b1b1;"> 
            <h2 style="text-align: center;"><u>Follow</u></h2> 
            <p><br></p> 
            <a href='http://www.facebook.com' style='text-decoration:none'><p align="center"><b>Facebook</b></p> </a>
            <a href='http://www.twitter.com' style='text-decoration:none'><p align="center"><b>Twitter</b></p> </a>
            <a href='http://www.instagram.com' style='text-decoration:none'><p align="center"><b>Instagram</b></p> </a>
        </div>         
        <div style="width: 40%; float: right; height: 200px; background-color: #b7b1b1;"> 
            <h2 style="text-align: center;"><u>Links</u></h2> 
            <a href='office_posts.php' style='text-decoration:none'><p align="center">Office By Area</p> </a>
            <a href='boardrm_posts.php' style='text-decoration:none'><p align="center">Boardroom</p></a> 
            <a href='interview_posts.php' style='text-decoration:none'><p align="center">Interview room</p></a> 
            <p align="center">Copyright @ 1604092,1604097</p> 
        </div>

</body>
</html>

