<?php
    require_once('../identifier.php');
    require_once('../dbConfig.php');
?>
		
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-inverse">
    <div class="container">
        <div class="navbar-header">
			<a href="../home.php" class="navbar-brand">Dashboard</a>
		</div> -->
        
        <!-- Links -->
        <!-- <ul class="nav navbar-nav">	
            <li class="nav-item">
                <a href="../galerie/galerie.php" class="nav-link">
                    Galerie
                </a>
            </li>
        </ul> -->
        <ul class="nav navbar-nav navbar-right">	
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="glyphicon glyphicon-log-in"></span> Se déconnecter  	
                </a>
            </li>			
        </ul>
    </div>
</nav>