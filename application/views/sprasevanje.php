<!DOCTYPE html>
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
                <h1>Generiraj vprašanja</h1>
                <h3>Pozdravljen <?php echo $_SESSION['upor_ime'];?></h3>
                <form action="" method="POST">
                    <?php
                    $query = $this->db->query("SELECT * FROM predmeti ORDER BY ime_predmeta");
                        $options = array();
                        foreach ($query->result() as $row){
                            $options[$row->id_predmeta] = $row->ime_predmeta;
                        }
                    
                        echo form_dropdown('predmet', $options, $query->result()[0]->id_predmeta);
                    ?>
                    <button class="btn btn-default" name="izberi_sklop" type="submit" value="Generiraj vprasanje">Izberi sklop</button>
                </form>
                
                <form action="" method="POST">
                    <?php
                        if(isset($sklopi)){
                            $options2 = array();
                            foreach ($sklopi as $sklop){
                                $options2[$sklop] = $sklop;
                            }
                        }
                        else{
                            $options2 = array();
                            $options2['1'] = 'Ni izbranega sklopa';
                        }
                        if(isset($id_predm)){
                            echo "<input type='hidden' name='predm' value='$id_predm'>";
                        }
                        echo form_dropdown('sklop', $options2, $query->result()[0]->id_predmeta);
                    ?>
                    <br>
                    <button class="btn btn-default" name="generiraj" type="submit" value="Generiraj vprasanje">Generiraj vprašanja</button>
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
        
        function submitForm(elem) {
          if (elem.value) {
              elem.form.submit();
          }
      }
    </script>
</body>