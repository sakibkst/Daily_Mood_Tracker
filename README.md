# 🧠 Daily Mood Tracker Web App

A Laravel-based application that helps users track their daily emotional wellbeing. Developed as part of a pre-interview task for JAM Technologies.

---

## ✅ Feature Summary

- 🔐 **User Authentication**
  - Register/login using phone number & password
  - Session-based logout
- 📅 **Daily Mood Entry**
  - One mood per day (Happy, Sad, Angry, Excited)
  - Optional note
  - Prevents duplicate entries per day
  - Edit or soft-delete mood logs
- 📖 **Mood History**
  - Chronological mood listing (latest first)
  - Filter by date range (table/timeline view)
- 📊 **Weekly Mood Summary**
  - Bar chart using Chart.js (Monday–Sunday)
- 🧼 **Soft Delete & Restore**
  - Allows restoration of deleted moods
- 🔥 **Streak Badge**
  - Displays badge for 3+ consecutive mood logs
- 🏆 **Bonus Features**
  - **Mood of the Month:** Shows most frequent mood in the last 30 days
  - **PDF Export:** Download formatted PDF of mood logs

---

## 🛠️ Setup Instructions

### 📦 Prerequisites

- PHP 8.2+
- Composer
- Node.js & npm
- MySQL (or PostgreSQL)
- Git

### 🚀 Installation Steps

```bash
# Clone the repository
git clone https://github.com/your-username/daily-mood-tracker.git
cd daily-mood-tracker

# Install dependencies
composer install
npm install && npm run dev

# Setup environment
cp .env.example .env
php artisan key:generate

# Set DB credentials in .env
php artisan migrate

# (Optional) Seed test data
php artisan db:seed

# Run the app
php artisan serve
```
