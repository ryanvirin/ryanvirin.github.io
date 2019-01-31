<?php
//fetch.php
$connect = mysqli_connect("localhost", "root", "", "test_db");
$output = '';
if(isset($_POST["query"]))
{
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
  SELECT * FROM users 
  WHERE fname LIKE '%".$search."%'
  OR lname LIKE '%".$search."%' 
  OR age LIKE '%".$search."%'
 ";
}
else
{
    $query = "
  SELECT * FROM users ORDER BY id
 ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
    $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>fname</th>
     <th>lname</th>
     <th>age</th>
    </tr>
 ';
    while($row = mysqli_fetch_array($result))
    {
        $output .= '
   <tr>
    <td>'.$row["fname"].'</td>
    <td>'.$row["lname"].'</td>
    <td>'.$row["age"].'</td>
   </tr>
  ';
    }
    echo $output;
}
else
{
    echo 'Data Not Found';
}
