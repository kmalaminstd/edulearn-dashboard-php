
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <!-- Include your sidebar here -->
        
        <div class="main-content">
            <div class="settings-container">
                <h1>Settings</h1>
                
                <div class="settings-section">
                    <h2>Account Settings</h2>
                    <form class="settings-form">
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" value="john.doe@example.com">
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" value="johndoe">
                        </div>
                        <button type="submit" class="save-btn">Save Changes</button>
                    </form>
                </div>

                <div class="settings-section">
                    <h2>Change Password</h2>
                    <form class="settings-form">
                        <div class="form-group">
                            <label>Current Password</label>
                            <input type="password">
                        </div>
                        <div class="form-group">
                            <label>New Password</label>
                            <input type="password">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input type="password">
                        </div>
                        <button type="submit" class="save-btn">Update Password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>