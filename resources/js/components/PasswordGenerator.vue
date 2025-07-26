<template>
  <div class="generator">
    <h1>Passwort Generator Pro</h1>
    <section class="controls">
      <label>Länge: <input type="number" v-model="length" min="8" max="64"></label>
      <label><input type="checkbox" v-model="useLower"> Kleinbuchstaben</label>
      <label><input type="checkbox" v-model="useUpper"> Großbuchstaben</label>
      <label><input type="checkbox" v-model="useNumbers"> Zahlen</label>
      <label><input type="checkbox" v-model="useSymbols"> Sonderzeichen</label>
      <button @click="generatePassword">Generieren</button>
    </section>
    <section v-if="password" class="output">
      <div>
        <strong>{{ password }}</strong>
        <span class="strength" :data-strength="strength">{{ strength }}</span>
      </div>
      <button @click="copyPassword">Kopieren</button>
      <button @click="saveFavorite">Favorit</button>
      <span v-if="copied" class="info">Kopiert!</span>
    </section>
    <section class="actions">
      <button @click="exportTXT">Export TXT</button>
      <button @click="exportJSON">Export JSON</button>
      <button @click="clearHistory">History löschen</button>
    </section>
    <section class="history">
      <h2>History</h2>
      <ul>
        <li v-for="item in history" :key="item.id">
          <span :class="{fav: item.favorite}">{{ item.password }}</span>
          <small>({{ item.strength }}, {{ formatDate(item.created_at) }})</small>
          <button @click="toggleFavorite(item)">★</button>
          <button @click="remove(item)">✖</button>
        </li>
      </ul>
    </section>
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'

const length = ref(16)
const useLower = ref(true)
const useUpper = ref(true)
const useNumbers = ref(true)
const useSymbols = ref(true)
const password = ref('')
const strength = ref('unknown')
const copied = ref(false)
const history = ref([])

function buildCharset() {
  let chars = ''
  if (useLower.value) chars += 'abcdefghijklmnopqrstuvwxyz'
  if (useUpper.value) chars += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
  if (useNumbers.value) chars += '0123456789'
  if (useSymbols.value) chars += '!@#$%^&*()_-+=<>?'
  return chars
}

function zxcvbnStrength(pw) {
  if (pw.length < 10) return 'schwach'
  if (pw.length < 14) return 'mittel'
  if (pw.match(/[A-Z]/) && pw.match(/[0-9]/) && pw.match(/[^a-zA-Z0-9]/) && pw.length >= 16) return 'sehr stark'
  return 'stark'
}

function generatePassword() {
  const chars = buildCharset()
  if (chars.length === 0) return
  let pw = ''
  for (let i = 0; i < length.value; i++) {
    pw += chars.charAt(Math.floor(Math.random() * chars.length))
  }
  password.value = pw
  strength.value = zxcvbnStrength(pw)
}

function copyPassword() {
  navigator.clipboard.writeText(password.value).then(() => {
    copied.value = true
    setTimeout(() => copied.value = false, 1200)
  })
}

function saveFavorite() {
  if (!password.value) return
  savePassword(password.value, strength.value, true)
}

function savePassword(pw, str, favorite = false) {
  fetch('/api/passwords', {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ password: pw, strength: str, favorite })
  }).then(loadHistory)
}

function loadHistory() {
  fetch('/api/passwords')
    .then(r => r.json())
    .then(list => { history.value = list })
}

function remove(item) {
  fetch('/api/passwords/' + item.id, { method: 'DELETE' }).then(loadHistory)
}

function toggleFavorite(item) {
  fetch('/api/passwords/' + item.id, {
    method: 'PUT',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ favorite: !item.favorite })
  }).then(loadHistory)
}

function exportTXT() {
  let txt = history.value.map(h => h.password).join('\n')
  download('passwort-history.txt', txt)
}

function exportJSON() {
  download('passwort-history.json', JSON.stringify(history.value, null, 2))
}

function download(filename, data) {
  const blob = new Blob([data], { type: 'application/octet-stream' })
  const url = URL.createObjectURL(blob)
  const a = document.createElement('a')
  a.href = url
  a.download = filename
  a.click()
  URL.revokeObjectURL(url)
}

function clearHistory() {
  Promise.all(history.value.map(item => fetch('/api/passwords/' + item.id, { method: 'DELETE' }))).then(loadHistory)
}

function formatDate(dt) {
  return (new Date(dt)).toLocaleString()
}

onMounted(loadHistory)
</script>
