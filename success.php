<?php
session_start();
include 'header.php';
if(!isset($_SESSION['name'])){
    die("No booking data found");
}
$con = mysqli_connect("localhost","root","","car");

$id = $_SESSION['car_id'];

$sql = "SELECT * FROM carrent WHERE id='$id'";
$res = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($res);
$total_price = $row['price'] * $_SESSION['days'];
?>
<div class="container mt-3">
    <h2 class="text-success text-center">✅ Booking Successful</h2>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg p-4">
            <img src="img/<?php echo $row['image']; ?>" class="card-img-top" height="200">
                <p><b>Name:</b> <?php echo $_SESSION['name']; ?></p>
                <p><b>Car ID:</b> <?php echo $row['name']; ?></p>
                <p><b>Number of Days:</b> <?php echo $_SESSION['days']; ?></p>
                <p><b>Price per Day:</b> ₹<?php echo $row['price']; ?></p>
                <p><b>Total Price:</b> ₹<?php echo $total_price; ?></p>
                
            </div>
        </div>
    </div>

    <div class="text-center">
        <a href="index.php" class="btn btn-primary mt-3">Go Home</a>
        <a href="contact.php" class="btn btn-info mt-3">
    Need Help?
</a>
    </div>
</div>
