<?php

    session_name('eduwebdash_ui');
    session_start();

    if(isset($_SESSION['admin_token'])){
        header('Location: index.php');
        exit();
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $email = filter_input(INPUT_POST, 'email' , FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $jsonEncode = json_encode([
            'email' => $email,
            'password' => $password
        ]);

        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => 'http://localhost/eduwebbackend/admin-login.php',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $jsonEncode
        ]);

        $response = curl_exec($curl);
        // echo $response->;
        $data = json_decode($response, true);
        // var_dump($data['data']);
        curl_close($curl);

        $token = $data['data']['token'];

        if($token){

            $_SESSION['admin_token'] = $token;
            $_SESSION['username'] = $data['data']['role'];
            $_SESSION['user_id'] = $data['data']['user_id'];
            $_SESSION['email'] = $data['data']['email'];
            // echo $token;
            header('Location: index.php');
            exit();

        }else{
            header('Location: admin-login.php');
        }

        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="login-container">
        <div class="login-box">
            <div class="login-header">
                <h2>Admin Login</h2>
                <p>Welcome back! Please login to your account.</p>
            </div>
            
            <form id="loginForm" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" >
                <div class="form-group">
                    <label><i class="fas fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                
                <div class="form-group">
                    <label><i class="fas fa-lock"></i> Password</label>
                    <div class="password-input">
                        <input type="password" name="password" id="password" required placeholder="Enter your password">
                        <button type="button" id="togglePassword" class="toggle-password">
                            <i class="fas fa-eye"></i>
                        </button>
                    </div>
                </div>
                
                <!-- <div class="form-footer">
                    <label class="remember-me">
                        <input type="checkbox"> Remember me
                    </label>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                </div> -->
                
                <button type="submit" name="submit" class="login-btn">Login</button>
            </form>
        </div>
    </div>
</body>
</html>
