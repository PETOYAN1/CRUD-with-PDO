<?php
    require_once 'connect_db.php';

    $sql = "SELECT * FROM register";

    $stmt = $pdo->prepare($sql);
    $stmt->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Showing Users</title>
</head>
<body>
    <h1 class="section text-center text-info">CRUD Application</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>name</th>
                <th>surname</th>
                <th>age</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($users = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                <tr>
                    <td><?= $users['id'] ?></td>
                    <td><?= $users['name'] ?></td>
                    <td><?= $users['surname'] ?></td>
                    <td><?= $users['age'] ?></td>
                    <td>
                        <a class="btn btn-primary" href="update.php?id=<?= $users['id'] ?>">Update</a>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $users['id'] ?>">Delete</a>
                    </td>
                </tr>
                <?php endwhile ?>
        </tbody>
    </table>
    <div class="link">
        <a class="btn btn-success" href="create.php">Create</a>
    </div>
</body>
</html>