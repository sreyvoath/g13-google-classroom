<?php

session_start();
require "../../database/database.php";
require "../../models/signup.medel.php";

// ====== funtion make data to Security =========
function secureData($data)
{
    $data = trim($data);
    $data = htmlspecialchars($data);
    return $data;
};

//========== Check if the form is submitted======
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $image = $_FILES['image'];
    $password = htmlspecialchars($_POST["password"]);
    $passwordEncript =password_hash($password, PASSWORD_BCRYPT);
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $role = htmlspecialchars($_POST['role']);
    $code = substr(str_shuffle(str_repeat("0123456789", 5)), 0, 6);

// ========= Image upload ================
    if (!empty($name) && (!empty($email)) && (!empty($password)) && !empty($image)) {
        $directory = "../../assets/images/profiles/";
        $target_file = $directory . '.' . basename($_FILES['image']['name']);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $checkImageSize = getimagesize($_FILES["image"]["tmp_name"]);
        if ($checkImageSize) {
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                $_SESSION['error'] = "Wrong Image extension!";
                header('Location: /user-signup');
            } else {

                $imageExtension = explode('.', $target_file)[6];
                $newFileName = uniqid();
                $nameInDirectory = $directory . $newFileName . '.' . $imageExtension;
                $nameInDB = $newFileName . '.' . $imageExtension;
                move_uploaded_file($_FILES["image"]["tmp_name"], $nameInDirectory);
                $user = accountExists($email);
                if (count($user) == 0) {
                    createAccount($name, $email, $role,$code, $passwordEncript, $nameInDB);
                    $newUser = getUserEmail($email);
                    $_SESSION['user'] = ['name'=>$name, 'email'=>$email, 'role'=>$role, 'image'=>$nameInDB,'id'=>$newUser['id'], 'role'=>$newUser['role']];
                    header('Location: /user-signin');
                    $_SESSION['success'] = "Account successfully created";
                } else {
                    $_SESSION['exist'] = "Account already exists";
                    header('Location: /user-signup');
                }
            }
        }
    }

    if (!preg_match('/^(?=.*[!@#$])[a-zA-Z0-9!@#$]{8,}+$/', secureData($password))) {
        $_SESSION['password'] = "Password is not secure!";
        $_SESSION['name'] = "It's require!";
        header("Location:/user-signup");
        exit;
    }

    if (!empty($name) && (!empty($email)) && (!empty($password)) && !empty($image)) {
        createAccount($name, $email, $role, $code,  $passwordEncript, $image);
        header("Location:/home");
    } else {
        header("Location:/user-signup");
        $_SESSION['name'] ="It's require!";
        exit;
    }
   
    if (empty($error['password'])) {
        createAccount($name, $email, $role, $code, $passwordEncript, $image);
        header("Location:/home");
        exit;
    } else {
        header("Location:/user-signup");
        exit;
    };
} else {
    //============== Redirect to form login page is not submitted===========
    header("Location: /user-signup");
    exit;
}
