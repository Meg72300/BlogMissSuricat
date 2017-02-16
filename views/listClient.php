<a href="./index.php?action=formAddClient">Ajouter</a>
<table>
  <thead>
    <th>Id</th>
    <th>Civilité</th>
    <th>Nom</th>
    <th>Prénom</th>
    <th>Date de naissance</th>
    <th>Adresse</th>
    <th>Code Postal</th>
    <th>Ville</th>
    <th>Modifier</th>
    <th>Supprimer</th>
  </thead>
  <tbody>
    <?php
    foreach ($listeClients as $client) {
      echo '<tr>';
      echo '<td>' . $client->getId() . '</td>';
      echo '<td>' . $client->getCivilite() . '</td>';
      echo '<td>' . $client->getNom() . '</td>';
      echo '<td>' . $client->getPrenom() . '</td>';
      echo '<td>' . $client->getDateNaissance() . '</td>';
      echo '<td>' . $client->getAdresse() . '</td>';
      echo '<td>' . $client->getCp() . '</td>';
      echo '<td>' . $client->getVille() . '</td>';
      echo '<td><a href="./index.php?action=formEditClient&id=' . $client->getId() . '"">Editer</a></td>';
      echo '<td><a href="./index.php?action=deleteClient&id=' . $client->getId() . '">Supprimer</a></td>';
      echo '</tr>';  
    }
    ?>
  </tbody>
</table>
<!-- Afficher ici le message d'erreur ou de confirmation lors d'une suppression -->
<label><?php if(isset($message)) echo $message ?></label>