<!DOCTYPE html>
<html>
<head>
<title>Ustno spraševanje</title>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/projektna.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet"> 
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Navigacija -->
    <?php include 'glava.php'?>

    <!-- Vsebina -->
    <div class="container-fluid">
        <div class="row">

            <!-- Sekcija za vprasanja -->
            <div class="col-md-3 vprasanja">
                <form action="" method="POST">
                    <h1>Generiraj vprašanja</h1>
                    <h3>
                    Pozdravljen
                    <?php 
                        echo $_SESSION['upor_ime'];
                    ?>
                    </h3>
                    <select name="predmet">
                        <!-- PHP za predmete -->
                        <?php 
                            $query = $this->db->query("SELECT * FROM predmeti ORDER BY ime_predmeta");
                            foreach ($query->result() as $row){
                                $query2 = $this->db->query("SELECT * FROM sklopi WHERE id_predmeta = $row->id_predmeta ORDER BY ime_sklopa");
                                foreach($query2->result() as $row2){
                                    $ime = $row->ime_predmeta." ".$row2->ime_sklopa;
                                    echo "<option value='$row->id_predmeta;$row2->id_sklopa'>$ime</option>";
                                }
                            }
                        ?>
                    </select>
                    <br>

                    <button class="btn btn-default" type="submit" value="Generiraj vprasanje">Generiraj vprašanja</button>
                    
                </form>
            </div>

            <!-- Sekcija za odgovore -->
            <div class="col-md-9 vprasanja">
                <h1 class="naslov">Sekcija za odgovore</h1>
                <div class="col-md-6 odgovori1">
                <?php if(isset($vprasanje0)){
                    echo $vprasanje0;
                ?>
                <p id="odgovor1"></p>
                <button class="btn btn-default" onclick="pokaziOdgovor1('<?php echo $odgovor0; ?>')">Pokaži odgovor</button>
                <?php
                }else{
                    echo "Vprasanje 1";
                }
                ?>
                </div>
                <div class="col-md-6 odgovori2">
                <?php if(isset($vprasanje1)){
                    echo $vprasanje1;
                ?>
                <p id="odgovor2"></p>
                <button class="btn btn-default" onclick="pokaziOdgovor2('<?php echo $odgovor1; ?>')">Pokaži odgovor</button>
                <?php
                }else{
                    echo "Vprasanje 2";
                }
                ?>
                </div>
                <div class="col-md-6 odgovori3">
                <?php if(isset($vprasanje2)){
                    echo $vprasanje2;
                ?>
                <p id="odgovor3"></p>
                <button class="btn btn-default" onclick="pokaziOdgovor3('<?php echo $odgovor2; ?>')">Pokaži odgovor</button>
                <?php
                }else{
                    echo "Vprasanje 3";
                }
                ?>

                
                </div>
                <div class="col-md-6 odgovori4">
                <?php if(isset($vprasanje3)){
                    echo $vprasanje3;
                ?>
                <p id="odgovor4"></p>
                <button class="btn btn-default" onclick="pokaziOdgovor4('<?php echo $odgovor3; ?>')">Pokaži odgovor</button>
                <?php
                }else{
                    echo "Vprasanje 4";
                }
                ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Noga spletne strani -->
    <footer>Avtor: Žan Jurečič, Jaša Jovan; mentor: doc. dr. Uroš Ocepek; 2018 - Srednja tehniška in poklicna šola Trbovlje</footer>
    <script>
        function pokaziOdgovor1(odgovor){
            document.getElementById("odgovor1").innerHTML = odgovor;
        }

        function pokaziOdgovor2(odgovor){
            document.getElementById("odgovor2").innerHTML = odgovor;
        }

        function pokaziOdgovor3(odgovor){
            document.getElementById("odgovor3").innerHTML = odgovor;
        }

        function pokaziOdgovor4(odgovor){
            document.getElementById("odgovor4").innerHTML = odgovor;
        }
    </script>
</body>
</html>