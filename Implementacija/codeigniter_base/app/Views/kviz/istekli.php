<!--    Autor - Stefan Curović 2020/0068    -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta charset = "UTF-8">
    <title>Istekli kvizovi</title>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url() ?>assets/logo.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
     <link href=" <?php echo base_url() ?>/stil/styles.css" rel="stylesheet" />
</head>
<body style = "background-color: #333333;">
    <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <div class="container px-4 px-lg-8">
                <a class="navbar-brand" href="#!">  
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">
                        <a href = "<?= site_url("Admin/pocetna") ?>">
                            <img src = "<?php echo base_url() ?>assets/logo.png" style = "height: 10vh;">
                        </a></li>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                            <div class="navbar-nav">
                               <a class="nav-item nav-link" style = "color: white; font-size: 120%;" href="<?= site_url("Admin/onama"); ?>">O nama</a>
                          <a class="nav-item nav-link" style = "color: white; font-size: 120%;" href="<?= site_url("Admin/dodavanjeAnkete"); ?>">Napravi anketu</a>
                          <a class="nav-item nav-link" style = "color: white; font-size: 120%;" href="<?= site_url("Admin/dodavanjeKviza"); ?>">Napravi kviz</a>
                          <a class="nav-item nav-link" style = "color: white; font-size: 120%;" href="<?= site_url("Admin/pregledajNaloge"); ?>">Pregledaj naloge</a>
                          <a class="nav-item nav-link" style = "color: white; font-size: 120%;" href="<?= site_url("Admin/dodavanjeNaslova"); ?>">Dodaj naslov</a>
                          <b><a class="nav-item nav-link" style = "color: white; font-size: 120%;" href="<?= site_url("Admin/objavaRezultata"); ?>">Objava rezultata</a></b>
                             
                            </div>
                        </div>
                    </ul>
                    <form class="d-flex">
                        <div class="dropdown">
                            <button type="button" class="btn btn-success dropdown-toggle" data-bs-toggle="dropdown" style="background-color:white; color:#333333;">
                                <?php echo $ime;  ?>
                            </button>
                            <ul class="dropdown-menu">
                                 <li><a href="<?= site_url("Admin/profil")?>" class="dropdown-item" disabled>Profil</a></li>
                            <li><a href="<?= site_url("Admin/podesavanja")?>" class="dropdown-item" disabled>Podesavanja</a></li>
                            <div class="dropdown-divider"></div>
                            <li><a href="<?= site_url("Admin/odjava")?>" class="dropdown-item">Odjavi se</a></li>
                            </ul>
                        </div>
                    </form>
                </div>
            </div>
        </nav>
    <h1 class = "text-center text-light">Istekli kvizovi</h1>
    
    <?php
        for($i = 0; $i < sizeof($istekli); $i++) {
            echo '
            <div class = "aktivni_kviz container-fluid text-center">
            <h2 class = "text-light">Kviz:' . $istekli[$i]->Naslov . '</h2>
            <div>
                <table class  = "table table-light table-striped" style = "width: 50%; margin: auto;">
                    <tr>
                        <th>Redni broj</th>
                        <th>Korisničko ime</th>
                        <th>Broj poena</th>
                        <th>Vreme izrade</th>
                    </tr>';
            
            for($j = 0; $j < sizeof($topTri[$i]); $j++)
            {
                echo '
                   <tr>
                    <td>' . ($j + 1) . '</td>
                    <td>' . $topTri[$i][$j]->IDKor . '</td>
                    <td>' . $topTri[$i][$j]->BrBodova . '</td>
                    <td>' . $topTri[$i][$j]->DatumZavrsetka . '</td>
                   </tr>';
            }
            
            echo '     
                    <tr>
                    <td colspan="2">
                        <b>Kviz se završio: <span id = "josKoliko">' . $istekli[$i]->DatumDo . '</b></span>
                    </td>
                    <td colspan="2">
                        <b>Nagrade za najbolje plasirane iznose (u poenima): ' . $nagrade[$i] . '</b>
                    </td>
                    </tr>
                    <tr>
                    <td colspan="4">
                         <a class = "btn btn-success" href = "' . site_url("Admin/objaviIstekli/{$istekli[$i]->ID}") . '">Objavi rezultate</a>
                    </td>
                    </tr>
                </table>
            </div>
            </div><br><br>
        ';}
    ?>
    <div class ="text-center">
        <a class = "btn btn-success" href = "<?= site_url("Admin/objavaRezultata") ?>" style = "margin: auto;">Povratak na prethodnu stranicu</a>
    </div>

</body>
</html>