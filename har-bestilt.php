<?php
require "settings/init.php";


$webshops = $db->sql("SELECT * FROM webshop");
?>

<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Har bestilt</title>

    <meta name="robots" content="All">
    <meta name="author" content="Udgiver">
    <meta name="copyright" content="Information om copyright">
    <link href="https://api.fontshare.com/v2/css?f[]=satoshi@700&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" type="text/css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<header class="app-header">
    <div class="text-center">
        <a href="index.php">
            <img class="logo" src="images/logo.png" alt="Logo">
        </a>
    </div>
</header>
<br>
<div class="text-center">
    <h1 class="">Indtast dine informationer</h1>
</div>
<br>
<div class="info container-fluid">
    <div class="row justify-content-center">
        <div class="col-6">
            <form action="har-bestilt.php" method="post">
                <div class="mb-4">
                    <label class="form-label">Modtager land</label>
                    <select class="form-select">
                        <option value="Danmark">Danmark</option>
                        <option value="Sverige">Sverige</option>
                        <option value="Norge">Norge</option>
                        <option value="Finland">Finland</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="webName" class="form-label">Webshop navn <span class="required-field">*</span> </label></label>
                    <select class="form-select" id="webName">
                        <option value="" disabled selected hidden></option>
                        <?php
                        foreach ($webshops as $webshop){
                            ?>
                            <option value="<?php echo $webshop->webshopTold; ?>"><?php echo $webshop->webshopName; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="amount" class="form-label">Værdi <span class="required-field">*</span> </label>
                    <input type="number" step="0.01" class="form-control" id="amount" placeholder="Indtast værdien" value="">
                </div>
                <div class="mb-4">
                    <label for="pakkenummer" class="form-label">Forsendelsesnummer</label>
                    <input type="text" class="form-control" id="pakkenummer" placeholder="Indtast dit pakkenummer">
                </div>
                <br>
                <br>
                <div class="mb-4">
                    <button type="submit" class="btn" id="calc">Udregn tolden</button>
                </div>
            </form>
            <br>
            <div class="fs-3 text-center">
                <span id="result"></span>
            </div>
        </div>
    </div>
</div>

<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/app.js"></script>
</body>
</html>


