import { createClient } from '@supabase/supabase-js';

// Usa le variabili di ambiente per ottenere le informazioni
const supabaseUrl = process.env.NEXT_PUBLIC_SUPABASE_URL;
const supabaseKey = process.env.NEXT_PUBLIC_SUPABASE_ANON_KEY;

// Verifica che le variabili siano definite
if (!supabaseUrl || !supabaseKey) {
  throw new Error("supabaseUrl and supabaseKey must be provided");
}

// Crea il client Supabase
export const supabase = createClient(supabaseUrl, supabaseKey);
