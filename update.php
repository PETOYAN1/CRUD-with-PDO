<?php 
    require_once 'connect_db.php';

    $Errors = [];
    $id = $_GET['id'];

    $get_user = "SELECT * FROM register WHERE id = $id";

    $stmt = $pdo->prepare($get_user);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if(isset($_POST['submit'])) {
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $age = $_POST['age'];

        // Validation form inputs

        if($name == '') {
            $Errors['name'] = 'Name should not be empty';
        }
        if($surname == '') {
            $Errors['surname'] = 'Surname should not be empty';
        } 
        if($age == '') {
            $Errors['age'] = 'Age should not be empty';
        } 
        if(strlen($name) > 10) {
            $Errors['name'] = 'Name can not be large 10';
        }
        if(strlen($surname) > 10) {
            $Errors['surname'] = 'Surname can not be large 10';
        }
        if(strlen($age) > 10) {
            $Errors['age'] = 'Age can not be large 10';
        }

        // Creating

        if($Errors == []) {
            $sql = "UPDATE register SET name = :name, surname = :surname, age = :age WHERE id = $id";
    
            $stmt = $pdo->prepare($sql);
            $stmt->execute([
                'name' => $name,
                'surname' => $surname,
                'age' => $age
            ]);
            header('location: home.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Update user</title>
</head>
<body>
    <h1 class="create text-center">Update User</h1>
    <form style="width: 22rem; margin: 0 auto;" method="post">
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form5Example1">Name</label>
        <input type="text" id="form5Example1" value="<?= $user['name'] ?>" name="name" class="form-control" />
        <span class="text-danger"><?= isset($Errors['name']) ? $Errors['name'] : null ?></span>
    </div>
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form5Example2">Surname</label>
        <input type="text" id="form5Example2" value="<?= $user['surname'] ?>" name="surname" class="form-control" />
        <span class="text-danger"><?= isset($Errors['surname']) ? $Errors['surname'] : null ?></span>
    </div>
    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="form5Example3">Age</label>
        <input type="number" id="form5Example3" value="<?= $user['age'] ?>" name="age" class="form-control" />
        <span class="text-danger"><?= isset($Errors['age']) ? $Errors['age'] : null ?></span>
    </div>
    <div class="form-outline">
        <input type="submit" value="Create" name="submit" class="btn btn-primary">
    </div>
</body>
</html>