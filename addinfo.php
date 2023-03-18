<?php
//  database info
$servername = "localhost";
$username = "komal";
$password = "komal";
$dbname = "stDatabase";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check the connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // form data
    $student_id = $_POST["student_id"];
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $gpa = $_POST["gpa"];
    $program = $_POST["program"];

    // sql
    $stmt = $conn->prepare("INSERT INTO students (student_id, name, gender, gpa, program) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $student_id, $name, $gender, $gpa, $program);

    // execution
    if ($stmt->execute()) {
        header("Location: viewinfo.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    // close
    $stmt->close();
    $conn->close();
}
?>

<!--start of the page-->
<!DOCTYPE html>
<html>
<head>
    <title>Add Student Information</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <!--nav-->
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
    <!--form container-->
    <div class="container">
        <h1>Add Student Information</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="student_id">Student ID:</label>
            <input type="text" name="student_id" required><br>
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>
            <label for="gender">Gender:</label><br>
            <input type="radio" name="gender" value="male" checked> Male<br>
            <input type="radio" name="gender" value="female"> Female<br>
            <input type="radio" name="gender" value="other"> Other<br>
            <label for="gpa">GPA:</label>
            <input type="number" step="0.01" name="gpa" min="0" max="10" required><br>
            <label for="program">Program:</label>
            <select name="program">
                <option value="PROGRAMING">PROGRAMING</option>
                <option value="BUSINESS">BUSINESS</option>
                <option value="NETWORKING">NETWORKING</option>
                <option value="HR MANAGEMENT">HR MANAGEMENT</option>
            </select><br>
            <input type="submit" value="Add Student">
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>