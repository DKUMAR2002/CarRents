<?php include 'adminheader.php';?>

    <div class="container">
        <div class="row m-3 fw-bolder">
            <h2 class="text-center fw-bolder fs-1 text-danger mb-3">Login</h2>
            <div class="col-md-6 mx-auto border shadow-lg rounded-5 bg-light p-5">  
                <form action="db.php"method="post">
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="floatingEmail" placeholder="Email">
                    <label for="floatingEmail">Email address</label>
                </div>
               
                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="floatingPassword">Password</label>
                </div>
                <button class="btn btn-outline-danger " name="login">Login</button>
                
                <a href="signup.php" class="btn btn-outline-primary btn-sm">Click here for SIGNUP PAGE</a>
            </form>
            </div>

        </div>
    </div>
    <?php include 'footer.php';?>