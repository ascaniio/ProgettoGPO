"use client";

import { useState } from 'react';
import { useDropzone } from 'react-dropzone';

const AddDish = () => {
  const [name, setName] = useState('');
  const [description, setDescription] = useState('');
  const [price, setPrice] = useState('');
  const [category, setCategory] = useState('');
  const [available, setAvailable] = useState(true);
  const [image, setImage] = useState<File | null>(null);
  const [message, setMessage] = useState('');
  const [error, setError] = useState<string | null>(null);

  const onDrop = (acceptedFiles: File[]) => {
    const file = acceptedFiles[0];
    if (file) {
      setImage(file); // Imposta l'immagine selezionata
    }
  };

  const { getRootProps, getInputProps } = useDropzone({
    onDrop,
    accept: {
      'image/*': ['.jpeg', '.png', '.jpg'], // accetta solo immagini
    },
  });

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();

    // Verifica se tutti i campi sono compilati
    if (!name || !description || !price || !category || !image) {
      setError('Tutti i campi sono obbligatori');
      return;
    }

    // Aggiungi i console.log per visualizzare i dati prima di inviarli
    console.log("Dati del piatto inviati:", {
      name,
      description,
      price,
      category,
      available,
      image: image.name,  // Mostra solo il nome del file immagine
    });

    const formData = new FormData();
    formData.append('name', name);
    formData.append('description', description);
    formData.append('price', price);
    formData.append('category', category);
    formData.append('available', available.toString());
    formData.append('image', image);

    try {
      const response = await fetch('/api/inserisci_piatti', {
        method: 'POST',
        body: formData,
      });

      console.log("Risposta dal server:", response); // Aggiungi un log per vedere la risposta del server

      if (response.ok) {
        setMessage('Piatto aggiunto con successo!');
        setName('');
        setDescription('');
        setPrice('');
        setCategory('');
        setAvailable(true);
        setImage(null);
      } else {
        // Log per eventuali errori nel server
        const errorData = await response.json();
        console.error("Errore nel server:", errorData);
        setError('Errore nell\'aggiungere il piatto.');
      }
    } catch (err) {
      setError('Errore nel tentativo di aggiungere il piatto.');
      console.error("Errore nel tentativo di aggiungere il piatto:", err);
    }
  };

  return (
    <div>
      <h2>Lavoro da negri: Aggiungi un nuovo piatto</h2>
      <form onSubmit={handleSubmit} style={{ textAlign: 'center' }}>
        <div>
          <label>Nome del piatto: </label>
          <input
            type="text"
            value={name}
            onChange={(e) => setName(e.target.value)}
            required
          />
        </div>
        <br />
        <div>
          <label>Descrizione: </label>
          <br />
          <textarea
            style={{ height: '150px', width: '1000px' }}
            value={description}
            onChange={(e) => setDescription(e.target.value)}
            required
          />
        </div>
        <br />
        <div>
          <label>Prezzo: </label>
          <input
            type="number"
            value={price}
            onChange={(e) => setPrice(e.target.value)}
            required
          />
        </div>
        <br />
        <div>
          <label>Categoria: </label>
          <input
            type="text"
            value={category}
            onChange={(e) => setCategory(e.target.value)}
            required
          />
        </div>
        <br />
        <div>
          <label>Disponibile: </label>
          <input
            type="checkbox"
            checked={available}
            onChange={(e) => setAvailable(e.target.checked)}
          />
        </div>
        <br />
        {/* Area per il caricamento immagine */}
        <div
          {...getRootProps()}
          style={{
            border: '2px dashed #ccc',
            padding: '30px',
            cursor: 'pointer',
            display: 'flex',
            justifyContent: 'center',
            alignItems: 'center',
            textAlign: 'center',
            minHeight: '100px',
            marginTop: '70px',
          }}
        >
          <input {...getInputProps()} />
          <p>Carica una foto del piatto</p>
        </div>
        {image && <p>Immagine selezionata: {image.name}</p>}
        <br />
        <button type="submit">Aggiungi Piatto</button>
      </form>

      {message && <p>{message}</p>}
      {error && <p style={{ color: 'red' }}>{error}</p>}
    </div>
  );
};

export default AddDish;
