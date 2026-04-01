<?php
session_start();
$_SESSION['car_id'] = $_GET['id'];
include 'db.php';
include 'header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-6 mx-auto border shadow rounded-5 p-4">
            <h2>Booking</h2>
            <form action="db.php" method="post">
            <input type="hidden" name="car_id" value="<?php echo $_GET['id']; ?>">
            <input type="text" class="form-control mb-3" name="name" placeholder="Enter Name" required>
            <input type="text" class="form-control mb-3" name="phone" placeholder="Enter Phone" required>
            <input type="number" class="form-control mb-3" name="days" placeholder="Enter Number of days"required>
            
            <button name="book" class="btn btn-outline-primary">Book Now</button>
    </form>
        </div>
    </div>
</div>