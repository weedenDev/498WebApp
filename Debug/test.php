<!-- Begin PHP Section -->

<!-- <?php

$host = "10.20.49.11:3306";
$db_name = "phs";
$username = "phs"; 
$password = "FWG1udZN3zVS";
try {
  $con = new mysqli($host,$username,$password, $db_name);
}
catch(Exception $exception){
    echo "Connection error: " . $exception->getMessage();
}
 
// show error
if(!$con){
    die('Connect Error: ' . $mysqli->connect_error);
}

if (isset($_POST'searchbutton')){
  $searchCriteria = $_POST['searchbar']; //get search bar content
  $options = $_POST['options']; //See which dropdown is selected
  $showOrganizationTable = False;
  $showPracticumTable = False;
}

if($options == 'ProjectTitle' || $options == 'Role'){
  $showPracticumTable= True;  
}
if ($options == 'OrganizationName'){
  $showOrganizationTable = True;
  if(empty($searchCriteria)){
    // Empty search criteria, show everything
    $query = "SELECT * FROM Organization";
  }
  else{
    $query = "SELECT * FROM Organization WHERE $options = '$searchCriteria'"
  }

  $stmt = $con->prepare($query);
  $stmt->execute();
  $results = $stmt->get_result();
  /*
  echo "<table class = 'table'>";
          echo "<thead>";
          echo "<tr>";
     $h = 0; 
      while($h < $i){
        echo "<th>". $options[$h] . "</th>";
        $h = $h + 1;
      }
      echo "</tr>";
  
    $t = 0;
    while(($row = $result->fetch_assoc())){
        $t = 0;
          //echo $i;
          echo "<tr>";
          while($t < $i){
                    echo " <td>" . $row[$options[$t]] . "</td>";
                    $t = $t +1;
        }
        echo "</tr>";
      }
        echo "</table>";
        }
}*/
?>



 -->