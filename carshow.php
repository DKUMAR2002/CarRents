<?php
include 'header.php';
$con = mysqli_connect("localhost","root","","car");
if(!$con){
    die(mysqli_connect_error());
}
$sql = "select * from carrent";
$res = mysqli_query($con,$sql);
?>
<div class="container mb-3">
<h2 class="text-secondary fw-bold text-center"><span class="fs-1 fw-bold text-danger">Book</span> Cars</h2>

    <div class="row g-3">

        <?php
        while($row = mysqli_fetch_assoc($res)) {
        ?> 
        <div class="col-md-4"> 
            <div class="card h-100">
                <img src="img/<?php echo $row['image']; ?>" class="card-img-top" height="200">
                <div class="card-body text-center">
                    <p class="card-title">Car Name : <?php echo $row['name']; ?></p>
                    <p class="card-text">₹ <?php echo $row['price']; ?>/hr</p>
                    <a href="booking.php?id=<?php echo $row['id']?>" class="btn btn-primary">Book Car</a>
                </div>
            </div>
        </div>
        <?php
        }
        ?>
    </div>