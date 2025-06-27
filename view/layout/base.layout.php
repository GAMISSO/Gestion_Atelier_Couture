<?php

require_once "../view/layout/header.inc.php"

?>
            <div class="sidebar">
            <div class="list-menu">
                <div class="logo">
                    <img src="images/gestCout.png" alt="Logo"> <!-- Remplace par ton vrai logo -->
                </div>

                <!-- gestionnaire menu -->
                <?php if($_SESSION['user']['role']=='Admin'){
                    require_once "./../view/layout/gestionnaire.layout.php";
                }else if($_SESSION['user']['role']=='RS'){
                    require_once "./../view/layout/rs.layout.php";
                }else if($_SESSION['user']['role']=='RP'){
                    require_once "./../view/layout/rp.layout.php";
                }else {
                    require_once "./../view/layout/vendeur.layout.php";
                }
                ?>
            </div>
            <div class="profile">
                <img src="user.jpg" alt="Utilisateur"> <!-- Remplace par ta vraie image -->
                <div class="profile-info">
                    <div class="name"><?php echo $_SESSION['user']['username'] ?></div>
                    <div class="role"><?php echo $_SESSION['user']['role'] ?></div>
                </div>
            </div>
        </div>
        <div class="container-right-dashboard-gestionnaire">
            <div class="container-dash">
                <?php echo $view;?>
                
        <script src="js/all.js"></script>
</body>
</html>
