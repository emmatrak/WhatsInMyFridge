<?php

session_start(); #continue session function to access the session data stored

#stores error messages in an array
#will be filled empty string if there are no errors
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
#checks if the login or register form is active
$activeForm = $_SESSION['active_form'] ?? 'login';

#removes all existing session variables
session_unset();

#display error messages if they exist and return an empty string if they don't
function showError($error){
    return !empty($error) ? "<p class='error-message'>$error</p>" : '';
}

#checks whether the given form name matches the active form name
#returns 'active' if they match, otherwise returns an empty string
function isActiveForm($formName, $activeForm) {
    return $formName === $activeForm ? 'active' : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In or Sign Up Page</title>
    <link rel="stylesheet" href=LOGINstyles.css>
</head>
  
    <body>
        <div claqss="container">
            <div class = "form-box <?= isActiveForm('login', $activeForm); ?>" id="login-form">
                <form action ="login_register.php"method="post">
                    <h2>Log In</h2>
                    <?=showError($errors['login']); ?>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="login">Login</button>
                    <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
                </form>
            </div>
            <div class = "form-box <?= isActiveForm('register', $activeForm); ?>" id="register-form">
                <form action ="login_register.php"method="post">
                    <h2>Register</h2>
                    <?=showError($errors['register']); ?>
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="password" name="password" placeholder="Password" required>
                        <!-- <select name="role" required>
                            <option value="">--Select Role--</option>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select> -->
                    <button type="submit" name="register">Register</button>
                    <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
                </form>
            </div>

        </div>

        <script src="LOGINscript.js"></script> 

    
    </body>

</html>

