<?php  
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
//INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'sdddad', 'dadaddadadadadadada', current_timestamp());
$insert = false;
$update = false;
$delete = false;
// Connect to the Database 
$servername = "localhost";
$username = "root";
$password = "";
$database = "shopee";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect: ". mysqli_connect_error());
}

if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $delete = true;
  $sql = "DELETE FROM `blog` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){

  // Update the record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descriptionEdit"];
    $category = $_POST["categoryEdit"];
  

    $target_dir='../../../assets/blogs';
    $target_file=$target_dir.basename($_FILES['blogImage']['name']);
    move_uploaded_file($_FILES['blogImage']['tmp_name'],$target_file);

 
 
    // Sql query to be executed
  $sql = "UPDATE `blog` SET `title` = '$title' , `description` = '$description', `category` = '$category', `image`='$target_file'  WHERE `blog`.`sno` = $sno";
  $result = mysqli_query($conn, $sql);
  if($result){
    $update = true;
}
else{
    echo "We could not update the record successfully";
}
}
else{
    $title = $_POST["title"];
    $description = $_POST["description"];
    $category = $_POST["category"];

    $target_dir='../../../assets/blogs';
    $target_file=$target_dir.basename($_FILES['blogImage']['name']);
    move_uploaded_file($_FILES['blogImage']['tmp_name'],$target_file);
  
    // Sql query to be executed
  $sql = "INSERT INTO `blog` (`title`, `description`, `category`, `image`) VALUES ('$title', '$description', '$category', '$target_file')";
  $result = mysqli_query($conn, $sql);

   
  if($result){ 
      $insert = true;
  }
  else{
      echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
  } 
}
}
?>




<?php include("./header.php"); ?>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">

<style>
    .brder {
        border: 1px solid black !important;
    }
</style>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="./blog.php" method="POST" enctype='multipart/form-data' id='form-box'>
                <div class="modal-body">
                    <input type="hidden" name="snoEdit" id="snoEdit">

                    <div class="form-group">
                        <label for="title">Blog Title</label>
                        <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="desc">Blog Description</label>
                        <textarea class="form-control" id="descriptionEdit" name="descriptionEdit" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="brand">Blog Category</label>
                        <input type="text" class="form-control" id="categoryEdit" name="categoryEdit"
                            aria-describedby="emailHelp">
                    </div>


                    <div class="form-group d-flex flex-column">
                        <label for="img" class='p-1'>Blog's Image</label>
                        <input type="file" name="blogImage" id="blogImage" class="form-control">
                    </div>


                </div>
                <div class="modal-footer d-block mr-auto">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>



<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<?php
  if($delete){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been deleted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<?php
  if($update){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been updated successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<div class="container my-4">
    <h2>Add Blog's Details</h2>
    <form action="./blog.php" method="POST" enctype='multipart/form-data' id='form-box'>
        <div class="form-group">
            <label for="title">Blog's Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        </div>
        
        <div class="form-group">
            <label for="desc">Blog's Description</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="category">Blog's Catagory</label>
            <input type="text" class="form-control" id="category" name="category" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
            <div class="form-group d-flex flex-column">
                <label for="img" class='p-1'>Blog's Image</label>
                <input type="file" name="blogImage" id="blogImage" class="form-control mb-1">
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Add Blogs</button>
    </form>
</div>

<div class="container my-4">


    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Catagory</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
          $sql = "SELECT * FROM `blog`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['title'] . "</td>
            <td>". $row['description'] . "</td>
            <td>". $row['category'] . "</td>
            <td>" .'<img class="card" style="width:100%;" src='. $row ['image'] .">". "</td>
            <td> <button class='edit btn btn-sm btn-primary' id=".$row['sno'].">Edit</button> 
                <button class='delete btn btn-sm btn-primary' id=d".$row['sno'].">Delete</button>  
            </td>
          </tr>";
        } 
          ?>


        </tbody>
    </table>
</div>
<hr>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>
<script>
    edits = document.getElementsByClassName('edit');
    Array.from(edits).forEach((element) => {
        element.addEventListener("click", (e) => {
            tr = e.target.parentNode.parentNode;
            title = tr.getElementsByTagName("td")[0].innerText;
            description = tr.getElementsByTagName("td")[1].innerText;
            category = tr.getElementsByTagName("td")[2].innerText;


            titleEdit.value = title;
            descriptionEdit.value = description;
            categoryEdit.value = category;
            snoEdit.value = e.target.id;
            $('#editModal').modal('toggle');
        })
    })

    deletes = document.getElementsByClassName('delete');
    Array.from(deletes).forEach((element) => {
        element.addEventListener("click", (e) => {
            sno = e.target.id.substr(1, );

            if (confirm("Press a button!")) {
                console.log("yes");

                window.location = `./blog.php?delete=${sno}`;
            } else {
                console.log('no');
            }
        })
    })
</script>

<?php include("./footer.php"); ?>
</body>

</html>