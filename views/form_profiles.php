<!DOCTYPE html>
<html lang="en">
<?php
    //include_once('../controller/perfilController.php');
    //print_r($errors);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-5">
                <form action="../controller/perfilController.php" method="POST">
                    <label for="" class="form-label">first_name</label>
                    <input type="text" class="form-control" name="first_name" value="<?= $v = isset($_POST['first_name']) ? $_POST['first_name'] : '' ?>">                               
                    <?php if (isset($errors['input1'])) { ?>
                        <div class="text-danger"><?php echo $errors['input1']; ?></div>
                    <?php } ?>                   
                    <label for="" class="form-label">last_name</label>
                    <input type="text" class="form-control" name="last_name" value="<?= $v = isset($_POST['last_name']) ? $_POST['last_name'] : '' ?>" >
                    <?php if (isset($errors['input2'])) { ?>
                        <div class="text-danger"><?php echo $errors['input2']; ?></div>
                    <?php } ?>     
                    <label for="" class="form-label">email</label>
                    <input type="text" class="form-control" name="email" value="<?= $v = isset($_POST['email']) ? $_POST['email'] : '' ?>">
                    <?php if (isset($errors['input3'])) { ?>
                        <div class="text-danger"><?php echo $errors['input3']; ?></div>
                    <?php } ?>                      
                    <label for="" class="form-label">phone</label>
                    <input type="text" class="form-control" name="phone" value="<?= $v = isset($_POST['phone']) ? $_POST['phone'] : '' ?>">
                    <?php if (isset($errors['input4'])) { ?>
                        <div class="text-danger"><?php echo $errors['input4']; ?></div>
                    <?php } ?>     
                    <label for="" class="form-label">date_birth</label>
                    <input type="date" class="form-control" name="date_birth" value="<?= $v = isset($_POST['date_birth']) ? $_POST['date_birth'] : '' ?>">
                    <?php if (isset($errors['input5'])) { ?>
                        <div class="text-danger"><?php echo $errors['input5']; ?></div>
                    <?php } ?>     
                    <div class="d-flex justify-content-center">
                        <input type="submit" value="envio" name="envio" class="btn btn-success mt-2 w-100">                        
                    </div>
                    <div class="justify-content-center  mt-2">
                        <a href="../views/listar.php" class="btn btn-dark w-100" >Mostrar Lista</a>
                    </div>
                </form>
                <?php if (isset($errors['llenado'])) { ?>
                    <div class="alert alert-success mt-3"><?php echo $errors['llenado']; ?></div>
                <?php } ?>
            </div>
        </div>
    </div>


</body>

</html>