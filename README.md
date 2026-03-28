# Filament Tutorial Project

A comprehensive employee management system built with **Laravel 13** and **Filament PHP v5**.

## 🚀 Features

- **Admin Panel**: Full-featured administrative interface for managing the system.
- **User Management**: Manage users with ease using Filament resources.
- **Employee Management**:
  - Full CRUD for Employees.
  - Multi-step forms for employee creation.
  - Advanced filtering and searching.
- **System Management**:
  - **Countries**: Manage country list.
  - **States**: Manage states linked to countries.
  - **Cities**: Manage cities linked to states.
  - **Departments**: Categorize employees into departments.
- **Stats & Dashboards**:
  - Custom widgets for administrative insights.
  - Charts showing employee distribution and user growth.
- **Multi-tenancy (App Panel)**:
  - Team-based access to the application.
  - Tenancy-aware resources and pages.

## 🛠️ Tech Stack

- **Framework**: [Laravel 13.x](https://laravel.com)
- **Admin Panel**: [Filament PHP v5.x](https://filamentphp.com)
- **Database**: MySQL/PostgreSQL/SQLite (configured via `.env`)
- **Frontend**: Tailwind CSS, Alpine.js, Livewire

## 📦 Installation

1. **Clone the repository**:
   ```bash
   git clone https://github.com/mohamed-hamdy1997/filament-tutorial.git
   cd filament-tutorial
   ```

2. **Install PHP dependencies**:
   ```bash
   composer install
   ```

3. **Install JS dependencies**:
   ```bash
   npm install && npm run build
   ```

4. **Environment Setup**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database Configuration**:
   Configure your database settings in the `.env` file.

6. **Run Migrations & Seeders**:
   ```bash
   php artisan migrate --seed
   ```

7. **Create an Admin User**:
   ```bash
   php artisan make:filament-user
   ```

8. **Start the Development Server**:
   ```bash
   php artisan serve
   ```

## 🖥️ Usage

- Access the **Admin Panel** at `/admin`.
- Access the **App Panel** at `/app` (if multi-tenancy is configured).

## 🗂️ Project Structure

- `app/Filament/Resources`: Contains the logic for the administrative resources.
- `app/Filament/Widgets`: Custom dashboard widgets for charts and stats.
- `app/Models`: Eloquent models for Employees, Countries, States, Cities, Departments, and Teams.
- `database/seeders`: Seeders for initial data (Countries, States, Cities).

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
