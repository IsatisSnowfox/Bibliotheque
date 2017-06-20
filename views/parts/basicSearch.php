<form action="index.php" method="get">
    <label for="search">Rechercher un livre par son titre</label>
    <input type="text" id="search" name="title">

    <input type="hidden" name="action" value="search">
    <input type="hidden" name="resource" value="Book">

    <button type="submit">Rechercher</button>
</form>
<a href="index.php?resource=Page&action=advancedSearch" title="Aller sur la page de recherche avancée">Recherche avancée</a>
