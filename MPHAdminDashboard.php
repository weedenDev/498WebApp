<!DOCTYPE php>
<?php
/*
The main page for MPH admins, they can search through the database or navigate to other pages.
*/
// Start the session
session_start();
include_once 'connection.php'; 
//Ensure user is admin
if($_SESSION["member_status"] != "admin"){
    header("Location: index.php");
    die();
}
        //   ini_set('display_errors', 1);
        //     ini_set('display_startup_errors', 1);
        //     error_reporting(E_ALL);
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
    <link href="css/global.css" type="text/css" rel="stylesheet">
    <link href="css/adminDashboard.css" type="text/css" rel="stylesheet">
    <img src="Assets/banner.jpg" id="header">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
      <ul id="navbar">
      <li><a href="index.php">Home</a></li>
      <li> <a>Add Profile</a>
        <ul>
            <a href="adminCreateStudent.php">Student</a>
            <a href="addAdmin.php">Administrator</a>
            <a href="adminAddOrganization.php">Organization</a>
            <a href="adminAddPracMPH.php">Practicum</a>
        </ul>
        </li>
        <li style="float:right"><a class="active" href="https://login.queensu.ca/idp/logout.jsp">Logout</a></li>
        <li style="float:right"><a class="active" href="savedViews.php">Saved Views</a></li>
      </ul>
    <br><br>
    <h2 class="bannerTextPosition bannerFont"> Public Health Sciences <br> Web Application </h2>
    <center> <h1 class="headerFont">MPH Admin Dashboard</h1> </center>
  </head>

  <body>

      <center>
      <!-- This is the form for the general search. It contains one dropbox and a text input -->
      <form  id="regularField" name='search'  method='post'><br><br>
            <h4 class="headerfont boldFont">General Search</h4>
	            <select name="options" id="options"> 
                    <optgroup label="Student">
                    <option value="StudentID" <?php if ($_POST['options']=='StudentID') {echo "selected='selected'"; } ?> >Student #</option>
                    <option value="FName" <?php if ($_POST['options']=='FName') {echo "selected='selected'"; } ?> >First Name</option>
                    <option value="LName"<?php if ($_POST['options']=='LName') {echo "selected='selected'"; } ?> >Last Name</option>
                    <option value="GraduatingYear" <?php if ($_POST['options']=='GraduatingYear') {echo "selected='selected'"; } ?> >Graduating Year</option>
                    <option value="CurrentEmployer" <?php if ($_POST['options']=='CurrentEmployer') {echo "selected='selected'"; } ?> >Current Employer</option>
                    <option value="QueensEmail" <?php if ($_POST['options']=='QueensEmail') {echo "selected='selected'"; } ?> >Queen's Email</option>
                    </optgroup>
                    <optgroup label="Organization">
                    <option value="OrganizationName" <?php if ($_POST['options']=='OrganizationName') {echo "selected='selected'"; } ?> >Organization Name</option>
                    <option value="Province" <?php if ($_POST['options']=='Province') {echo "selected='selected'"; } ?> >Province</option>
                    <option value="City" <?php if ($_POST['options']=='City') {echo "selected='selected'"; } ?> >City</option>
                    <option value="StreetNameNumber" <?php if ($_POST['options']=='StreetNameNumber') {echo "selected='selected'"; } ?> >Address</option> 
                    </optgroup>
                    <optgroup label="Practicum">  
                    <option value="ProjectTitle" <?php if ($_POST['options']=='ProjectTitle') {echo "selected='selected'"; } ?> >Practicum Title</option>
                    <option value="PreceptorName" <?php if ($_POST['options']=='PreceptorName') {echo "selected='selected'"; } ?> >Preceptor Name</option>
                    <option value="Task"  <?php if ($_POST['options']=='Task') {echo "selected='selected'"; } ?> >Task</option>
                    <option value="DominantCompetencyCategory"  <?php if ($_POST['options']=='DominantCompetencyCategory') {echo "selected='selected'"; } ?> >Dominant Competency</option>
                    <option value="Population"  <?php if ($_POST['options']=='Population') {echo "selected='selected'"; } ?> >Population</option>
                    <option value="AppliedProgramArea" <?php if ($_POST['options']=='AppliedProgramArea') {echo "selected='selected'"; } ?> >Applied Program Area</option>                    </optgroup>
                </select>
            <input type="text" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" name="searchbar" id="searchbar" size="80" value="<?php echo isset($_POST['searchbar']) ? $_POST['searchbar'] : '' ?>" height="60"></input><br><br>
            <button class="btn btn-primary btn-md buttonColor" type="submit" name="searchbutton" Visibility="visible" id="searchbutton" method="post">Search</button><br><br>
        </form><br>
<!-- End of general search form -->


<btn type="button" name="advancedSearch" id="advancedSearch" data-toggle="collapse" data-target="#advancedDiv">Advanced Search</btn><br><br>

