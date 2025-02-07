// Importa il client Supabase
import { createClient } from 'https://esm.sh/@supabase/supabase-js'

// Inizializza il client Supabase
const supabaseUrl = 'https://your-supabase-url.supabase.co'
const supabaseKey = 'your-supabase-anon-key' // Usa la chiave anonima
const supabase = createClient(supabaseUrl, supabaseKey)

// Funzione per gestire l'invio del form
async function submitForm(event) {
    event.preventDefault();

    const name = document.getElementById('name').value;
    const description = document.getElementById('description').value;
    const photo = document.getElementById('photo').value;
    const price = parseFloat(document.getElementById('price').value);
    const available = document.getElementById('available').value === 'true';
    const category = document.getElementById('category').value;

    const { data, error } = await supabase
        .from('menu_items')
        .insert([
            { name, description, photo, price, available, category }
        ]);

    if (error) {
        console.error('Errore durante l\'inserimento:', error);
        alert('Si è verificato un errore durante l\'inserimento del piatto.');
    } else {
        console.log('Piatto inserito con successo:', data);
        alert('Piatto inserito con successo!');
        document.getElementById('form').reset();
    }
}

// Collega la funzione submitForm al form
document.getElementById('form').addEventListener('submit', submitForm);