<!DOCTYPE html>
<head>
<title>Ustno spraševanje</title>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/upravljanje3.css">
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
            <!-- Sekcija za odgovore -->
            <div class="col-md-12 vprasanja">
                <h1 class="naslov">Upravljanje</h1>
                <div class="col-md-4 odgovori1">
                    
                    <h3>Dodaj vprašanje</h3>
                    <form action="" method="POST">
                    <?php
                    $query = $this->db->query("SELECT * FROM predmeti ORDER BY ime_predmeta");
                        $options = array();
                        foreach ($query->result() as $row){
                            $options[$row->id_predmeta] = $row->ime_predmeta;
                        }
                    
                        echo form_dropdown('predmet', $options, $query->result()[0]->id_predmeta,  "class='form-control' id='sel1' style=width:60%;");
                    ?>
                    <br>
                    <button class="btn btn-default" name="izberi_sklop" type="submit" value="Generiraj vprasanje">Izberi sklop</button>
                </form>
                
                <br>
                <form action="vnesi_vprasanje" method="POST">
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
                        echo form_dropdown('sklop', $options2, $query->result()[0]->id_predmeta, "class='form-control' id='sel1' style=width:60%;");
                        
                    ?>
                    
                   
                        <input  class="vnesi form-control" type="textarea" name="vprasanje" placeholder="Vprašanje" >
                        
                        
                        <input class="vnesi form-control"  type="textarea" name="odgovor" placeholder="Odgovor" >
                     
                        
                        <input class="vnesi form-control" type="text" name="tocke" placeholder="Točke" >
                       <br>
                        <button type="submit" class="btn btn-default" name="dodaj" value="Dodaj vprasanje">Dodaj vprašanje</button>
                    <br>
                </form>
                        <br>
                    </form>
                </div>
                <div class="col-md-4 odgovori2">
                    <h3>Dodaj predmet</h3>
                    <form action="vnesi_predmet" method="POST">
                        <input class="vnesi form-control" type="text" name="predmet">
                        <br>
                        <button  class="btn btn-default" type="submit" value="Dodaj predmet">Dodaj predmet </button>
                    </form>
                </div>

                <div class="col-md-4 odgovori2">
                    <h3>Dodaj sklop</h3>
                    <form action="vnesi_sklop" method="POST">
                        <select name="id_predmeta" class='form-control' id='sel1' style=width:60%;>
                        <!-- PHP za predmete -->
                        <?php 
                            $query = $this->db->query("SELECT * FROM predmeti");
                            foreach ($query->result() as $row){
                                echo "<option value='$row->id_predmeta'>$row->ime_predmeta</option>";
                            }
                        ?>
                        </select>
                        <input class="vnesi form-control" type="text" name="ime_sklopa" style=width:60%;>
                        <br>
                        <button class="btn btn-default" type="submit" value="Dodaj sklop">Dodaj sklop</button>
                    </form>
                </div>
                
                <div class="col-md-4 odgovori5">
                    <h3>Odstrani vprašanje</h3>
                    <form action="odstrani_vprasanje" method="POST">
                        <select name="vprasanje" class='form-control' id='sel1' style=width:60%;>
                            <?php 
                                $query = $this->db->query("SELECT * FROM vprasanja");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->id_vprasanja'>$row->vprasanje</option>";
                                }
                            ?>
                        </select>
                        <br>
                        <button  class="btn btn-default" type="submit" value="Odstrani vprasanje">Odstrani vprašanje</button>
                    </form>
                    <h3>Spremeni vprašanje</h3>
                    <form action="spremeni_vprasanje" method="POST">

                    <select name="id_vprasanja" class='form-control' id='sel1' style=width:60%;>
                            <?php 
                                $query = $this->db->query("SELECT * FROM vprasanja ORDER BY id_predmeta ASC;");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->id_vprasanja'>$row->vprasanje</option>";
                                }
                            ?>
                        </select>
                        
                        
                        <input class="vnesi form-control" type="textarea" name="vprasanje"   placeholder="Vprašanje">
                        
                        
                        <input class="vnesi form-control" type="textarea" name="odgovor" placeholder="Odgovor" >
                      
                        
                        <input class="vnesi form-control" type="text" name="tocke"  placeholder="Točke">
                        <br>
                        <button  class="btn btn-default" type="submit" value="Spremeni vprašanje" name="spremeni">Spremeni vprašanje  </button>
                    </form>




                </div>
                <div class="col-md-4 odgovori4">
                    <h3>Odstrani predmet</h3>
                    <form action="odstrani_predmet" method="POST">
                        <select name="predmet" class='form-control' id='sel1' style=width:60%;>
                            <?php 
                                $query = $this->db->query("SELECT * FROM predmeti");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->id_predmeta'>$row->ime_predmeta</option>";
                                }
                            ?>
                        </select>
                        <br>
                        <button  class="btn btn-default" type="submit" value="Odstrani predmet">Odstrani predmet</button>
                    </form>
                </div>
                <div class="col-md-4 odgovori4">
                    <h3>Odstrani sklop</h3>
                    <form action="odstrani_sklop" method="POST">
                        <select name="sklop" class='form-control' id='sel1' style=width:60%;>
                            <?php 
                                $query = $this->db->query("SELECT * FROM sklopi");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->id_sklopa'>$row->ime_sklopa</option>";
                                }
                            ?>
                        </select>
                        <br>
                        <button  class="btn btn-default" type="submit" value="Odstrani sklop">Odstrani sklop</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Noga spletne strani -->
    <footer>Avtor: Žan Jurečič, Jaša Jovan; mentor: doc. dr. Uroš Ocepek; 2018 - Srednja tehniška in poklicna šola Trbovlje</footer>
</body>
    
<script>
    function onSelectChange() {
    var value = document.getElementById("predmet").value;
    if ((value == 'fotografia') || (value == 'filmagem')) {
        document.getElementById('equipamento').style.display = 'block';
    } else {
        document.getElementById('equipamento').style.display = 'none';
    }
}
</script>
