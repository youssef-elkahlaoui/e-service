<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reset Your Password</title>
</head>
<body>
    <h2>Reset Your Password</h2>
    <form action="/e-service/public/reset_password/modifyPassword" method="POST">
        <input type="hidden" name="token" value="<?php echo htmlspecialchars($data['token']); ?>">
        <div>
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" name="reset">Reset Password</button>
    </form>
</body>
</html>