<div class="collapse advancedborder" id="advancedDiv" >
<!-- Form for advanced search, contains 4 dropboxes and text inputs -->
<form id="advancedField" name='advancedField' method='post'>
<br><br>
  <select name="select1" id = "select1">
                    <optgroup label="Student" class="Student">
                    <option value="StudentID" class="StudentID" <?php if ($_POST['select1']=='StudentID') {echo "selected='selected'"; } ?> >Student #</option>
                    <option value="FName" class="FName" <?php if ($_POST['select1']=='FName') {echo "selected='selected'"; } ?> >First Name</option>
                    <option value="LName" class="LName" <?php if ($_POST['select1']=='LName') {echo "selected='selected'"; } ?> >Last Name</option>
                    <option value="GraduatingYear" class="GraduatingYear" <?php if ($_POST['select1']=='GraduatingYear') {echo "selected='selected'"; } ?> >Graduating Year</option>
                    <option value="CurrentEmployer" class="CurrentEmployer" <?php if ($_POST['select1']=='CurrentEmployer') {echo "selected='selected'"; } ?> >Current Employer</option>
                    <option value="QueensEmail" class="QueensEmail" <?php if ($_POST['select1']=='QueensEmail') {echo "selected='selected'"; } ?> >Queen's Email</option>
                    </optgroup>
                    <optgroup label="Organization" class ="Organization">
                    <option value="OrganizationName" class="OrganizationName" <?php if ($_POST['select1']=='OrganizationName') {echo "selected='selected'"; } ?> >Organization Name</option>
                    <option value="Province" class="Province" <?php if ($_POST['select1']=='Province') {echo "selected='selected'"; } ?> >Province</option>
                    <option value="City" class="City" <?php if ($_POST['select1']=='City') {echo "selected='selected'"; } ?> >City</option>
                    <option value="StreetNameNumber" class="StreetNameNumber" <?php if ($_POST['select1']=='StreetNameNumber') {echo "selected='selected'"; } ?> >Address</option> 
                    </optgroup>
                    <optgroup label="Practicum">  
                    <option value="ProjectTitle" class="ProjectTitle" <?php if ($_POST['select1']=='ProjectTitle') {echo "selected='selected'"; } ?> >Practicum Title</option>
                    <option value="PreceptorName" class="PreceptorName" <?php if ($_POST['select1']=='PreceptorName') {echo "selected='selected'"; } ?> >Preceptor Name</option>
                    <option value="Task" class="Task" <?php if ($_POST['select1']=='Task') {echo "selected='selected'"; } ?> >Task</option>
                    <option value="DominantCompetencyCategory" class="DominantCompetencyCategory" <?php if ($_POST['select1']=='DominantCompetencyCategory') {echo "selected='selected'"; } ?> >Dominant Competency</option>
                    <option value="Population" class="Population" <?php if ($_POST['select1']=='Population') {echo "selected='selected'"; } ?> >Population</option>
                    <option value="AppliedProgramArea" class="AppliedProgramArea" <?php if ($_POST['select1']=='AppliedProgramArea') {echo "selected='selected'"; } ?> >Applied Program Area</option>

  </select>
  <input type="text" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" name="searchbar1" id="searchbar1" size="80" height="60"></input> <br><br><br>

  <select id = "select2" name="select2" >
  <option value="blank" ></option>
                    <optgroup label="Student" class="Student">
                    <option value="StudentID" class="StudentID" <?php if ($_POST['select2']=='StudentID') {echo "selected='selected'"; } ?> >Student #</option>
                    <option value="FName" class="FName" <?php if ($_POST['select2']=='FName') {echo "selected='selected'"; } ?> >First Name</option>
                    <option value="LName" class="LName" <?php if ($_POST['select2']=='LName') {echo "selected='selected'"; } ?> >Last Name</option>
                    <option value="GraduatingYear" class="GraduatingYear" <?php if ($_POST['select2']=='GraduatingYear') {echo "selected='selected'"; } ?> >Graduating Year</option>
                    <option value="CurrentEmployer" class="CurrentEmployer" <?php if ($_POST['select2']=='CurrentEmployer') {echo "selected='selected'"; } ?> >Current Employer</option>
                    <option value="QueensEmail" class="QueensEmail" <?php if ($_POST['select2']=='QueensEmail') {echo "selected='selected'"; } ?> >Queen's Email</option>
                    </optgroup>
                    <optgroup label="Organization" class ="Organization">
                    <option value="OrganizationName" class="OrganizationName" <?php if ($_POST['select2']=='OrganizationName') {echo "selected='selected'"; } ?> >Organization Name</option>
                    <option value="Province" class="Province" <?php if ($_POST['select2']=='Province') {echo "selected='selected'"; } ?> >Province</option>
                    <option value="City" class="City" <?php if ($_POST['select2']=='City') {echo "selected='selected'"; } ?> >City</option>
                    <option value="StreetNameNumber" class="StreetNameNumber" <?php if ($_POST['select2']=='StreetNameNumber') {echo "selected='selected'"; } ?> >Address</option> 
                    </optgroup>
                    <optgroup label="Practicum">  
                    <option value="ProjectTitle" class="ProjectTitle" <?php if ($_POST['select2']=='ProjectTitle') {echo "selected='selected'"; } ?> >Practicum Title</option>
                    <option value="PreceptorName" class="PreceptorName" <?php if ($_POST['select2']=='PreceptorName') {echo "selected='selected'"; } ?> >Preceptor Name</option>
                    <option value="Task" class="Task" <?php if ($_POST['select2']=='Task') {echo "selected='selected'"; } ?> >Task</option>
                    <option value="DominantCompetencyCategory" class="DominantCompetencyCategory" <?php if ($_POST['select2']=='DominantCompetencyCategory') {echo "selected='selected'"; } ?> >Dominant Competency</option>
                    <option value="Population" class="Population" <?php if ($_POST['select2']=='Population') {echo "selected='selected'"; } ?> >Population</option>
                    <option value="AppliedProgramArea" class="AppliedProgramArea" <?php if ($_POST['select2']=='AppliedProgramArea') {echo "selected='selected'"; } ?> >Applied Program Area</option> 
                     </select>
  <input type="text" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" name="searchbar2" id="searchbar1" size="80" height="60"></input> <br><br><br>

  <select id = "select3" name="select3" >
  <option value="blank"></option>
                    <optgroup label="Student" class="Student">
                    <option value="StudentID" class="StudentID" <?php if ($_POST['select3']=='StudentID') {echo "selected='selected'"; } ?> >Student #</option>
                    <option value="FName" class="FName" <?php if ($_POST['select3']=='FName') {echo "selected='selected'"; } ?> >First Name</option>
                    <option value="LName" class="LName" <?php if ($_POST['select3']=='LName') {echo "selected='selected'"; } ?> >Last Name</option>
                    <option value="GraduatingYear" class="GraduatingYear" <?php if ($_POST['select3']=='GraduatingYear') {echo "selected='selected'"; } ?> >Graduating Year</option>
                    <option value="CurrentEmployer" class="CurrentEmployer" <?php if ($_POST['select3']=='CurrentEmployer') {echo "selected='selected'"; } ?> >Current Employer</option>
                    <option value="QueensEmail" class="QueensEmail" <?php if ($_POST['select3']=='QueensEmail') {echo "selected='selected'"; } ?> >Queen's Email</option>
                    </optgroup>
                    <optgroup label="Organization" class ="Organization">
                    <option value="OrganizationName" class="OrganizationName" <?php if ($_POST['select3']=='OrganizationName') {echo "selected='selected'"; } ?> >Organization Name</option>
                    <option value="Province" class="Province" <?php if ($_POST['select3']=='Province') {echo "selected='selected'"; } ?> >Province</option>
                    <option value="City" class="City" <?php if ($_POST['select3']=='City') {echo "selected='selected'"; } ?> >City</option>
                    <option value="StreetNameNumber" class="StreetNameNumber" <?php if ($_POST['select3']=='StreetNameNumber') {echo "selected='selected'"; } ?> >Address</option> 
                    </optgroup>
                    <optgroup label="Practicum">  
                    <option value="ProjectTitle" class="ProjectTitle" <?php if ($_POST['select3']=='ProjectTitle') {echo "selected='selected'"; } ?> >Practicum Title</option>
                    <option value="PreceptorName" class="PreceptorName" <?php if ($_POST['select3']=='PreceptorName') {echo "selected='selected'"; } ?> >Preceptor Name</option>
                    <option value="Task" class="Task" <?php if ($_POST['select3']=='Task') {echo "selected='selected'"; } ?> >Task</option>
                    <option value="DominantCompetencyCategory" class="DominantCompetencyCategory" <?php if ($_POST['select3']=='DominantCompetencyCategory') {echo "selected='selected'"; } ?> >Dominant Competency</option>
                    <option value="Population" class="Population" <?php if ($_POST['select3']=='Population') {echo "selected='selected'"; } ?> >Population</option>
                    <option value="AppliedProgramArea" class="AppliedProgramArea" <?php if ($_POST['select3']=='AppliedProgramArea') {echo "selected='selected'"; } ?> >Applied Program Area</option>
                      </select>
  <input type="text" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" name="searchbar3" id="searchbar1" size="80" height="60"></input> <br><br><br>

  <select id = "select4" name="select4">
  <option value="blank"></option>
                    <optgroup label="Student" class="Student">
                    <option value="StudentID" class="StudentID" <?php if ($_POST['select4']=='StudentID') {echo "selected='selected'"; } ?> >Student #</option>
                    <option value="FName" class="FName" <?php if ($_POST['select4']=='FName') {echo "selected='selected'"; } ?> >First Name</option>
                    <option value="LName" class="LName" <?php if ($_POST['select4']=='LName') {echo "selected='selected'"; } ?> >Last Name</option>
                    <option value="GraduatingYear" class="GraduatingYear" <?php if ($_POST['select4']=='GraduatingYear') {echo "selected='selected'"; } ?> >Graduating Year</option>
                    <option value="CurrentEmployer" class="CurrentEmployer" <?php if ($_POST['select4']=='CurrentEmployer') {echo "selected='selected'"; } ?> >Current Employer</option>
                    <option value="QueensEmail" class="QueensEmail" <?php if ($_POST['select4']=='QueensEmail') {echo "selected='selected'"; } ?> >Queen's Email</option>
                    </optgroup>
                    <optgroup label="Organization" class ="Organization">
                    <option value="OrganizationName" class="OrganizationName" <?php if ($_POST['select4']=='OrganizationName') {echo "selected='selected'"; } ?> >Organization Name</option>
                    <option value="Province" class="Province" <?php if ($_POST['select4']=='Province') {echo "selected='selected'"; } ?> >Province</option>
                    <option value="City" class="City" <?php if ($_POST['select4']=='City') {echo "selected='selected'"; } ?> >City</option>
                    <option value="StreetNameNumber" class="StreetNameNumber" <?php if ($_POST['select4']=='StreetNameNumber') {echo "selected='selected'"; } ?> >Address</option> 
                    </optgroup>
                    <optgroup label="Practicum">  
                    <option value="ProjectTitle" class="ProjectTitle" <?php if ($_POST['select4']=='ProjectTitle') {echo "selected='selected'"; } ?> >Practicum Title</option>
                    <option value="PreceptorName" class="PreceptorName" <?php if ($_POST['select4']=='PreceptorName') {echo "selected='selected'"; } ?> >Preceptor Name</option>
                    <option value="Task" class="Task" <?php if ($_POST['select4']=='Task') {echo "selected='selected'"; } ?> >Task</option>
                    <option value="DominantCompetencyCategory" class="DominantCompetencyCategory" <?php if ($_POST['select4']=='DominantCompetencyCategory') {echo "selected='selected'"; } ?> >Dominant Competency</option>
                    <option value="Population" class="Population" <?php if ($_POST['select4']=='Population') {echo "selected='selected'"; } ?> >Population</option>
                    <option value="AppliedProgramArea" class="AppliedProgramArea" <?php if ($_POST['select4']=='AppliedProgramArea') {echo "selected='selected'"; } ?> >Applied Program Area</option>
                      </select>
  <input type="text" pattern="[^'\x22><]+" title="No Special Characters (Quotes or Angle Brackets)" name="searchbar4" id="searchbar1" size="80" height="60"></input> <br><br><br>
 	 <button type="submit" class='btn btn-primary btn-md buttonColor' name ="advancedSearchButton" id ="advancedSearchButton" method ="post">Search</button><br><br>
