<?php
require_once 'data.php';
function validateInput($data){
    return htmlspecialchars(trim($data));
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $name = validateInput($_POST['name']);
    $email = validateInput($_POST['email']);
    $gender = validateInput($_POST['gender']);
    $city = validateInput($_POST['city']);

    if(empty($name) || empty($email) || empty($gender) || empty($city)) {
        $error = "All fields are required.";
    }else{
        $stmt = $pdo->prepare("INSERT INTO users (name, email, gender, city) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $gender, $city]);

        $success = "User added successfully!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Information Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>User Information Form</h2>
        <?php if (isset($error)) : ?>
            <div class="alert alert-danger" role="alert">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php if (isset($success)) : ?>
            <div class="alert alert-success" role="alert">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" required>
            </div>
            <div class="form-group">
                <label>Gender:</label><br>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" value="male" required>
                    <label class="form-check-label" for="male">Male</label>
                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" class="form-check-input" name="gender" value="female" required>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <select class="form-control" name="city" required>
                    <option value="New Delhi">New Delhi</option>
                    <option value="Lucknow">Lucknow</option>
                    <option value="Chennai">Chennai</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
