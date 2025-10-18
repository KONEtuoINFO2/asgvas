function modifierArticle(id) {
    fetch(`recuperer_article.php?id=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById("codearticle").value = data.codearticle;
            document.getElementById("libellearticle").value = data.libellearticle;
            document.getElementById("prixvente").value = data.prixvente;
            document.getElementById("dateappro").value = data.dateapprovisionnement;
            document.getElementById("popup").style.display = "block";
            document.getElementById("overlay").style.display = "block";

            // Modifier le bouton d'enregistrement pour envoyer une mise à jour
            document.getElementById("articleForm").addEventListener("submit", function(event) {
                event.preventDefault();
                let formData = new FormData(this);
                formData.append("id", id);

                fetch("modifier_article.php", {
                    method: "POST",
                    body: formData
                }).then(response => response.json())
                  .then(data => {
                      alert(data.message);
                      fermerPopup();
                      chargerArticles();
                  });
            });
        });
}
