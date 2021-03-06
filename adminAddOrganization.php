<!DOCTYPE php>
 <?php
 /*
    Page for admins to add a new organization
    */
// Start the session
session_start();
include_once 'connection.php'; 
//Ensures the user is an admin
if($_SESSION['member_status'] != 'admin'){
    header("Location: index.php");
    die();
    }
    $flag = FALSE;
    //Checks to see if an organization has been posted to edit
    if(isset($_POST["organizationedit"])){
        $OrganizationID = $_POST["organizationrow"];
        $flag = TRUE;

    }
    //If so, retrieve that organization
        if($flag==TRUE){
            $sql = "SELECT * FROM `Organization` WHERE `OrganizationID` = $OrganizationID";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result -> fetch_assoc();
            $organization = $row["OrganizationName"];
            $address = $row["StreetNameNumber"];
            $city = $row["City"];
            $province = $row["Province"];
            $country = $row["Country"];
            $postalCode = $row["ZipPostalCode"];
            $organizationType = $row["OrganizationType"];

            
        }
?>
<html>
  <head>
    <title>Queen's Public Health Sciences Web Application</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/dropdownValues.js"></script>
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/adminDashboard.css" type="text/css" rel="stylesheet">
    <img src="Assets/banner.jpg" id="header">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <ul id="navbar">
       <li><a href="<?php if($_SESSION["mph"]== true){ echo 'MPHAdminDashboard.php';} else{ echo 'MSCAdminDashboard.php';} ?>" >Back</a></li>
        <li style="float:right"><a class="active" href="https://login.queensu.ca/idp/logout.jsp">Logout</a></li>
        <li style="float:right"><a class="active" href="savedViews.php">Saved Views</a></li>
      </ul>
    <br><br>
    <h2 class="bannerTextPosition bannerFont"> Public Health Sciences <br> Web Application </h2>
    <center> <h1 class="headerFont">Create/Edit Organization</h1> </center>

  </head>

<body>
    <div class="profile">
    <form method="post">
        <input type='hidden' name="organizationnumdelete" value="<?php echo $OrganizationID; ?>">
        <input type='hidden' name="flaginput" value="<?php if($flag==TRUE){ echo 'true';} else{ echo 'false';}?>">
        <input class='btn btn-danger btn-md' name="delete" type="submit" value="Delete Organization" onClick="return confirm('Are you sure?')">  
 <br><br>
        </form>
	<form method="post">
	<fieldset>
		<legend> Organization Info</legend>
		Organization Name: <input type="text" name="organization" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $organization; ?>" required> <br>
        <br>
		Address: <input type="text" name="address" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $address; ?>" > <br><br>
		City: <input type="text" name="city" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)"  value="<?php echo $city; ?>" > <br><br>
		Province: <input type="text" name="province" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $province; ?>" > <br><br>
		Country: <input type="text" name="country" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $country; ?>" > <br><br>
		Postal Code: <input type="text"  pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" name="postalCode" value="<?php echo $postalCode; ?>" > <br><br>
        Organization Type: <input type="text" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" name="organizationtype" value="<?php echo $organizationType; ?>"> <br><br>
        <input type='hidden' name="flaginput" value="<?php if($flag==TRUE){ echo 'true';} else{ echo 'false';}?>">
         <input type='hidden' name="OrganizationID" value="<?php echo $OrganizationID; ?>">
	</fieldset>
	<button class="btn btn-primary btn-md buttonColor" type="submit" name="submit" Visibility="visible" id="submit" method="post">Submit</button><br><br>
</form>
</div>
</body>
<?php
	if(isset($_POST["submit"])){
        //Retrieve all data and insert it into the DB
        $OrganizationID = $_POST["OrganizationID"];   
        $flag = $_POST["flaginput"];
        $organization = $_POST["organization"];
        $address = $_POST["address"];
        $city = $_POST["city"];
        $province = $_POST["province"];
        $country = $_POST["country"];
        $postalCode = $_POST["postalCode"];
        $organizationType = $_POST["organizationtype"];
         if ($flag=="true"){
            $sql = "UPDATE `Organization` SET `OrganizationName`='$organization', `StreetNameNumber`='$address', `City`='$city', `Province`= '$province', `Country`='$country',`ZipPostalCode`='$postalCode',`OrganizationType`='$organizationType' WHERE `OrganizationID`= $OrganizationID";
        if($stmt = $con->prepare($sql)){
        $stmt->execute();
        }
        else{
            echo "<script> alert('Error Updating Organization'); </script>";
        }
            if($_SESSION["mph"] == true ){
            header("Location: MPHAdminDashboard.php");  
         }
         else{
             header("Location: MSCAdminDashboard.php");  
         }
         }    
 else{
        $sql = "INSERT INTO `Organization`(`OrganizationName`,`StreetNameNumber`, `City`, `Province`, `Country`, `ZipPostalCode`, `OrganizationType`) 
        VALUES ('$organization', '$address', '$city', '$province', '$country', '$postalCode' , '$organizationType')";
        if($stmt = $con->prepare($sql)){
        $stmt->execute();
        }
        else{
            echo "<script> alert('Error Adding Organization'); </script>";
        }
        if($_SESSION["mph"] == true ){
            header("Location: MPHAdminDashboard.php");  
         }
         else{
             header("Location: MSCAdminDashboard.php");  
         }
 }
	}
//Delete the organization
       if(isset($_POST["delete"])){
        $OrganizationID = $_POST["organizationnumdelete"];
        $flag = $_POST["flaginput"];
        if($flag=="true"){
        $sql = "DELETE FROM `Organization` WHERE OrganizationID = $OrganizationID";
        $stmt = $con->prepare($sql);
         $stmt->execute();
         if($_SESSION["mph"] == true ){
            header("Location: MPHAdminDashboard.php");  
         }
         else{
             header("Location: MSCAdminDashboard.php");  
         }
        }
        

       }

?>
</body>
</html>