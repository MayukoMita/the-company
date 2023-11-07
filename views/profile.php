<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Profile</title>
</head>
<body>
    <?php
        require "../classes/User.php";

        session_start();
        include "nav.php";

        $user = new User;
        $user_data = $user->getUser($_SESSION['user_id']);
    ?>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-header">
                        <!-- photo -->
                        <div class="row">
                            <div class="col-3">
                                <img src="../images/<?= $user_data['photo'] ?>" alt="<?= $user_data['username'] ?>'s photo" class="img-thumbnail">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="../actions/upload-photo.php" method="post" enctype="multipart/form-data">
                            <label for="photo" class="form-label">Choose Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control mb-2" required>
                            <button type="submit" class="btn btn-outline-secondary">Upload Photo</button>
                        </form>
                    </div>
                    <div class="card-footer border-none">
                        <h2 class="h5"><?= $user_data['first_name']. " ".$user_data['last_name'] ?></h2>
                        <h3 class="h6"><?= $user_data['username'] ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>