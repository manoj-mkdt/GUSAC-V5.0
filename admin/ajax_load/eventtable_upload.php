<?php include 'connect.php' ?>
<?php 
if(isset($_GET['rn'])){
    $id=$_GET['rn'];
    $poster=$_GET['rn2'];
    $query="DELETE FROM `eventtable` WHERE id=$id";
    $result = mysqli_query($con, $query);
    $path='../../uploads/eventposters/'.$poster;
    unlink($path);
    if ($result) {
     header("Location:../eventtable.php");
    }
    else{
       
        echo "failed";
    }
}


?>