</form>     
<!--End of advanced Search -->
        </div>
        </center><br><br><br> 


</body>

<script>
//Shows the advanced search box
    function showAdvanced(){
        if(document.getElementById("advancedDiv").className == "hideElement"){
            document.getElementById("advancedDiv").className = "showElement advancedborder";
        }
        else{
            document.getElementById("advancedDiv").className = "hideElement";
        }
    }

</script>
</html>

<?php

function verify_input($data, $con){
 $data = trim($data);
 $data = stripslashes($data);
 $data = htmlspecialchars($data);
  $data = mysqli_real_escape_string($con, $data);
  return $data;  
}
//check if the search form is submitted
if(isset($_POST['searchbutton'])){
	$searchCriteria = $_POST['searchbar']; //get search bar content
	$options = $_POST['options']; //See which dropdown is selected
    $searchCriteria = verify_input($searchCriteria, $con);
	$showStudentTable = False;
	$showOrganizationTable = False;
	$showPracticumTable = False;

    //If it's an option from the student table 
    if ($options == "StudentID" || $options == "GraduatingYear" || $options == "FName" || $options == "LName" || $options == "CurrentEmployer" || $options == "QueensEmail")
    {
        
    	$showStudentTable = True;
    	if(empty($searchCriteria)){
    		$query = "SELECT * FROM Student WHERE Program = 'MPH'";
    	}
    	else{
    		$query = "SELECT * FROM Student WHERE Program = 'MPH' AND $options LIKE '%$searchCriteria%'";
    	}
    }

    //If it's an option from the organization table 
     if ($options == "OrganizationName" || $options == "StreetNameNumber" || $options == "Province" || $options == "City")
    {
    	$showOrganizationTable = True;
    	if(empty($searchCriteria)){
    		$query = "SELECT * FROM Organization";
    	}
    	else{
    		$query = "SELECT * FROM Organization WHERE $options LIKE '%$searchCriteria%'";
    	}
    }

        //If it's an option from the practicum table 

     if ($options == "ProjectTitle" || $options == "Task"|| $options =="PreceptorName" || $options =="DominantCompetencyCategory" || $options =="Population" || $options == "AppliedProgramArea")
    {
    	$showPracticumTable = True;
    	if(empty($searchCriteria)){
    		$query = "SELECT * FROM Practicum LEFT JOIN Student ON Practicum.StudentID = Student.StudentID";
    	}
    	else{
            //Each practicum has 3 tasks, this code retrieves all 3
            if($options == "Task"){
                $query = "SELECT * FROM Practicum LEFT JOIN Student ON Practicum.StudentID = Student.StudentID WHERE (Task1 LIKE '%$searchCriteria%' OR Task2 LIKE '%$searchCriteria%' OR Task3 LIKE '%$searchCriteria%') ";
            }
            //Each practicum has 3 programs, this code retrieves all 3
            elseif($options == "AppliedProgramArea"){
                 $query = "SELECT * FROM Practicum LEFT JOIN Student ON Practicum.StudentID = Student.StudentID WHERE (AppliedProgramArea1 LIKE '%$searchCriteria%' OR AppliedProgramArea2 LIKE '%$searchCriteria%' OR AppliedProgramArea3 LIKE '%$searchCriteria%') ";
            }
            else {
    		$query = "SELECT * FROM Practicum LEFT JOIN Student ON Practicum.StudentID = Student.StudentID WHERE $options LIKE '%$searchCriteria%'";
            }
    	}
    }

	$stmt = $con->prepare($query);
         
       $stmt->execute();
        // results 
        $result = $stmt->get_result();
        
        //Display the student table 
        if($showStudentTable == True){
            echo "<div class='scroll ' >";
 		    echo "<table class = 'table table-hover table-bordered' id='studenttable' >";
        	echo "<thead>";
        	echo " <tr> <th> Student # </th> <th> First Name </th> <th> Last Name </th> <th> Graduating Year </th> <th> Current Employer </th> <th> Job Title </th> <th> Queen's Email </th> <th> Alternate Email </th> <th> Comments </th> <th> Edit Row </th> </tr> </thead>";
            echo "<tbody>";
        	 while($row = $result->fetch_assoc()){
                    echo "<tr > <td id='".$row['StudentID']."' >" . $row['StudentID'] . "</td> <td> " .  $row['FName'] . "</td> <td> " . $row['LName'] .  " </td> <td> " . $row['GraduatingYear'] . "</td> <td> " .  $row['CurrentEmployer'] .  "</td>  <td> " . $row['CurrentJobTitle'] .  "</td> <td> " . $row['QueensEmail']  .  "</td> <td> " . $row['OtherEmail'] .   "</td> <td> " .  $row['OpenComments'] . "</td> <td> <form method='post' action='adminCreateStudent.php'> <input type='hidden' name='studentrow' value=".$row['StudentID']."> <button type='submit' name='studentedit'>  Edit " . "</button></form></td> </tr>"; 
    		}
    		echo "</tbody> </table>";
            echo "</div>";

		}

		////Display the organization table
		if($showOrganizationTable == True){
            echo "<div class='scroll' >";
    		echo "<table class = 'table table-hover table-bordered'  id='organizationtable'>";
        	echo "<thead>";
        	echo " <tr> <th> OrganizationID </th> <th> Organization Name </th> <th> Organization Type </th> <th> Organization Address</th> <th> City </th> <th> Province </th> <th> Country </th> <th> Zip/Postal Code </th> <th> Edit Row </th> </tr> </thead>";
        	echo "<tbody>";
             while($row = $result->fetch_assoc()){
                    echo " <tr> <td>" . $row['OrganizationID'] . "</td> <td> " . $row['OrganizationName'] . "</td> <td> " . $row['OrganizationType'] . "</td> <td> " . $row['StreetNameNumber'] . " </td> <td> " . $row['City'] . "</td> <td> " . $row['Province'] .  "</td>  <td> " . $row['Country'] . "</td> <td> " . $row['ZipPostalCode'] . "</td> <td>   <form method='post' action='adminAddOrganization.php'> <input type='hidden' name='organizationrow' value=".$row['OrganizationID']."> <button type='submit' name='organizationedit'>  Edit " . "</button></form></td> </tr>"; 
    		}
    		echo "</tbody> </table>";   
            echo "</div>";

		}

		////Display the practicum table
		if($showPracticumTable == True){
            echo "<div class='scroll' >";
    		echo "<table class = 'table table-hover table-bordered' id = 'practicumtable' >";
        	echo "<thead>";
        	echo " <tr> <th> Practicum Title </th> <th style='min-width:100px'> Student # </th> <th style='min-width:150px'> Student Name </th> <th> Paid/Unpaid </th> <th style='min-width:150px'> Preceptor Name </th> <th> Contact </th> <th style='min-width:250px'> Description</th> <th style='min-width:200px'> Dominant Competency </th> <th> Populations </th>  <th style='min-width:200px'> Applied Program Area 1</th> <th style='min-width:200px'> Applied Program Area 2</th> <th style='min-width:200px'> Applied Program Area 3</th> <th style='min-width:200px'> Task 1</th> <th style='min-width:200px'> Task 2 </th> <th style='min-width:200px'> Task 3 </th> <th style='min-width:200px'> Role </th> <th style='min-width:100px'> Edit Row </th> </tr> </thead>";
        	echo "<tbody>";
             while($row = $result->fetch_assoc()){
                    echo " <tr> <td style='min-width:150px'>" . $row['ProjectTitle'] . "</td> <td > " . $row['StudentID'] . "</td> <td> " . $row['FName'] . ' ' . $row['LName'] . "</td> <td> " . $row['Paid'] . "</td> <td> " . $row['PreceptorName'] . " </td> <td> " . $row['Contact'] . " </td> <td> " . $row['Description'] . "</td>  <td> " . $row['DominantCompetencyCategory'] . "</td> <td> " . $row['Population'] . " </td> <td> " . $row['AppliedProgramArea1'] .  "</td>  <td> " . $row['AppliedProgramArea2'] .  "</td>  <td> " . $row['AppliedProgramArea3'] .  "</td>  <td> " . $row['Task1'] . "</td>  <td> " . $row['Task2'] .  "</td>  <td> "    . $row['Task3'] . "</td>  <td> " . $row['Role'] . "</td> <td>  <form method='post' action='adminAddPracMPH.php'> <input type='hidden' name='practicumrow' value=".$row['StudentID']."> <button type='submit' name='practicumedit'>  Edit " . "</button></form></td> </tr>"; 
    		}
    		echo "</tbody> </table>";  
            echo "</div>";  
                 

		}
	}


    	/*
		THIS IS THE PHP FOR THE ADVANCED SEARCH
		*/
