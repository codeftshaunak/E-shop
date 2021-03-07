<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Page Title - SB Admin</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Create Account</h3>
                                </div>
                                <div class="card-body">
                                    <form action="signup.inc.php" method="post">
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputFirstName">Full Name</label>
                                                    <input class="form-control py-4" id="inputFirstName" type="text"
                                                        name="name" placeholder="Enter full name" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputLastName">Email</label>
                                                    <input class="form-control py-4" id="inputLastName" type="email"
                                                        name="email" placeholder="Enter Email Address" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="small mb-1" for="inputEmailAddress">User Name</label>
                                            <input class="form-control py-4" id="inputEmailAddress" type="text"
                                                name="uid" aria-describedby="emailHelp" placeholder="Username" />
                                        </div>
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputPassword">Password</label>
                                                    <input class="form-control py-4" id="inputPassword" type="password"
                                                        name="pwd" placeholder="Enter password" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="small mb-1" for="inputConfirmPassword">Confirm
                                                        Password</label>
                                                    <input class="form-control py-4" id="inputConfirmPassword"
                                                        type="password" name="pwdrepeat"
                                                        placeholder="Confirm password" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block"
                                                type='submit' name='submit'>Create Account</button></div>
                                    </form>

                                    <?php
                                    if (isset($_GET["error"])) {
                                      if ($_GET["error"]=="emptyinput") {
                                          echo "<p class='text-danger  mx-auto p-2 my-2 text-center font-weight-bold'>Fill in all fields!</p>";
                                      }
                                      elseif($_GET["error"] == "invaliduid"){
                                          echo "<p class='text-danger  mx-auto p-2 my-2 text-center font-weight-bold'>Choose a proper username!</P>";
                                      }
                                      elseif($_GET["error"] == "invalidemail"){
                                          echo "<p class='text-danger  mx-auto p-2 my-2 text-center font-weight-bold'>Choose a proper email!</P>";
                                      }
                                          elseif($_GET["error"] == "passwordsdontmatch"){
                                          echo "<p class='text-danger  mx-auto p-2 my-2 text-center font-weight-bold'>Password dosen't match!</P>";
                                      }
                                          elseif($_GET["error"] == "stmtfailed"){
                                          echo "<p class='text-danger  mx-auto p-2 my-2 text-center font-weight-bold'>Something is wrong, try again!</P>";
                                      }
                                          elseif($_GET["error"] == "usernametaken"){
                                          echo "<p class='text-danger  mx-auto p-2 my-2 text-center font-weight-bold'>Username alredy taken!</P>";
                                      }
                                          elseif($_GET["error"] == "none"){
                                          echo "<p class='text-info bg-dark mx-auto p-2 my-2 border-info'>You have sign up!</P>";
                                      }
                                    }
                                    ?>

                                </div>
                                <div class="card-footer text-center">
                                    <div class="small"><a href="login.php">Have an account? Go to login</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>






        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
</body>

</html>