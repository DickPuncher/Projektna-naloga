<!DOCTYPE html>
<html>
<head>
<title>Ustno spraševanje</title>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/upravljanje.css">
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
                    <form action="vnesi_vprasanje" method="POST">
                        <select name="predmet">
                        <!-- PHP za predmete -->
                        <?php 
                            $query = $this->db->query("SELECT * FROM predmeti");
                            foreach ($query->result() as $row){
                                echo "<option value='$row->id_predmeta'>$row->ime_predmeta</option>";
                            }
                        ?>
                        </select>
                        <br>
                        <select name="sklop">
                            <?php 
                                $query = $this->db->query("SELECT * FROM sklopi");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->id_sklopa'>$row->ime_sklopa</option>";
                                }
                            ?>
                        </select>
                        <br>
                        <br>
                        Vprašanje
                        <input  class="vnesi" type="textarea" name="vprasanje" style="margin-left:10px;">
                        <br>
                        Odgovor
                        <input class="vnesi" type="textarea" name="odgovor" style="margin-left:20px;">
                        <br>
                        Točke
                        <input class="vnesi" type="text" name="tocke" style="margin-left:35px;">
                        <br>
                        <button type="submit" class="btn btn-default" value="Dodaj vprasanje" style="margin-left:75px;">Dodaj vprašanje </button>
                    </form>
                </div>
                <div class="col-md-4 odgovori2">
                    <h3>Dodaj predmet</h3>
                    <form action="vnesi_predmet" method="POST">
                        <input class="vnesi" type="text" name="predmet">
                        <br>
                        <button  class="btn btn-default" type="submit" value="Dodaj predmet">Dodaj predmet </button>
                    </form>
                </div>

                <div class="col-md-4 odgovori2">
                    <h3>Dodaj sklop</h3>
                    <form action="vnesi_sklop" method="POST">
                        <input class="vnesi" type="text" name="sklop">
                        <br>
                        <button   class="btn btn-default" type="submit" value="Dodaj sklop">Dodaj sklop</button>
                    </form>
                </div>
                
                <div class="col-md-4 odgovori5">
                    <h3>Odstrani vprašanje</h3>
                    <form action="odstrani_vprasanje" method="POST">
                        <select name="vprasanje">
                            <?php 
                                $query = $this->db->query("SELECT * FROM vprasanja");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->id_vprasanja'>$row->vprasanje</option>";
                                }
                            ?>
                        </select>
                        <button  class="btn btn-default" type="submit" value="Odstrani vprasanje">Odstrani vprašanje</button>
                    </form>
                                <h3>Spremeni vprašanje</h3>
                    <form action="spremeni_vprasanje" method="POST">

                    <select name="id_vprasanja">
                            <?php 
                                $query = $this->db->query("SELECT * FROM vprasanja ORDER BY id_predmeta ASC;");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->id_vprasanja'>$row->vprasanje</option>";
                                }
                            ?>
                        </select>
                        <br>
                        Vprašanje
                        <input class="vnesi" type="textarea" name="vprasanje" style="margin-left:10px;">
                        <br>
                        Odgovor
                        <input class="vnesi" type="textarea" name="odgovor" style="margin-left:20px;">
                        <br>
                        Točke
                        <input class="vnesi" type="text" name="tocke" style="margin-left:35px;">
                        <br>
                        <button  class="btn btn-default" type="submit" value="Spremeni vprašanje" style="margin-left:75px;" name="spremeni">Spremeni vprašanje  </button>
                    </form>




                </div>
                <div class="col-md-4 odgovori4">
                    <h3>Odstrani predmet</h3>
                    <form action="odstrani_predmet" method="POST">
                        <select name="predmet">
                            <?php 
                                $query = $this->db->query("SELECT * FROM predmeti");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->id_predmeta'>$row->ime_predmeta</option>";
                                }
                            ?>
                        </select>
                        <button  class="btn btn-default" type="submit" value="Odstrani predmet">Odstrani predmet</button>
                    </form>
                </div>
                <div class="col-md-4 odgovori4">
                    <h3>Odstrani sklop</h3>
                    <form action="odstrani_sklop" method="POST">
                        <select name="sklop">
                            <?php 
                                $query = $this->db->query("SELECT * FROM sklopi");
                                foreach ($query->result() as $row){
                                    echo "<option value='$row->id_sklopa'>$row->ime_sklopa</option>";
                                }
                            ?>
                        </select>
                        <button  class="btn btn-default" type="submit" value="Odstrani sklop">Odstrani sklop</button>
                    </form>


                   







                </div>
            </div>
        </div>
    </div>

    <!-- Noga spletne strani -->
    <footer>Avtor: Žan Jurečič, Jaša Jovan; mentor: doc. dr. Uroš Ocepek; 2018 - Srednja tehniška in poklicna šola Trbovlje</footer>
</body>
</html>