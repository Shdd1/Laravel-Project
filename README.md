# Contracting Projects & Overtime Management System

A web application built for a contracting company to track its field projects and manage employee overtime in one place. Admins follow the progress of every project phase by phase, while employees submit overtime requests that admins review and approve.

Built with **Laravel 11**, **PHP 8.2**, **MySQL**, **Blade**, and **Tailwind CSS**.

---

## The Problem

The company runs many projects at once across different sites and trades (HVAC, electrical, plumbing). Project progress and overtime were tracked manually, so it was hard to know where each project stood or to review overtime hours quickly and fairly.

## Features

### Project Tracking
- Create, edit and delete projects with client name and project type
- Three project types: **HVAC (تكييف)**, **Electrical (كهرباء)** and **Plumbing (سباكة)**
- Each project type gets its own predefined phases, loaded automatically when the type is selected
- Update the completion percentage (0–100%) of each phase
- Filter projects by type and update progress for several projects at once

### Overtime Management
- Employees submit overtime requests with the project, site, date, hours and reason
- Employees can view the history of their own requests
- Admins review all requests and set a status: **Pending**, **Under Review**, **Accepted** or **Rejected**

### Sites
- Manage the company's work sites (create, edit, delete)
- Every overtime request is linked to a site and a project

### Authentication
- Registration, login, email verification and password reset (Laravel Breeze)
- Profile management

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend | Laravel 11, PHP 8.2 |
| Database | MySQL, Eloquent ORM, migrations & seeders |
| Frontend | Blade templates, Tailwind CSS, JavaScript |
| Build | Vite |
| Auth | Laravel Breeze |
| Testing | Pest |

## Database Design

```
users ──────┐
            ├──< overtimes >── locations
projects ───┘        
   │
   └──< phases >── fixed_phases
```

| Table | Purpose |
|---|---|
| `projects` | Project name, client name and project type |
| `fixed_phases` | Predefined phases for each project type |
| `phases` | Completion percentage of each phase in a project |
| `locations` | Company work sites |
| `overtimes` | Overtime requests: employee, project, site, hours, date, reason, status |

---

## Getting Started

### Requirements
- PHP 8.2+
- Composer
- Node.js & npm
- MySQL

### Installation

```bash
# 1. Clone the repository
git clone https://github.com/Shdd1/Laravel-Project.git
cd Laravel-Project

# 2. Install dependencies
composer install
npm install

# 3. Create a .env file (use Laravel's default .env.example as a template)
php artisan key:generate
```

Set the database settings in `.env`:

```env
DB_CONNECTION=mysql
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

```bash
# 4. Create the tables and load the predefined phases
php artisan migrate
php artisan db:seed --class=FixedPhasesSeeder

# 5. Run the app
npm run dev
php artisan serve
```

Then open `http://localhost:8000`.

---

## Main Routes

| Route | Description |
|---|---|
| `/projects` | Projects list |
| `/projects/filter` | Filter projects by type and update phase progress |
| `/admin/projects` | Manage projects |
| `/admin/locations` | Manage sites |
| `/overtimes/create` | Submit an overtime request |
| `/overtimes` | My overtime requests |
| `/admin/overtimes` | Review all overtime requests |

---

## Author

**Shahad Alhazmi** — Full Stack Software Engineer

[LinkedIn](https://www.linkedin.com/in/shahadcode) · [GitHub](https://github.com/Shdd1)
