<?php
include 'header.php';
include 'db.php';
$sql = "SELECT bookings.*, carrent.name as car_name, carrent.price 
FROM bookings 
JOIN carrent ON bookings.car_id = carrent.id";
$res = mysqli_query($con,$sql);
?>
<div class="container mb-3">
<h2 class="text-secondary fw-bolder text-center mb-3"><span class="fs-1 fw-bold text-danger">Booking</span></h2>
    <div class="row g-3">
        <?php
        while($row = mysqli_fetch_assoc($res)) {
            $total = $row['price'] * $row['days'];
        ?> 
        <div class="col-md-3"> 
            <div class="card h-100">
                <div class="card-body">
                    <p><strong>Booking ID:</strong> <?php echo $row['id']; ?></p>
                    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>
                    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>
                    <p><strong>Car Name:</strong> <?php echo $row['car_name']; ?></p>
                    <p><strong>Days:</strong> <?php echo $row['days']; ?></p>
                    <p><strong>Price per Day:</strong> ₹<?php echo $row['price']; ?></p>
                    <p><strong>Total Amount:</strong> ₹<?php echo $total; ?></p>
                    <a href="db.php?delete=<?php echo $row['id']?>"class="btn btn-outline-danger">Cancel Booking</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>