console.log("tuo nalourgo");
document.addEventListener('DOMContentLoaded', () => {
  //ouverture du popup vente
  let popupOuvert=null;
document.getElementById('open-Popup-vente').addEventListener('click', function() {
    const idpopup='popup-overlay';
    if(popupOuvert && popupOuvert !==idpopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }
        document.getElementById(idpopup).style.display = 'block';
        popupOuvert=idpopup;
    
});
//fermeture du popup vente
document.getElementById('close-popup').addEventListener('click', function() {
   document.getElementById('popup-overlay').style.display = 'none';
   location.reload();   
});

//ouverture du popup approvisionnement
document.getElementById('open-Popup-approv').addEventListener('click', function() {
    const idpopup='popup-overlayapprov';
    if(popupOuvert && popupOuvert !==idpopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }
        document.getElementById(idpopup).style.display = 'block';
        popupOuvert=idpopup;
    
});
//fermeture du popup approvisionnement
document.getElementById('close-popupapprov').addEventListener('click', function() {
   document.getElementById('popup-overlayapprov').style.display = 'none';
   location.reload();
});
//ouverture du popup achat
document.getElementById('open-Popup-achat').addEventListener('click', function() {
    const idpopup='popup-overlayachat';
    if(popupOuvert && popupOuvert !==idpopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }
        document.getElementById(idpopup).style.display = 'block';
        popupOuvert=idpopup; 
});
 //fermeture du popup achat
        document.getElementById('close-popupachat').addEventListener('click', function() {
        document.getElementById('popup-overlayachat').style.display = 'none';
        location.reload();
 });

 //ouverture du popup CLIENT FOURNISSEUR
document.getElementById('open-Popup-CF').addEventListener('click', function() {
    const idpopup='popup-overlay-CF';
    if(popupOuvert && popupOuvert !==idpopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }
        document.getElementById(idpopup).style.display = 'block';
        popupOuvert=idpopup;
    
});
//fermeture du popup client fournisseur
document.getElementById('close-popupCF').addEventListener('click', function() {
   document.getElementById('popup-overlay-CF').style.display = 'none';
   location.reload();
});

//ouverture du popup utilisateur
document.getElementById('open-Popup-user').addEventListener('click', function() {
    const idpopup='popup-overlay-user';
    if(popupOuvert && popupOuvert !==idpopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }
        document.getElementById(idpopup).style.display = 'block';
        popupOuvert=idpopup;
    
});
//fermeture du popup utilisateur
document.getElementById('close-popupuser').addEventListener('click', function() {
   document.getElementById('popup-overlay-user').style.display = 'none';
   location.reload();
});
 

 //FIN DES POPUP PRINCIPAUX

 //js des sous popup
 //ouverture du souspopup formulaire de vente
let souspopup=null
document.getElementById('open-Popup-ajouter').addEventListener('click', function(){
    const idSubPopup='popup-Ajout';
    if(souspopup && souspopup!==idSubPopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }else{
        document.getElementById(idSubPopup).style.display="block";

        souspopup=idSubPopup;
    }
});
//fermeture du soup popup vente
    document.getElementById('close-popupform').addEventListener('click', function() {
    document.getElementById('popup-Ajout').style.display = 'none';   
});

//ouverture du sous popup de approvisionnement
document.getElementById('open-Popup-ajouter-aprov').addEventListener('click',function(){
    const idSubPopup='popup-Ajout-aprov';
    if(souspopup && souspopup !==idSubPopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }else{
        document.getElementById(idSubPopup).style.display="block";
        souspopup=idSubPopup;
    }
})
//fermeture du soup popup aprovisionnement
document.getElementById('close-popupformaprov').addEventListener('click', function() {
    document.getElementById('popup-Ajout-aprov').style.display = 'none';   
});

//ouverture du sous popup de achat
document.getElementById('open-Popup-ajouter-achat').addEventListener('click',function(){
    const idSubPopup='popup-Ajoutachat';
    if(souspopup && souspopup !==idSubPopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }else{
        document.getElementById(idSubPopup).style.display="block";
        souspopup=idSubPopup;
    }
})
//fermeture du soup popup achat
document.getElementById('close-popupformachat').addEventListener('click', function() {
    document.getElementById('popup-Ajoutachat').style.display = 'none';   
});

//ouverture du sous popup de CLIENT FOURNISSEUR
document.getElementById('open-Popup-ajouter-CF').addEventListener('click',function(){
    const idSubPopup='popup-Ajout-CF';
    if(souspopup && souspopup !==idSubPopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }else{
        document.getElementById(idSubPopup).style.display="block";
        souspopup=idSubPopup;
    }
})
//fermeture du soup popup CLIENT FOURNISSEUR
document.getElementById('close-popupformCF').addEventListener('click', function() {
    document.getElementById('popup-Ajout-CF').style.display = 'none';   
});

//ouverture du sous popup de UTILISATEUR
document.getElementById('open-Popup-ajouter-user').addEventListener('click',function(){
    const idSubPopup='popup-Ajout-user';
    if(souspopup && souspopup !==idSubPopup){
        alert("veuillez fermer la fénêtre actuelle avant d'en ouvrir une autre !");
        return;
    }else{
        document.getElementById(idSubPopup).style.display="block";
        souspopup=idSubPopup;
    }
})
//fermeture du soup popup UTILISATEUR
document.getElementById('close-popupformuser').addEventListener('click', function() {
    document.getElementById('popup-Ajout-user').style.display = 'none';   
});
});


