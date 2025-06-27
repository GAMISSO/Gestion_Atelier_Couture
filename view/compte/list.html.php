<div class="top-bar">
    <a href="index.php?controller=compte&action=form"><button class="add-btn">Ajouter</button></a>
</div>



<table>
    <thead>
        <tr>
            <th>#</th>
            <th>DATE</th>
            <th>MONTANT</th>
            <th>FOURNISSEUR</th>
            <th>TELEPHONE</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($comptes as $compte):?>
        <tr>
            <td><?=$compte->getId()?></td>
            <td class="libelle">
                <div class="circle"></div>
                <div>
                    <div class="bold"><?=$compte->getNom()?></div>
                    <div><?=$compte->getPrenom()?></div>
                </div>
            </td>
            <td><?=$articleConfection->getQteStock()?></td>
            <td><?=$articleConfection->getLibelle()?></td>
            <td><?=$articleConfection->getCategorie()?></td>
            <td class="actions">
                <a href="#">Edit</a>
                <a href="#">Delete</a>
            </td>
        </tr>
        <?php endforeach?>
    </tbody>
</table>

<div class="pagination">
    <button>Précédent</button>
    <span class="active-page">1</span>
    <span>2</span>
    <button>Suivant</button>
</div>

