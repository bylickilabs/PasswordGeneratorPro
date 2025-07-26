# Password Generator Pro – Laravel + Vue.js

<img width="1280" height="640" alt="ChatGPT Image 26  Juli 2025, 21_46_13" src="https://github.com/user-attachments/assets/43825826-4810-492b-bb98-5f3b226bfdbb" />

> A full-featured, production-ready password generator built with **Laravel (API backend)** and **Vue.js (frontend)**. 
  - This application is designed for performance, security, and modular extensibility

<br>

---

<br>

## 🚀 Features

- ✅ Custom password generation (length, uppercase, lowercase, numbers, symbols)
- ✅ Password strength analysis
- ✅ Clipboard support (copy to clipboard)
- ✅ Favorites marking
- ✅ Password generation history with timestamp
- ✅ Export passwords (TXT and JSON)
- ✅ REST API for saving, updating, and deleting passwords
- ✅ Fully responsive & Dark Mode

<br>

---

<br>

## 📦 Tech Stack

- **Laravel 10+** (Backend API, Migrations, Eloquent ORM)
- **Vue.js 3 (Composition API)** (Frontend UI)
- **Vite** (modern dev/build tooling)

<br>

---

<br>

## 🛠️ Installation

```bash
git clone <repo-url> passwordgen
cd passwordgen

composer install
npm install
php artisan migrate
npm run build
php artisan serve
```

Access the application at [http://localhost:8000](http://localhost:8000)

<br>

---

<br>

## 🧠 API Endpoints

| Method | Endpoint            | Description                 |
|--------|---------------------|-----------------------------|
| GET    | `/api/passwords`    | List all generated passwords |
| POST   | `/api/passwords`    | Save a new password          |
| PUT    | `/api/passwords/{id}` | Toggle favorite              |
| DELETE | `/api/passwords/{id}` | Delete a password            |

<br>

---

<br>

## 📁 Export Options

- TXT: All passwords, one per line
- JSON: Full password objects with metadata

<br>

---

<br>

## 🧩 Structure

```
/resources/js/components/PasswordGenerator.vue  → Vue SFC component
/app/Http/Controllers/PasswordController.php    → Laravel API controller
/database/migrations/                           → Passwords table
/app/Models/Password.php                        → Eloquent model
/routes/api.php                                 → API routes
/resources/views/welcome.blade.php              → Entry blade file
```

<br>

---

<br>

## 📋 License

MIT – free to use, modify, extend. No warranties.
[LICENSE](LICENSE)

<br>

---

<br>

## 👨‍💻 Author

Created by BYLICKILABS – Crafting Secure & Innovative Software.
