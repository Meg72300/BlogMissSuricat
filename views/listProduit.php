<a href="./index.php?action=formAddProduit">Ajouter</a>
<table>
  <thead>
    <th>Id du produit</th>
    <th>Réference</th>
    <th>Libelle</th>
    <th>Description</th>
    <th>Prix Unitaire</th>
    <th>Quantite</th>
  </thead>
  <tbody>
    <?php
    foreach ($listeProduit as $produit) {
      echo '<tr>';
      echo '<td>' . $produit->getIdProduit() . '</td>';
      echo '<td>' . $produit->getRef() . '</td>';
      echo '<td>' . $produit->getLibelle() . '</td>';
      echo '<td>' . $produit->getDescription() . '</td>';
      echo '<td>' . $produit->getPrixUnitaire() . '</td>';
      echo '<td>' . $produit->getQuantiteStock() . '</td>';
      echo '<td><a href="./index.php?action=formEditProduit&id=' . $produit->getIdProduit() . '"">Editer</a></td>';
      echo '<td><a href="./index.php?action=deleteProduit&id=' . $produit->getIdProduit() . '">Supprimer</a></td>';
      echo '</tr>'; 
    }
    ?>
  </tbody>
</table>
<!-- Afficher ici le message d'erreur ou de confirmation lors d'une suppression -->
<label><?php if(isset($message)) echo $message ?></label>