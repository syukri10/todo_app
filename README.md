# 📝 TODO List App (Laravel 12)

A lightweight, session-based TODO app built with Laravel 12.

- ✅ Add, edit, and delete tasks  
- ✅ Mark tasks as complete  
- 🔒 No login or database required  
- 🧹 Session clears automatically when the browser tab is closed or after inactivity  
- 🆕 Latest tasks appear at the top  

---

## 🚀 Features

- 🧠 Session-based task storage (no DB)
- 📝 Add / Edit / Delete tasks
- ✅ Mark tasks as complete (with status badge)
- 🧼 Auto-clear session on tab close or inactivity
- 🛠 Laravel 12 with clean routing and controller setup

---

## ⚙️ Requirements

- PHP Version >= 8.2 ([Download PHP](https://www.php.net/downloads.php))  
- Composer ([Install Composer](https://getcomposer.org))  
- Laravel 12  
- A web server (Apache, Nginx) or Laravel's built-in server  

---

## 📦 Installation (Step-by-Step)

Follow these steps to set up the project locally:

### 1️⃣ Clone the Repository

```bash
git clone https://github.com/syukri10/todo_app.git
cd todo_app
```

### 2️⃣ Install PHP Dependencies with Composer

Make sure Composer is installed.

If this is your first time setting up the project:
```bash
composer install
```
If you've already installed it before and are updating:
```bash
composer update
```

### 3️⃣ Copy Environment File

Create a .env file based on the example:

```bash
cp .env.example .env
```

### 4️⃣ Configure Session Settings

Open your .env file and update the following lines:

```bash
SESSION_DRIVER=file
SESSION_LIFETIME=10
```
- SESSION_DRIVER=file stores session data on the server filesystem
- SESSION_LIFETIME=10 means the session will expire after 10 minutes of inactivity

### 5️⃣ Generate the Application Key

```bash
php artisan key:generate
```

### 6️⃣ Start the Development Server

```bash
php artisan serve
```
Then visit the app at:

```arduino
http://localhost:8000
```

---

## ✅ You're Ready!
Open your browser and enjoy your personal TODO list manager!
Tasks will be saved during your session and cleared when you close the browser tab or go inactive.

---

### 📁 Project Structure

- /routes/web.php – Defines all routes (view, store, delete, etc.)
- /app/Http/Controllers/TodoController.php – All logic for task handling
- /resources/views/todo/ – Blade views for displaying the TODO UI

---

## 🙋‍♂️ Author
- Built with ❤️ by [@syukri10](https://github.com/syukri10).
