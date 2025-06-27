<?php   
    $erreurs=[];
    $data=[];
    if(isset($_SESSION['erreurs'])){
        $erreurs=$_SESSION['erreurs'];
        $data=$_SESSION['data'];
        unset($_SESSION['erreurs']);
        unset($_SESSION['data']);
    
}
?>

<div class="form-container">
    <div class="form-header">
        FORMULAIRE D'APPROVISIONNEMENT
    </div>

    <form action="index.php?controller=approvisionnement&action=create" method="post" enctype="multipart/form-data">
        <input type="hidden" name="action" value="create">
        <div class="form-row">
            <div class="form-group">
                <label for="article">fournisseur</label>
                <select id="articleconfection" name="articleconfection">
                        <option value="0" selected>Choose an fournisseur</option>
                        <?php foreach ($fournisseurs as $fournisseur) :?>
                            <option <?php  echo  isset($data['fournisseur']) && $fournisseur->getId()== $data['fournisseur']?'selected':'' ?> value="<?php echo $fournisseur->getId(); ?>"><?php echo $approvisionnement->getLibelle(); ?></option>
                        <?php endforeach?>
                    </select>
            </div>
        <div class="form-row">
            <div class="form-group">
                <label for="article">Articles</label>
                <select id="articleconfection" name="articleconfection">
                        <option value="0" selected>Choose an aticle</option>
                        <?php foreach ($articleConfections as $articleConfection) :?>
                            <option <?php  echo  isset($data['articleConfection']) && $articleConfection->getId()== $data['articleConfection']?'selected':'' ?> value="<?php echo $articleConfection->getId(); ?>"><?php echo $articleConfection->getLibelle(); ?></option>
                        <?php endforeach?>
                    </select>
                    <small id="helpId" class="form-text text-danger"><?php echo $erreurs['articleConfection']??''?></small>
            </div>

            <div class="form-group">
                <label for="qteStock">Qte Appro</label>
                <input type="number" id="qteStock" name="qteStock"  value="<?php echo $data['qteStock']??'' ?>"  >
            </div>

            <div class="form-group">
                <label>&nbsp;</label>
                <button type="button" class="add-btn">Add</button>
            </div>
        </div>

        <button type="submit" class="save-btn">Save</button>
    </form>
</div>