<?php  
// INSERT INTO `notes` (`sno`, `title`, `description`, `tstamp`) VALUES (NULL, 'But Books', 'Please buy books from Store', current_timestamp());
//INSERT INTO `notes` (`sno`, `title`, `descriprion`, `tstamp`) VALUES (NULL, 'sdddad', 'dadaddadadadadadada', current_timestamp());
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
  $sql = "DELETE FROM `ad` WHERE `sno` = $sno";
  $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
if (isset( $_POST['snoEdit'])){

  // Update the record
    $sno = $_POST["snoEdit"];
    $title = $_POST["titleEdit"];
    $description = $_POST["descEdit"];

    $target_dir='../../../assets/ads';
    $target_file1=$target_dir.basename($_FILES['Image_1']['name']);
    move_uploaded_file($_FILES['Image_1']['tmp_name'],$target_file1);

    $target_dir='../../../assets/ads';
    $target_file2=$target_dir.basename($_FILES['Image_2']['name']);
    move_uploaded_file($_FILES['Image_2']['tmp_name'],$target_file2);

    $target_dir='../../../assets/ads';
    $target_file3=$target_dir.basename($_FILES['Image_3']['name']);
    move_uploaded_file($_FILES['Image_3']['tmp_name'],$target_file3);

  // Sql query to be executed
  $sql = "UPDATE `ad` SET `ad__title` = '$title' , `ad__desc` = '$description', `ad1__image`='$target_file1',  `ad2__image`='$target_file2', `ad3__image`='$target_file3'  WHERE `ad`.`sno` = $sno";
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
    $desc = $_POST["desc"];


    $target_dir='../../../assets/ads';
    $target_file1=$target_dir.basename($_FILES['Image_1']['name']);
    move_uploaded_file($_FILES['Image_1']['tmp_name'],$target_file1);

    $target_dir='../../../assets/ads';
    $target_file2=$target_dir.basename($_FILES['Image_2']['name']);
    move_uploaded_file($_FILES['Image_2']['tmp_name'],$target_file2);

    $target_dir='../../../assets/ads';
    $target_file3=$target_dir.basename($_FILES['Image_3']['name']);
    move_uploaded_file($_FILES['Image_3']['tmp_name'],$target_file3);

    // Sql query to be executed
  $sql = "INSERT INTO `ad` (`ad1__image`, `ad2__image`, `ad3__image`, `ad__title`, `ad__desc`) VALUES ('$target_file1', '$target_file2', '$target_file3', '$title', '$desc')";
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
            <form action="./ads.php" method="POST" enctype='multipart/form-data' id='form-box'>
                <div class="modal-body">
                    <input type="hidden" name="snoEdit" id="snoEdit">

                    <div class="form-group">
                        <label for="titleEdit">Ads Title</label>
                        <input type="text" class="form-control" id="titleEdit" name="titleEdit"
                            aria-describedby="emailHelp">
                    </div>

                    <div class="form-group">
                        <label for="descEdit">Product Description</label>
                        <textarea class="form-control" id="descEdit" name="descEdit" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="form-group d-flex flex-column">
                            <label for="img" class='p-1'>Product's Image</label>
                            <input type="file" name="Image_1" id="Image_1" class="form-control mb-1">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group d-flex flex-column">
                            <label for="img" class='p-1'>Product's Image</label>
                            <input type="file" name="Image_2" id="Image_2" class="form-control mb-1">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group d-flex flex-column">
                            <label for="img" class='p-1'>Product's Image</label>
                            <input type="file" name="Image_3" id="Image_3" class="form-control mb-1">
                        </div>
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

<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>

            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav> -->

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
    <h2>Add Product's Details</h2>
    <form action="./ads.php" method="POST" enctype='multipart/form-data' id='form-box'>
        <div class="form-group">
            <label for="title">Ad Title</label>
            <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
        </div>


        <div class="form-group">
            <label for="desc">Ad Description</label>
            <textarea class="form-control" id="description" name="desc" rows="3"></textarea>
        </div>

        <div class="input-group mb-3 py-3">
            <label for="desc" class='p-1'>Ad's Image-1:-</label>
            <div class="custom-file">
                <input type="file" name="Image_1" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>

        <div class="input-group mb-3 py-3">
            <label for="desc" class='p-1'>Ad's Image-2:-</label>
            <div class="custom-file">
                <input type="file" name="Image_2" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>

        <div class="input-group mb-3 py-3">
            <label for="desc" class='p-1'>Ad's Image-3:-</label>
            <div class="custom-file">
                <input type="file" name="Image_3" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Upload Ads</button>
    </form>
</div>

<div class="container my-4">


    <table class="table" id="myTable">
        <thead>
            <tr>
                <th scope="col">S.No</th>
                <th scope="col">Ad Title</th>
                <th scope="col">Ad Description</th>
                <th scope="col">Image-1</th>
                <th scope="col">Image-2</th>
                <th scope="col">Image-3</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
          $sql = "SELECT * FROM `ad`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo "<tr>
            <th scope='row'>". $sno . "</th>
            <td>". $row['ad__title'] . "</td>
            <td>". $row['ad__desc'] . "</td>
            <td>" .'<img class="card" style="width:100%;" src='. $row ['ad1__image'] .">". "</td>
            <td>" .'<img class="card" style="width:100%;" src='. $row ['ad2__image'] .">". "</td>
            <td>" .'<img class="card" style="width:100%;" src='. $row ['ad3__image'] .">". "</td>
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
            brand = tr.getElementsByTagName("td")[2].innerText;
            price = tr.getElementsByTagName("td")[3].innerText;

            titleEdit.value = title;
            descEdit.value = description;
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

                window.location = `./ads.php?delete=${sno}`;
            } else {
                console.log('no');
            }
        })
    })
</script>

<?php include("./footer.php"); ?>
</body>

</html>