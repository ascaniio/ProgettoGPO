// api/inserisci_piatti/route.tsx
import { supabase } from '@/lib/server';

export async function POST(request: Request) {
  const { name, description, price, category, available, image } = await request.json();

  try {
    // Log dei dati ricevuti per verificare cosa arriva all'API
    console.log('Dati ricevuti:', { name, description, price, category, available, image });

    // Simula un'operazione con Supabase o un altro database
    const { data, error } = await supabase
      .from('menu_items')
      .insert([{ name, description, price, category, available }]);

    if (error) {
      // Log dell'errore e invio della risposta
      console.error('Errore nell\'inserimento:', error.message);
      return new Response(JSON.stringify({ error: error.message }), { status: 400 });
    }

    return new Response(JSON.stringify({ data }), { status: 200 });
  } catch (err) {
    // Log dell'errore e invio della risposta
    console.error('Errore nel salvataggio dei dati nel database:', err);
    return new Response(
      JSON.stringify({ error: 'Errore nel salvataggio dei dati nel database.' }),
      { status: 500 }
    );
  }
}
