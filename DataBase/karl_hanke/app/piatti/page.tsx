import { createClient } from '@/utils/supabase/server';

export default async function items() {
  const supabase = await createClient();
  const { data: menu_items } = await supabase.from("menu_items").select();

  return <pre>{JSON.stringify(menu_items, null, 2)}</pre>
  
}

