// Empty data for demonstration purposes
const emptyData = {
    labels: ["January", "February", "March", "April", "May", "June", "July", "August", "Negri"],
    values: [8, 4, 1, 0, 0, 2, 5, 1, 3]
};

// Populate Revenue Chart
const revenueCtx = document.getElementById('revenueChart').getContext('2d');
new Chart(revenueCtx, {
    type: 'line',
    data: {
        labels: emptyData.labels,
        datasets: [{
            label: 'Daily Revenue',
            data: emptyData.values,
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
        }
    }
});

// Populate Popular Dishes Chart
const dishesCtx = document.getElementById('popularDishesChart').getContext('2d');
new Chart(dishesCtx, {
    type: 'pie',
    data: {
        labels: ["Dish 1", "Dish 2", "Dish 3", "Dish 4"],
        datasets: [{
            label: 'Dishes Ordered',
            data: [0, 0, 0, 0],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
        }
    }
});




function generaTavoli(numeroTavoli) {
    const container = document.getElementById("tavoli-container");
    container.innerHTML = ""; // Svuota il contenitore prima di generare nuovi tavoli

    // Ottiene la larghezza disponibile del contenitore
    const containerWidth = container.parentElement.clientWidth; 
    const maxColumns = 8; // Numero massimo di colonne
    const minColumns = 2; // Numero minimo di colonne

    // Trova il numero ottimale di colonne (più vicino a una disposizione quadrata)
    let columns = Math.floor(Math.sqrt(numeroTavoli)); 
    columns = Math.min(Math.max(columns, minColumns), maxColumns); // Mantiene il numero entro i limiti

    // Calcola la dimensione ottimale dei bottoni in base alla larghezza disponibile
    const buttonSize = Math.floor(containerWidth / columns) - 10; // -10px per il gap

    // Imposta la griglia dinamica
    container.style.gridTemplateColumns = `repeat(${columns}, 1fr)`;

    // Crea i bottoni
    for (let i = 0; i < numeroTavoli; i++) {
        const button = document.createElement("button");
        button.className = "table-button";
        button.style.width = `${buttonSize}px`;
        button.style.height = `${buttonSize}px`; // Mantiene il bottone quadrato
        button.textContent = `Tavolo ${i + 1}`;

        container.appendChild(button);
    }
}

// Esempio: genera 16 tavoli
window.addEventListener("resize", () => generaTavoli(16)); // Aggiorna la disposizione quando si ridimensiona la finestra
generaTavoli(100); // Inizializza




document.addEventListener("DOMContentLoaded", function () {
    const navLinks = document.querySelectorAll("#sidebarNav .nav-link");
    const activePage = localStorage.getItem("activePage") || "home"; // Default: Home

    function updateActivePage(target) {
        // Rimuove la classe active da tutti i link
        navLinks.forEach(link => link.classList.remove("active"));

        // Attiva il link corretto
        const activeLink = document.querySelector(`[data-target="${target}"]`);
        if (activeLink) {
            activeLink.classList.add("active");
        }

        // Mostra il contenuto corrispondente e nasconde gli altri
        document.querySelectorAll(".content-section").forEach(section => {
            section.style.display = section.id === target ? "block" : "none";
        });

        // Salva la pagina attiva
        localStorage.setItem("activePage", target);
    }

    // Inizializza la pagina attiva al caricamento
    updateActivePage(activePage);

    // Aggiunge il listener per cambiare la scheda
    navLinks.forEach(link => {
        link.addEventListener("click", function (event) {
            event.preventDefault(); // Evita il comportamento predefinito

            const target = this.getAttribute("data-target");
            updateActivePage(target);
        });
    });

    // Funzione per aprire il selettore di file
    window.uploadImage = function () {
        const uploadInput = document.getElementById("uploadInput");
        uploadInput.click();
    };

    // Funzione per aggiornare l'immagine del profilo
    window.previewProfileImage = function (event) {
        const input = event.target;
        const profileImage = document.getElementById("profileImage");

        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                profileImage.src = e.target.result;
            };
            reader.readAsDataURL(input.files[0]);
        }
    };

    document.getElementById("toggleSidebar").addEventListener("click", function () {
        const sidebar = document.getElementById("mainSidebar");
        sidebar.classList.toggle("sidebar-collapsed");

        // Cambia l'icona del pulsante
        this.querySelector("ion-icon").name = sidebar.classList.contains("sidebar-collapsed")
            ? "chevron-forward-outline"
            : "chevron-back-outline";
    });

    // Funzione per reimpostare l'immagine predefinita
    window.removeImage = function () {
        const profileImage = document.getElementById("profileImage");
        profileImage.src = "img/npp.jpg"; // Percorso dell'immagine di default
    };

    // Prevenzione del comportamento predefinito (se usi un form)
    document.querySelector("form").addEventListener("submit", function (e) {
        e.preventDefault(); // Previene il ricaricamento della pagina
    });

    // JavaScript per la gestione della navigazione
    const links = document.querySelectorAll("#sidebarNav .nav-link");
    const sections = document.querySelectorAll(".content-section");

    links.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault();

            // Rimuove la classe active dai link e dalle sezioni
            links.forEach(l => l.classList.remove("active"));
            sections.forEach(section => section.classList.remove("active"));

            // Aggiunge la classe active al link e alla sezione corrispondente
            this.classList.add("active");
            const targetId = this.getAttribute("data-target");
            document.getElementById(targetId).classList.add("active");
        });
    });
});

let imgBox = document.getElementById("imgBox");
let qrImage = document.getElementById("qrImage");
let qrText = document.getElementById("qrText");

function generaQR() {
    if (qrText.value.trim().length > 0) {
        qrImage.src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=" + encodeURIComponent(qrText.value);
        imgBox.classList.add("show-img");
    } else {
        qrText.classList.add("error");
        setTimeout(() => {
            qrText.classList.remove("error");
        }, 1000);
    }
}
