<?php
session_start();
include "../includes/db-connect.php";
?>
<?php 
	if (isset($_POST['submit'])) {
        $username = $_POST['username'];
        $userpass = $_POST['userpass'];
        //$query = $conn->prepare("SELECT * FROM user WHERE user_name=:username");
        $sql = mysqli_query($conn,"SELECT * FROM user WHERE user_name=:username");
        $query->bindParam("user_name", $username, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        if (!$result) {
            echo '<p class="error">Username password combination is wrong!</p>';
        } else {
            if (password_verify($userpass, $result['userpass'])) {
                $_SESSION['user_id'] = $result['id'];
                echo '<p class="success">Congratulations, you are logged in!</p>';
            } else {
                echo '<p class="error">Username password combination is wrong!</p>';
            }
        }
    }


 ?>