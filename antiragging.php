<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    
</head>
<body>
      <div class="alert alert-success" role="alert">Your Data Saved Succesfully!!</div>
</body>
</html>
<?php
      if($_SERVER["REQUEST_METHOD"] == "POST")
      {
            $name = $_POST["user"];
            $email = $_POST["email"];
            $rollno = $_POST["rollno"];
            $grievances = $_REQUEST["textarea"];

      }else{
            echo "Can't Fill Your Data";}

            $conn = mysqli_connect("localhost","root","","greivance");
            if( !$conn ){
                  die("connection failed". mysqli_connect_error());
            }
            
            
        $SQL = "INSERT INTO complaint( name ,email, rollno, grievance) VALUES ('$name','$email', $rollno, '$grievances')";
      if(mysqli_query($conn, $SQL)){
            echo "";
      }else{
            echo "error". mysqli_error($conn );
      }
?>