document.addEventListener("DOMContentLoaded",function(){
    document.getElementById("authenForm").addEventListener("submit",function(event){
        event.preventDefault();
        let formData=new FormData(this);
        console.log("Données envoyées :", formData);

        fetch("http://localhost/APGSVA2025JS/dossierphp/menu.php",{
            method:"POST",
            body:formData
        })
        .then(response => response.json())
        .then(data=>{
            let messageBox=document.getElementById("message");
            messageBox.textContent=data.message;
            messageBox.style.color=data.Success?"green":"red";
        })
        .catch(error=>console.error("Erreur:",error));
    });
        //creation du bouton s'inscrire
        document.getElementById("inscriptionBtn").addEventListener("click",function(event){
            event.preventDefault();
           let user = document.getElementById("login").value;
            let password = document.getElementById("mdp").value;

           if (!user || !password) {
             alert("Veuillez remplir tous les champs !");
            return;
            }

                let formData=new FormData();
                formData.append("login", user);
                formData.append("mdp", password);
                console.log("Données envoyées :", formData);


               fetch("http://localhost/APGSVA2025JS/dossierphp/inscription.php", {
    method: "POST",
    mode: "cors",
    body: formData
})
.then(response => response.json())
.then(data => console.log("Réponse du serveur :", data))
.catch(error => console.error("Erreur :",error));
})
        })