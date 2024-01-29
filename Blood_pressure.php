<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blood Pressure Tracker</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
  <style>
    body {
      background-color: #148f77;
    }
    .container {
      margin-top: 50px;
    }
    .card {
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
    .output {
      margin-top: 20px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
    }
    .output p {
      margin: 0;
      padding: 5px 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <h2 class="mb-4">Blood Pressure Tracker</h2>
      <form>
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="date" class="form-label">Date:</label>
            <input type="date" class="form-control" id="date">
          </div>
          <div class="col-md-6">
            <label for="time" class="form-label">Time:</label>
            <input type="time" class="form-control" id="time">
          </div>
        </div>
        <div class="mb-3">
          <label for="systolic" class="form-label">Systolic Pressure (mmHg):</label>
          <input type="number" class="form-control" id="systolic">
        </div>
        <div class="mb-3">
          <label for="diastolic" class="form-label">Diastolic Pressure (mmHg):</label>
          <input type="number" class="form-control" id="diastolic">
        </div>
        <div class="mb-3">
          <label for="heartRate" class="form-label">Heart Rate (bpm):</label>
          <input type="number" class="form-control" id="heartRate">
        </div>
        <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>
      </form>
    </div>
    <div class="output" id="output"></div>
  </div>
  <form class="login-form">
    <label for="" onclick="window.location.href='signup.html'"></label>
  </form>
  <script>
    document.getElementById("submitBtn").addEventListener("click", function() {
      const date = document.getElementById("date").value;
      const time = document.getElementById("time").value;
      const systolic = document.getElementById("systolic").value;
      const diastolic = document.getElementById("diastolic").value;
      const heartRate = document.getElementById("heartRate").value;
    // Check if the entered values are valid numbers
    if (isNaN(systolic) || isNaN(diastolic) || isNaN(heartRate)) {
      alert("Please enter valid numeric values.");
      return;
    }

    // Calculate the average of systolic and diastolic pressure
    const averagePressure = (systolic + diastolic) / 2;

  
      const output = document.getElementById("output");
      output.innerHTML += `<p>Date: ${date}</p>`;
      output.innerHTML += `<p>Time: ${time}</p>`;
      output.innerHTML += `<p>Systolic Pressure: ${systolic} mmHg</p>`;
      output.innerHTML += `<p>Diastolic Pressure: ${diastolic} mmHg</p>`;
      output.innerHTML += `<p>Heart Rate: ${heartRate} bpm</p>`;
      output.innerHTML += `<p>Average Pressure: ${averagePressure.toFixed(2)} mmHg</p>`; // Display average with two decimal places
        output.innerHTML += "<hr>";
  
      // Clear input fields
      document.getElementById("date").value = "";
      document.getElementById("time").value = "";
      document.getElementById("systolic").value = "";
      document.getElementById("diastolic").value = "";
      document.getElementById("heartRate").value = "";
    });
  </script>
  
</body>
</html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood_pressure_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data
$sqlInsert = "INSERT INTO pressure_records (date, time, systolic, diastolic, heart_rate)
              VALUES ('2024-01-18', '12:30:00', 120, 80, 70)";
if ($conn->query($sqlInsert) === TRUE) {
    echo "New record inserted successfully.<br>";
} else {
    echo "Error: " . $sqlInsert . "<br>" . $conn->error;
}

// Retrieve data
$sqlSelect = "SELECT * FROM pressure_records";
$result = $conn->query($sqlSelect);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"] . " - Date: " . $row["date"] . " - Time: " . $row["time"] . "<br>";
    }
} else {
    echo "0 results.<br>";
}

// Update data
$sqlUpdate = "UPDATE pressure_records
              SET systolic = 130, diastolic = 85
              WHERE id = 1";
if ($conn->query($sqlUpdate) === TRUE) {
    echo "Record updated successfully.<br>";
} else {
    echo "Error updating record: " . $conn->error . "<br>";
}

// Delete data
$sqlDelete = "DELETE FROM pressure_records WHERE id = 1";
if ($conn->query($sqlDelete) === TRUE) {
    echo "Record deleted successfully.<br>";
} else {
    echo "Error deleting record: " . $conn->error . "<br>";
}

// Close connection
$conn->close();
?>
