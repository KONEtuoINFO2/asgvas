function supprimerArticle(ID_Article) {
    if (confirm("Voulez-vous vraiment supprimer cet article ?")) {
        console.log(ID_Article);
        fetch(`supprimer_article.php?ID_Article=1`, {
            method: "GET"
        }).then(response => response.json())
          .then(data => {
              alert(data.message);
              chargerArticles(); // Recharge le tableau après suppression
          });
    }
}