if(isset($_POST['advancedSearchButton'])){


    $joinStudentTable = False;
	$joinOrganizationTable = False;
	$joinPracticumTable = False;
    $searchCriteria = array();


    $searchCriteria[0] = $_POST['searchbar1']; //get search bar content
    $searchCriteria[0] = verify_input($searchCriteria[0], $con);
    $searchCriteria[1] = $_POST['searchbar2']; //get search bar content
    $searchCriteria[1] = verify_input($searchCriteria[1], $con);
    $searchCriteria[2] = $_POST['searchbar3']; //get search bar content
    $searchCriteria[2] = verify_input($searchCriteria[2], $con);
    $searchCriteria[3] = $_POST['searchbar4']; //get search bar content
    $searchCriteria[3] = verify_input($searchCriteria[3], $con);
    $options = array();
    $options[0] = $_POST['select1'];
    $options[1] = $_POST['select2'];
    $options[2] = $_POST['select3'];
    $options[3] = $_POST['select4'];
    // build the select part of the query
    $i=0;

    //Look for a Student Column, if there are none then we know we are linking organization and practicum
    while($options[$i] != "blank" && $i < 4){
       if ($options[$i] == "StudentID" || $options[$i] == "GraduatingYear" || $options[$i] == "FName" || $options[$i] == "LName" || $options[$i] == "CurrentJobTitle" || $options[$i] == "CurrentEmployer" || $options[$i] == "QueensEmail")
    {
    	$joinStudentTable = True;
    }
     if ($options[$i] == "ProjectTitle" || $options[$i] == "Task"|| $options[$i] =="PreceptorName" || $options[$i] =="DominantCompetencyCategory" || $options[$i] =="Population" || $options[$i] == "AppliedProgramArea")
    {
    	$joinPracticumTable = True;
    }
        if ($options[$i] == "OrganizationID" || $options[$i] == "OrganizationName" || $options[$i] == "City" || $options[$i] == "Province" || $options[$i] == "StreetNameNumber")
    {
    	$joinOrganizationTable = True;
    }
     $i = $i+1;
    }

    $j = 0;
    $temp = 0;

/*
    The following lines build the query for the advanced search. Based on the options and search critera entered, it will join the 
    necessary tables. 
*/
    if($joinStudentTable == True){

    if($options[$j]=="StudentID"){
    	$query = "SELECT Student.";
        $checked = true;
    }
    else {
        $query = "SELECT ";
        $checked = false;
    }
    	$extendedquery = "";
    	while ($j < $i){
            if(($options[$j]== "Task" && $taskinquery == true) || ($options[$j] == "AppliedProgramArea" && $appliedinquery == true)){
                $j = $j+1;
            }
            else{           
            if($options[$j]=="StudentID" && $checked == false){
                $query .= " Student.";
                $query .= $options[$j];
                $query .= ", ";
            }
            else{
                if($options[$j] == "Task"){
                    $query .= "Task1, Task2, Task3";
                    $query .= ", ";
                    $taskinquery = true;
                }
                elseif($options[$j] == "AppliedProgramArea" ){
                    $query .= "AppliedProgramArea1, AppliedProgramArea2, AppliedProgramArea3";
                    $query .= ", ";
                    $appliedinquery = true;
                }
                else{                
                    $query .= $options[$j];
                    $query .= ", ";
                }
            }
    		if(!empty($searchCriteria[$j])){
    			if($temp == 0){
    				$extendedquery .= " WHERE Program = 'MPH' AND";
    				$temp = 1;
    			}
    			if($options[$j]=="StudentID"){
    				$extendedquery .= " Student.";
    				$extendedquery .= $options[$j];
    				$extendedquery .= " LIKE" . "'%$searchCriteria[$j]%'";
    				$extendedquery .= " AND";
    			}
    			else{
                    if($options[$j] == "Task"){                                   
                        $extendedquery .= "  (Task1 LIKE '%$searchCriteria[$j]%' OR Task2 LIKE '%$searchCriteria[$j]%' OR Task3 LIKE '%$searchCriteria[$j]%')";
                        
                    }
                    elseif($options[$j] == "AppliedProgramArea"){         
                        $extendedquery .= "   (AppliedProgramArea1 LIKE '%$searchCriteria[$j]%' OR AppliedProgramArea2 LIKE '%$searchCriteria[$j]%' OR AppliedProgramArea3 LIKE '%$searchCriteria[$j]%') ";
                    }
                    else {
    				    $extendedquery .= " " . $options[$j] . " LIKE " . "'%$searchCriteria[$j]%'";
                    }
    				$extendedquery .= " AND";
    			}
    		}
            else {
                if($temp == 0){
               $extendedquery .= " WHERE Program = 'MPH' AND"; 
               $temp = 1;
                }
            }
            $checked = false;
    		$j = $j+1;
        }

    }
    $query = substr($query, 0, -2);
    $extendedquery = substr($extendedquery, 0, -4);
    if($joinOrganizationTable == True){
        $query .= " FROM Student LEFT JOIN Practicum ON Student.StudentID=Practicum.StudentID LEFT JOIN Organization ON Practicum.OrganizationID = Organization.OrganizationID"; 
    }
    elseif($joinPracticumTable == True){
    $query .= " FROM Student LEFT JOIN Practicum ON Student.StudentID=Practicum.StudentID"; 
    }
    else{
        $query.= " FROM Student";
    }
    $query .= $extendedquery;

    }
    elseif($joinPracticumTable == True){
        if($options[$j] == "StudentID" || $options[$j] == "OrganizationID" ){
    	$query = "SELECT Practicum.";
        }
        else {
            $query = "SELECT ";
        }
    	$extendedquery = "";
    	while ($j < $i){ 
             if(($options[$j]== "Task" && $taskinquery == true) || ($options[$j] == "AppliedProgramArea" && $appliedinquery == true)){
                $j = $j+1;
            }
            else{                      
            if($options[$j] == "StudentID" || $options[$j] == "OrganizationID" ){
                $query .= " Practicum.";
                $query .= $options[$j];
                $query .= ", ";
            }
            else{
                if($options[$j] == "Task"){
                    $query .= "Task1, Task2, Task3";
                    $query .= ", ";
                    $taskinquery = true;
                }
                elseif($options[$j] == "AppliedProgramArea" ){
                    $query .= "AppliedProgramArea1, AppliedProgramArea2, AppliedProgramArea3";
                    $query .= ", ";
                    $appliedinquery = true;
                }
                else{
    		        $query .= $options[$j];
    		        $query .= ", ";
                }
            }
    		if(!empty($searchCriteria[$j])){
    			if($temp == 0){
    				$extendedquery .= " WHERE";
    				$temp = 1;
    			}
    			if($options[$j]=="OrganizationID"){
    				$extendedquery .= " Organization.";
    				$extendedquery .= $options[$j];
    				$extendedquery .= " LIKE " . "%'$searchCriteria[$j]%'";
    				$extendedquery .= " AND";
    			}
    			else{
                    if($options[$j] == "Task"){                                   
                        $extendedquery .= "  (Task1 LIKE '%$searchCriteria[$j]%' OR Task2 LIKE '%$searchCriteria[$j]%' OR Task3 LIKE '%$searchCriteria[$j]%')";
                    }
                    elseif($options[$j] == "AppliedProgramArea"){         
                        $extendedquery .= "   (AppliedProgramArea1 LIKE '%$searchCriteria[$j]%' OR AppliedProgramArea2 LIKE '%$searchCriteria[$j]%' OR AppliedProgramArea3 LIKE '%$searchCriteria[$j]%') ";
                    }
                    else {
    				    $extendedquery .= " " . $options[$j] . " LIKE " . "'%$searchCriteria[$j]%'";
                    }
    				$extendedquery .= " AND";
    			}
    		}
    		$j = $j+1;

    }
        }
    $query = substr($query, 0, -2);
    $extendedquery = substr($extendedquery, 0, -4);
    if($joinOrganizationTable == True){
    $query .= " FROM Practicum LEFT JOIN Organization ON Organization.OrganizationID=Practicum.OrganizationID"; 
    }
        else{
        $query.= " FROM Practicum";
    }
    $query .= $extendedquery;
    }

    elseif($joinOrganizationTable == True){
        if($options[$j]=="OrganizationID"){
            $query = "SELECT Organization.";
        }
        else {
            $query = "SELECT ";
        }
            $extendedquery = "";
            while ($j < $i){
             if(($options[$j]== "Task" && $taskinquery == true) || ($options[$j] == "AppliedProgramArea" && $appliedinquery == true)){
                $j = $j+1;
            }
            else{  
                if($options[$j] == "Task"){
                    $query .= "Task1, Task2, Task3";
                    $query .= ", ";
                    $taskinquery = true;
                }
                elseif($options[$j] == "AppliedProgramArea" ){
                    $query .= "AppliedProgramArea1, AppliedProgramArea2, AppliedProgramArea3";
                    $query .= ", ";
                    $appliedinquery = true;
                }
                else{              
                 $query .= $options[$j];
                 $query .= ", ";
                }
                
                if(!empty($searchCriteria[$j])){
                    if($temp == 0){
                        $extendedquery .= " WHERE";
                        $temp = 1;
                    }

                    if($options[$j] == "Task"){                                   
                        $extendedquery .= "  (Task1 LIKE '%$searchCriteria[$j]%' OR Task2 LIKE '%$searchCriteria[$j]%' OR Task3 LIKE '%$searchCriteria[$j]%')";
                    }
                    elseif($options[$j] == "AppliedProgramArea"){         
                        $extendedquery .= "   (AppliedProgramArea1 LIKE '%$searchCriteria[$j]%' OR AppliedProgramArea2 LIKE '%$searchCriteria[$j]%' OR AppliedProgramArea3 LIKE '%$searchCriteria[$j]%') ";
                    }
                    else {
    				    $extendedquery .= " " . $options[$j] . " LIKE " . "'%$searchCriteria[$j]%'";
                    }
                    $extendedquery .= " AND";
                }
                $j = $j+1;

        }
            }
    $query = substr($query, 0, -2);
    $extendedquery = substr($extendedquery, 0, -4);
    $query.= " FROM Organization";
    $query .= $extendedquery;
    }
	$stmt = $con->prepare($query);
    $stmt->execute();
    $result = $stmt->get_result();

    //Show the advanced search table 
        		echo "<table class = 'table table-hover table-bordered' id='advancedtable'>";
        	echo "<thead>";
        	echo "<tr>";
     $h = 0; 
         $columncount = 0;
     	while($h < $i){
            if($options[$h] == "Task" && $tasksCreated != True){
                $tasksCreated = True;
                echo "<th> Task 1 </th> <th> Task 2 </th> <th> Task 3 </th>";
                 $columncount = $columncount + 3;
            }
            elseif($options[$h] == "AppliedProgramArea" && $appliedCreated !=True){
                $appliedCreated = True;
                $columncount = $columncount + 3;
                 echo "<th> Applied Program Area 1 </th> <th> Applied Program Area 2 </th> <th> Applied Program Area 3 </th>";
            }
            elseif ($options[$h] != "Task" && $options[$h] != "AppliedProgramArea"){
     		echo "<th>". $options[$h] . "</th>";
              $columncount = $columncount + 1;
            }
     		$h = $h + 1;
     	}
     	echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
  
    $t = 0;
    $s = 0;
//Enter the results into the table
    while(($row = $result->fetch_assoc())){
    		$t = 0;
            $tasksrowCreated = False;
            $appliedrowCreated = False;
    			echo "<tr>";
    			while($t < $i){
                    if($options[$t] == "Task" && $tasksrowCreated != True){
                        echo " <td >" . $row["Task1"] . "</td> <td >" . $row["Task2"] . "</td> <td >" . $row["Task3"] . "</td>";
                        $tasksrowCreated = True; 

                    }
                    elseif($options[$t] == "AppliedProgramArea" && $appliedrowCreated!= True){
                        $appliedrowCreated = True;
                         echo " <td >" . $row["AppliedProgramArea1"] . "</td> <td >" . $row["AppliedProgramArea2"] . "</td> <td >" . $row["AppliedProgramArea3"] . "</td>"; 
                    }
                    elseif ($options[$t] != "Task" && $options[$t] != "AppliedProgramArea"){
                    echo " <td >" . $row[$options[$t]] . "</td>"; 
                    }
                    $t = $t +1;
    		}
            $s = $s +1;
    		echo "</tr>";
    	}
            echo "</tbody>";
    		echo "</table>";
            //Add the button to save the view
            echo "<form  id='viewform' name='search'  method='post' action='newView.php'>";
            echo "<center> <button class='btn btn-primary btn-md buttonColor' type='submit' name='saveview'  id='saveview'  method='post'>Save as View</button><br><br> </center>";
            echo "</form>";
            //This information is used on the new view page.
            $_SESSION['viewquery'] = $query;
            $_SESSION['columncount'] = $columncount;
            

        

    }
    ?>