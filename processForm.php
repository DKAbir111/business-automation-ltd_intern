<?php
$servername = "localhost";
$username = "";
$password = "";
$dbname = "car_inventory";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $carType = $_POST["car_type"];
    $name = $_POST["name"];
    $model = $_POST["model"];
    $year = $_POST["year"];
    $batteryCapacity = $_POST["battery_capacity"];
    $fuelEfficiency = $_POST["fuel_efficiency"];

    if ($carType == "Electric") {
        $car = new ElectricCar($name, $model, $year, $batteryCapacity);
    } elseif ($carType == "Gas") {
        $car = new GasCar($name, $model, $year, $fuelEfficiency);
    }

    // Insert data into the corresponding table
    $car->insertIntoDatabase($conn);

    // Redirect to index.html after processing the form
    header("Location: index.html");
    exit();
}

$conn->close();

class Car {
    protected $name;
    protected $model;
    protected $year;

    public function __construct($name, $model, $year) {
        $this->name = $name;
        $this->model = $model;
        $this->year = $year;
    }
}

class ElectricCar extends Car {
    private $batteryCapacity;

    public function __construct($name, $model, $year, $batteryCapacity) {
        parent::__construct($name, $model, $year);
        $this->batteryCapacity = $batteryCapacity;
    }

    public function insertIntoDatabase($conn) {
        $sql = "INSERT INTO ElectricCar (name, model, year, battery_capacity) VALUES ('$this->name', '$this->model', '$this->year', '$this->batteryCapacity')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

class GasCar extends Car {
    private $fuelEfficiency;

    public function __construct($name, $model, $year, $fuelEfficiency) {
        parent::__construct($name, $model, $year);
        $this->fuelEfficiency = $fuelEfficiency;
    }

    public function insertIntoDatabase($conn) {
        $sql = "INSERT INTO GasCar (name, model, year, fuel_efficiency) VALUES ('$this->name', '$this->model', '$this->year', '$this->fuelEfficiency')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>
