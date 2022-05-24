<?php
    require_once('../dbConfig.php');
    require_once('identifier.php');
?>
		
<!-- A grey horizontal navbar that becomes vertical on small screens -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark navbar-inverse">
    <div class="container">
        <div class="navbar-header">
			<a href="dashboard.php" class="navbar-brand">Dashboard</a>
		</div>
        
        <!-- Links -->
        <ul class="nav navbar-nav">	
            <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
                    Utilisateurs
                </a>
            </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">	
            <!-- <li>
				<a href="editUser.php?idUser=<?php echo $_SESSION['user']['iduser'] ?>"> 
                <a href="">
                    <i class="fa fa-user-circle-o"></i>
					<?php echo  ' '.$_SESSION['user']['login']?>
				</a> 
			</li> -->
            
            <li class="nav-item">
                <a href="logout.php" class="nav-link">
                    <span class="glyphicon glyphicon-log-in"></span> Se déconnecter  	
                </a>
            </li>			
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" id="search_user" aria-label="Search" placeholder="Rechercher ...">
        </form>
    </div>
</nav>