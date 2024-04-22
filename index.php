<?php
include "inc/dbconnection.class.php";

$db = new Dbconnection();

$sql = "SELECT * FROM sommen WHERE id = 7";

$query = $db->prepare($sql);

$query->execute();

$recset = $query->fetchAll();

echo "<pre>";
print_r($recset);
echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="java.js" defer></script>
    <title>procent</title>
</head>

<body>
    <div class="container">
        <div id="som">
            <div class="row">
                <div class="col-8">
                    <h5>Inleiding</h5>
                    <?php
                    echo $recset[0]['inleiding'];
                    ?>
                    <h5>Vraag</h5>
                    <!-- shortcut voor het opvragen van 1 variabele -->
                    <?= $recset[0]['vraag']; ?>
                    <h5>Geef hier je antwoord</h5>
                    <div class='row'>
                        <div class='col-2'>
                            <?php
                            if ($recset[0]['voor_achter'] == 0) {
                                ?>
                                <div class='input-group mb-3'>
                                    <span class='input-group-text'>
                                        <?= $recset[0]['eenheid'] ?>
                                    </span>
                                    <input id='answer' type='text' class='form-control'>
                                </div>

                                <?php
                            } else {
                                "<input class='form-control' type='text'>" . $recset[0]['eenheid'];
                            }
                            ?>
                        </div>
                        <Input class="form-control"></Input>
                    </div>
                    <div class='col-3'>
                            <button class="btn btn-success">Check antwoord</button>
                        </div>
                </div>
                <div class="col-4">
                    <?php
                    if ($recset[0]['afbeelding'] != '')
                        echo "<img src='images/{$recset[0]['afbeelding']}' 
                  alt='' style='height: 300px;' class='img-fluid'>";
                    ?>


                </div>
            </div>

            <div class="row space">
                <div class="col-4">

                    <div class="card text-center" style="margin-top: 145px;">
                        <div class="card-header">
                            Oud
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Denk ook aan</h5>
                            <ol>
                                <li>Zonder BTW</li>
                                <li>Zonder korting</li>
                            </ol>

                        </div>
                        <div class="card-footer text-body-secondary">
                            <Input class="form-control is-invalid" onchange="checkInput()" id="oudePrecentage"></Input>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01">keuzes</label>
                        <select class="form-select is-invalid" id="soort" onchange="checkInput()">
                            <option value="" selected>kies...</option>
                            <option value="1">van</option>
                            <option value="2">toename</option>
                            <option value="3">afname</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">percentage</span>
                        <input type="text" class="form-control is-invalid" onchange="checkInput()" aria-label="Username"
                            aria-describedby="basic-addon1" id="percentage">
                        <span class="input-group-text" id="basic-addon1">%</span>
                    </div>

                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Vermenigvuldigingsfactor: x </span>
                        <input disabled type="text" class="form-control" onchange="checkInput()" aria-label="Username"
                            aria-describedby="basic-addon1" id="vermenigvuldigingsfactor">
                    </div>

                    <img src="images/arrow.jpg" alt="">
                    <img src="images/arrow.jpg" class="flipped" alt="">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="basic-addon1">Delingsfactor: : </span>
                        <input disabled type="text" onchange="checkInput()" class="form-control" aria-label="Username"
                            aria-describedby="basic-addon1" id="delingsfactor">

                    </div>

                    <button id="button" type="button" class="btn btn-success" disabled
                        style="width: 100%; margin-top: 20px;" onclick="solveProblem()">Success</button>
                    <button id="button2" type="button" class="btn btn-danger" disabled
                        style="width: 100%; margin-top: 20px;" onchange="checkInput()" onclick="reset()">Reset</button>
                </div>
                <div class="col-4">
                    <div class="card text-center" style="margin-top: 145px;">
                        <div class="card-header">
                            Nieuw
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Denk ook aan</h5>
                            <ol>
                                <li>Zonder BTW</li>
                                <li>Zonder korting</li>
                            </ol>

                        </div>
                        <div class="card-footer text-body-secondary">
                            <Input class="form-control is-invalid" onchange="checkInput()"
                                id="nieuwePrecentage"></Input>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                </div>
            </div>





            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
                crossorigin="anonymous"></script>
</body>

</html>