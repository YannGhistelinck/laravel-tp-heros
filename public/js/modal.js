let modalId = null

function openModal(id) {
    document.getElementById("modal"+id).style.display = "block";
    modalId = id
    
}

// Fonction pour fermer la modale
function closeModal() {
    document.getElementById("modal"+modalId).style.display = "none";
    modalID = null
}


// Fermer la modale si l'utilisateur clique en dehors de celle-ci
window.onclick = function(event) {
    var modal = document.getElementById("modal"+modalId);
    
    if (event.target === modal) {
        closeModal();
    }
    
}
