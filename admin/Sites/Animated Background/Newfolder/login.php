<?php
    include_once 'header.php';
    ?>
    

    <section class="signup-form">
        <h2>Log In</h2>
        <div>
            <form action="includes/login.inc.php" method="post">
                <input type="text" name="name" placeholder="Username/Email">                     
                <input type="text" name="pwd" placeholder="Password">                   
                <button type="submit" name="submit">Sign Up</button>   
            </form>
        </div> 
        <?php
            if (isset($_GET["error"])) {
                if($_GET["error"] == "emptyinput"){
                    echo : <p> Fill in all fields!</p>;
                }
                else if($_GET["error"] == "invaliduid"){
                    echo : <p>Incorrect login information!</p>;               
                }       
            }   
        ?>      
    </section>

<?php
    include_once 'header.php';
?>