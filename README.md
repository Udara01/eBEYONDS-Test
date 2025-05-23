# eBEYONDS-Test

This template should help get you started developing with Vue 3 in Vite.

## Recommended IDE Setup

[VSCode](https://code.visualstudio.com/) + [Volar](https://marketplace.visualstudio.com/items?itemName=Vue.volar) (and disable Vetur).


## Prerequisites
<ul>
  <li>Make sure you have the following installed:</li>
  <li>Node.js (v16 or later) and npm</li>
  <li>PHP (v7.4 or later)</li>
  <li>Composer (for installing PHPMailer)</li>
  <li>A modern web browser (e.g., Chrome, Firefox)</li>
</ul>


## Project Structure
<pre>
project-root/
│
├── backend/              # PHP scripts (contact.php)
│   ├── submissions.json  # Stores contact form submissions
│   └── vendor/           # Composer dependencies (PHPMailer)
│
├── frontend/             # Vue 3 application
│   └── ...               # Vue components (ContactForm.vue etc.)
│
├── README.md
└── ...
</pre>

## Project Setup
Set up the frontend (Vue 3)
```sh
npm install
```
```sh
npm run dev
```
The Vue development server will usually start at: http://localhost:5173




Set up the backend (PHP)
```sh
cd backend
composer install
```
Start a local PHP server:

```sh
php -S localhost:8000
```

