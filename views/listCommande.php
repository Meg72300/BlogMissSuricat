<a href="./index.php?action=listCommande">Ajouter</a>
<table>
  <thead>
    <th>Id du client</th>
    <th>Id de la commande</th>
    <th>Référence</th>
    <th>date de commande</th>
    <th>date d'expédition</th>
    <th>statut</th>
  </thead>
  <tbody>
    <?php
    foreach ($listeCommande as $commande) {
      echo '<tr>';
      echo '<td>' . $commande->getIdClient() . '</td>';
      echo '<td>' . $commande->getIdCommande() . '</td>';
      echo '<td>' . $commande->getRef() . '</td>';
      echo '<td>' . $commande->getDateCommande() . '</td>';
      echo '<td>' . $commande->getDateExpedition() . '</td>';
      echo '<td>' . $commande->getLibelle() . '</td>';
      echo '</tr>'; 
    }
    ?>
  </tbody>
</table>
<!-- Afficher ici le message d'erreur ou de confirmation lors d'une suppression -->
<label><?php if(isset($message)) echo $message ?></label>