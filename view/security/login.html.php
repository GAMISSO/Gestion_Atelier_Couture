<?php
$erreurs=[];
if(isset($_SESSION['erreurs'])){
    $erreurs=$_SESSION['erreurs'];
    unset($_SESSION['erreurs']);
}


?>

    

    <div class="ContentRight">
        <div class="FormConnexion">
            <div class="logoConexion">
                <img src="images/gestCout.png" alt="">
            </div>
            <form class="FormOfConexion" action="index.php" method="post">
                <input type="hidden" name="action" value="login">
                <input type="hidden" name="controller" value="security"/>
                <h4>Connectez-vous</h4>
                <div>
                    <small id="helpId" class="form-text text-danger"><?php echo $erreurs['connexion']??''?></small>
                </div>
                <div class="NormalConnexion">
                    <label for="text">username</label>
                    <small id="helpId" class="form-text text-danger"><?php echo $erreurs['login']??''?></small>
                    <div class="email-container">
                        <input type="text" id="text" placeholder="Input username" name="login">
                        <!-- <button class="toggle-email" >
                            <i class="fa-regular fa-eye-slash" id="eyeIcon"></i>
                        </button> -->
                    </div>
                    <label for="password" class="password" >Password</label>
                    <small id="helpId" class="form-text text-danger"><?php echo $erreurs['password']??''?></small>
                    <div class="password-container">
                        <input type="password" id="password" placeholder="Input password" name="password">
                        <!-- <button class="toggle-password" onclick="togglePassword()">
                            <i class="fa-regular fa-eye-slash" id="eyeIcon"></i>
                        </button> -->
                    </div>
                    

                </div>
                <div class="connexion-button-final">
                    <a href="">
                        <button type="submit">Connexion</button>
                    </a>
                </div>
            </form>
        </div>
    </div>
    
</body>
</html>