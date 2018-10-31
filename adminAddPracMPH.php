<!DOCTYPE php>
 <?php
 /*
    Page for admins to create or edit a practicum for MPH students
    */
// Start the session
session_start();
include_once 'connection.php'; 
//Ensure the user is admin
if($_SESSION['member_status'] != 'admin'){
    header("Location: index.php");
    die();
    }
    $flag = FALSE;
    //Check if we are editing a practicum rather than creating one
    if(isset($_POST["practicumedit"])){
        $StudentID = $_POST["practicumrow"];
        $flag = TRUE;

    }
    //Load the data if we are editing 
        if($flag==TRUE){
            $sql = "SELECT * FROM `Practicum` WHERE `StudentID` = $StudentID";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result -> fetch_assoc();
            $projectTitle = $row["ProjectTitle"];
            $paid = $row["Paid"];
            $OrganizationID = $row["OrganizationID"];
            $Description = $row["Description"];
            $preceptorName = $row["PreceptorName"];
            $contact = $row["Contact"];
            $DominantCompetencyCategory = $row["DominantCompetencyCategory"];
            $appliedArea1 = $row["AppliedProgramArea1"];
            $appliedArea2 = $row["AppliedProgramArea2"];
            $appliedArea3 = $row["AppliedProgramArea3"];
            $population = $row["Population"];
            $task1 = $row["Task1"];
            $task2 = $row["Task2"];
            $task3 = $row["Task3"];
            $role = $row["Role"];
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
    <center> <h1 class="headerFont">Create/Edit MPH Practicum</h1> </center>

  </head>

<body>
<div class="profile">
<br><br>
<form method="post">
        <input type='hidden' name="studentnumdelete" value="<?php echo $StudentID; ?>">
        <input type='hidden' name="flaginput" value="<?php if($flag==TRUE){ echo 'true';} else{ echo 'false';}?>">
        <input class='btn btn-danger btn-md' name="delete" type="submit" value="Delete Practicum" onClick="return confirm('Are you sure?')">  
 <br><br>
        </form>
<form method="post">
<fieldset>
	<legend> Practicum</legend>
	<label > StudentID </label> <input type="number" min="0" pattern="[0-9 ]+" title="Only Numbers" name="StudentNum" value="<?php echo $StudentID; ?>" required> <br><br>
	<label > Project Title </label> <input type="text" name="projectTitle" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $projectTitle; ?>" required> <br><br>
	<label > Organization </label> 
    <select name="OrganizationID" required>
        <?php
            $sql = "SELECT `OrganizationName`, `OrganizationID` FROM `Organization` WHERE 1";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while($row = $result->fetch_assoc()){
                if($flag == True){
                    if($OrganizationID == $row['OrganizationID']){
                        echo " <option value = ". $row['OrganizationID'] . " selected>" . $row['OrganizationName'] . "</option>" ; 
                    }
                    else {
                    echo " <option value = ". $row['OrganizationID'] . ">" . $row['OrganizationName'] . "</option>" ; 
                    }
                }
                else{
                   echo " <option value = ". $row['OrganizationID'] . ">" . $row['OrganizationName'] . "</option>" ;  
                }
            }
        ?>
    </select> <br><br>
	<label > Paid: </label>  <input type="radio" name="paid" value="Paid" <?php if($paid=='Paid'){ echo 'checked';} ?>> Yes <input type="radio" name="paid" value="Unpaid" <?php if($paid!='Paid'){ echo 'checked';} ?>> No <br> <br>	
	<label > Preceptor Name </label>  <input type="text" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" name="preceptorName" value="<?php echo $preceptorName; ?>" > <br><br>
	<label > Contact </label>  <input type="text" name="contact" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $contact; ?>" ><br><br>
	<label > Dominant Competency Category </label>  <input type="text" name="DominantCompetencyCategory" pattern="[^'\x22>< ]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $DominantCompetencyCategory; ?>"> <br><br>
	<label > Applied Area 1 </label>  <input type="text" name="appliedArea1" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $appliedArea1; ?>"> <br><br>
	<label > Applied Area 2 </label>  <input type="text" name="appliedArea2" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $appliedArea2; ?>"> <br><br>
	<label > Applied Area 3 </label>  <input type="text" name="appliedArea3" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $appliedArea3; ?>"> <br><br>
	<label > Population </label>  <input type="text" name="population" pattern="[^'\x22><]+" title="No Special Characters" value="<?php echo $population; ?>"> <br><br>
	<label > Task 1 </label>  <input type="text" name="task1" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $task1; ?>"> <br><br>
	<label > Task 2 </label>  <input type="text" name="task2" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $task2; ?>"> <br><br>
	<label > Task 3 </label>  <input type="text" name="task3" pattern="[^'\x22><] +" title="No Special Characters (Quotes or Angle Brackets)" value="<?php echo $task3; ?>"> <br><br>
	<label > Role </label> <input type="text" name="role" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)"value="<?php echo $role; ?>"> <br><br>
    <label > Description </label>  <br> <textarea name="Description" rows="10" cols="100"><?php echo $Description; ?> </textarea> <br> <br>
    <input type='hidden' name="flaginput" value="<?php if($flag==TRUE){ echo 'true';} else{ echo 'false';}?>">
