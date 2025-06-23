# apiphp# 📡 API PHP – Puntajes Memory Palace

Este repositorio contiene una API simple en PHP para guardar los puntajes del juego web **Memory Palace**, desarrollado con Phaser 3.

## 🚀 ¿Qué hace esta API?

- Recibe solicitudes POST con el nombre del jugador y su puntaje.
- Guarda los puntajes en un archivo local `scores.json`.
- Registra la fecha y hora de cada envío.
- Permite integración con frontends HTML/JS o juegos hechos en Phaser.

## 📂 Estructura del proyecto


## 🧪 Ejemplo de uso desde JavaScript

```js
fetch('https://tudominio.com/api/save_score.php', {
  method: 'POST',
  headers: { 'Content-Type': 'application/json' },
  body: JSON.stringify({ name: 'Jugador1', score: 1500 })
})
.then(res => res.json())
.then(data => console.log(data));

[
  {
    "name": "Jugador1",
    "score": 1500,
    "timestamp": "2025-06-23 14:35:00"
  }
]

