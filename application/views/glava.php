<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <img src="<?php echo base_url(); ?>slike/logo.png" style="height: 50px;">
        </div>
        <div class="navbar-header">
            <a class="navbar-brand razmik-brand" href="#">Ustno Spraševanje</a>
        </div>
        <ul class="nav navbar-nav razmik-nav">
            <li><a href="<?php echo base_url();?>index.php/glavna/domov">Domov</a></li>
            <?php 
            if(isset($_SESSION['prijavljen'])){
                echo "<li><a href='".base_url()."glavna/sprasevanje'>Spraševanje</a></li>";
                if(isset($_SESSION['admin'])){
                    echo "<li><a href='".base_url()."glavna/upravljanje'>Upravljanje</a></li>";
                }
                echo "<li><a href='".base_url()."glavna/odjava'>Odjava</a></li>";
            }
            else{
                
                echo "<li><a href='".base_url()."glavna/registracija'>Registracija</a></li>";
                echo "<li><a href='".base_url()."glavna/prijava'>Prijava</a></li>";
            }
            ?>
        </ul>
    </div>
</nav>