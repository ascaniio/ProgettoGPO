document.getElementById('addForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Previeni l'invio tradizionale del form
    
    // Crea un oggetto FormData per raccogliere i dati del form
    const formData = new FormData(this);

    // Invia i dati tramite fetch al file PHP
    fetch('DataBase/aggiungi_utente.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes('Salvato con successo!')) {
           
            // Chiudi il modal
            var myModalEl = document.getElementById('addModal');
            var modal = bootstrap.Modal.getInstance(myModalEl);
            modal.hide();
            // Resetta il form
            document.getElementById('addForm').reset();
        } else {
            alert('Errore nell\'inserimento: ' + data);
        }
    })
    .catch(error => {
        console.error('Errore:', error);
        alert('Si è verificato un errore durante l\'invio dei dati.');
    });
});






$(".deleteButton").click(function() {
    selectedUsername = $(this).data("username");
    console.log("Username selezionato per eliminazione:", selectedUsername);
    $("#deleteUsername").text(selectedUsername);
});


$(document).ready(function() {
    let selectedUsername = ""; // Variabile per memorizzare l'utente selezionato

    // Quando si clicca su "Elimina" si apre il modal e si salva l'username
    $(".deleteButton").click(function() {
        selectedUsername = $(this).data("username");
        $("#deleteUsername").text(selectedUsername);
    });

    // Quando si conferma l'eliminazione
    $("#confirmDelete").click(function() {
        $.ajax({
            url: "DataBase/elimina_utente.php",
            type: "POST",
            data: { username: selectedUsername },
            dataType: "json",
            success: function(response) {
                console.log("Risposta del server:", response); // Debug
    
                if (response.success) {
                    $("#row_" + selectedUsername).remove();
    
                    // Usa Bootstrap Modal API per chiudere il modal
                    let deleteModal = document.getElementById("deleteModal");
                    let modalInstance = bootstrap.Modal.getInstance(deleteModal); 
                    
                    // Chiude il modal
                    if (modalInstance) {
                        modalInstance.hide();
                    }
                } else {
                    alert("Errore: " + response.message);
                }
            },
            error: function() {
                alert("Si è verificato un errore.");
            }
        });
    });
});





