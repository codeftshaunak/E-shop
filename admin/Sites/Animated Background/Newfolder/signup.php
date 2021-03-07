<?php
    include_once 'header.php';
    ?>

    <section class="signup-form">
        <h2>Sign Up</h2>
        <div class="signupp-form-form">
            <form action="includess/signup.inc.php" method="post">
                <input type="text" name="name" placeholder="Full Name">       
                <input type="text" name="email" placeholder="Email">       
                <input type="text" name="uid" placeholder="UserName">       
                <input type="password" name="pwd" placeholder="Password">       
                <input type="password" name="pwdrepeat" placeholder="Repeat Password">       
                <button type="submit" name="submit">Sign Up</button>   
            </form>
        </div>
        <?php
            if (isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput"){
                    echo : <p> Fill in all fields!</p>
                }
                else if($_GET["error"] == "invaliduid"){
                    echo : <p>Choose a proper username!</p>
                }
                
                else if($_GET["error"] == "invalidemail"){
                    echo : <p>Choose a proper email!</p>
                }
                
                else if($_GET["error"] == "passswordsdontmatch"){
                    echo : <p>Password does not match!</p>
                }
                
                else if($_GET["error"] == "stmtfailedd"){
                    echo : <p>Something went wrong! Try again.</p>
                }
                else if($_GET["error"] == "usernametaken"){
                    echo : <p>Username has already beeen taken!</p>
                }
                else if($_GET["error"] == "none"){
                    echo : <p>You have signed up!</p>
                }       
            }   
        ?>
    </section>

<?php
    include_once 'footer.php';
?>