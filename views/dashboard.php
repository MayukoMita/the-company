<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/dbc5b98639.js" crossorigin="anonymous"></script>
    <title>Dashboard</title>
</head>
<body>
    <?php
        require "../classes/User.php";
        session_start();
        include "nav.php";

        $user = new User;
        $all_users = $user->getAllUsers();
    ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-9">
                <h2 class="display-6">User List</h2>
                <table class="table">
                    <thead class="table-secondary">
                        <th>#</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Username</th>
                        <th></th>
                    </thead>
                    <tbody>
                        <?php
                            while($row = $all_users->fetch_assoc()){
                        ?>
                                <tr>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['first_name'] ?></td>
                                    <td><?= $row['last_name'] ?></td>
                                    <td><?= $row['username'] ?></td>
                                    <td>
                                        <!-- edit -->
                                        <a href="edit-user.php?user_id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-pen"></i></a>
                                        <!-- the data of the current user cannot be deleted -->
                                        <?php
                                            if($row['id'] != $_SESSION['user_id']){
                                        ?>
                                        <!-- delete -->
                                        <form action="../actions/delete-user.php" method="post" class="d-inline">
                                            <input type="hidden" name="user_id" value="<?= $row['id'] ?>">
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                        <?php
                                            }
                                        ?>
                                    </td>
                                </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>