</fieldset>
<button class="btn btn-primary btn-md buttonColor" type="submit" name="submit" Visibility="visible" id="submit" method="post">Submit</button><br><br>
</form>
</div>
<?php
    //Validate inputs
function verify_input($data, $con){
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($con, $data);
  return $data;  
}

//Check for form submission
	if(isset($_POST["submit"])){

        $projectTitle = $_POST["projectTitle"];
        $paid = $_POST["paid"];
        $flag = $_POST["flaginput"];
        $OrganizationID = $_POST["OrganizationID"];
        $Description = $_POST["Description"];
        $Description = verify_input($Description, $con);
        $preceptorName = $_POST["preceptorName"];
        $contact = $_POST["contact"];
        $StudentNum = $_POST["StudentNum"];
        $DominantCompetencyCategory = $_POST["DominantCompetencyCategory"];
        $appliedArea1 = $_POST["appliedArea1"];
        $appliedArea2 = $_POST["appliedArea2"];
        $appliedArea3 = $_POST["appliedArea3"];
        $population = $_POST["population"];
        $task1 = $_POST["task1"];
        $task2 = $_POST["task2"];
        $task3 = $_POST["task3"];
        $role = $_POST["role"];
        //Update an already exisiting practicum
        if ($flag=="true"){
            $sql = "UPDATE `Practicum` SET `ProjectTitle`='$projectTitle', `OrganizationID`=$OrganizationID, `Paid`='$paid', `Description`= '$Description', `PreceptorName`='$preceptorName',`Contact`='$contact', `DominantCompetencyCategory`='$DominantCompetencyCategory', `AppliedProgramArea1`='$appliedArea1', `AppliedProgramArea2`='$appliedArea2', `AppliedProgramArea3`= '$appliedArea3', `Population`='$population', `Task1`='$task1', `Task2`='$task2', `Task3`= '$task3', `Role` = '$role' WHERE `StudentID`= $StudentNum";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            if($_SESSION["mph"] == true ){
            header("Location: MPHAdminDashboard.php");  
         }
         else{
             header("Location: MSCAdminDashboard.php");  
         }
         }   
else{
        //Insert a new practicum
   		$sql = "INSERT INTO `Practicum`(`ProjectTitle`, `OrganizationID`, `Paid`, `Description`, `PreceptorName`, `Contact`, `StudentID`, `DominantCompetencyCategory`, `AppliedProgramArea1`, `AppliedProgramArea2`, `AppliedProgramArea3`, `Population`, `Task1`, `Task2`, `Task3`, `Role`) 
   		VALUES ('$projectTitle', '$OrganizationID', '$paid', '$Description', '$preceptorName', '$contact' , $StudentNum, '$DominantCompetencyCategory', '$appliedArea1', '$appliedArea2', '$appliedArea3', '$population', '$task1', '$task2', '$task3', '$role')";
                if($stmt = $con->prepare($sql)){
                $stmt->execute();
                }
                else{
                    echo "<script> alert('No Student Matches that StudentID'); </script>";
                }
        if($_SESSION["mph"] == true ){
            header("Location: MPHAdminDashboard.php");  
         }
         else{
             header("Location: MSCAdminDashboard.php");  
         }
}
	}
    //Deleting a practicum
       if(isset($_POST["delete"])){
        $StudentID = $_POST["studentnumdelete"];
        $flag = $_POST["flaginput"];
        if($flag=="true"){
        $sql = "DELETE FROM `Practicum` WHERE StudentID = $StudentID";
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