<?php
//  database connection
$servername = "localhost";
$username = "komal";
$password = "komal";
$dbname = "stDatabase";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// take student data
$sql = "SELECT * FROM students";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Student Information</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <!--start of navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.html">STUDENT RECORD</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>
	  <div class="collapse navbar-collapse" id="navbarNav">
	    <ul class="navbar-nav ml-auto">
	      <li class="nav-item">
	        <a class="nav-link" href="addinfo.php">Add Information</a>
	      </li>
	      <li class="nav-item">
	        <a class="nav-link" href="viewinfo.php">View Information</a>
	      </li>
	    </ul>
	  </div>
	</nav>
    <!--form container retrieved from DB-->
    <div class="container">
        <h1>View Student Information</h1>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Name</th>
                <th>Gender</th>
                <th>GPA</th>
                <th>Program</th>
            </tr>
            <?php
            // create a row with data from DB
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["student_id"] . "</td>";
                echo "<td>" . $row["name"] . "</td>";
                echo "<td>" . $row["gender"] . "</td>";
                echo "<td>" . $row["gpa"] . "</td>";
                echo "<td>" . $row["program"] . "</td>";
                echo "</tr>";
            }

            // close
            mysqli_free_result($result);
            mysqli_close($conn);
            ?>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>