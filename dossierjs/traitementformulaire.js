document.addEventListener("DOMContentLoaded",function(){
    //formulaire ajout article a la liste
    document.getElementById("articleForm").addEventListener("submit", function(event){
        event.preventDefault();
        
    let formData=new FormData(this);

    fetch("../dossierphp/save_article.php",{
        method:"POST",
        body: formData
    })
    .then(response=>response.json())
    .then(data=>{
        let messageBox=document.getElementById("message");
        messageBox.textContent=data.message;
        messageBox.style.color=data.Success?"green":"red";
        if(data.success){
            this.reset();
        }
        })
        .catch(error=>console.error("Erreur:", error));
    
    });

    //formulaire ajout client ou fournisseur a la liste des client existant
    
    document.getElementById("Client-fournisseurForm").addEventListener("submit", function(event){
        event.preventDefault();
    let formData=new FormData(this);
    fetch("../dossierphp/save_CF.php",{
        method:"POST",
        body: formData
    })
    .then(response=>response.json())
    .then(data=>{
        let messageBox=document.getElementById("message");
        messageBox.textContent=data.message;
        messageBox.style.color=data.Success?"green":"red";
        if(data.success){
            this.reset();
        }
        })
        .catch(error=>console.error("Erreur:", error));
    });
    })
   