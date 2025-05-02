# Employee Donation System API

This Laravel-based internal donation platform was built for ACME Corp to enhance corporate social responsibility by empowering employees to create and support fundraising campaigns.

---

## Features

* ✅ Employee authentication with Sanctum
* ✅ Campaign creation
* ✅ Donation to campaigns with confirmation
* ✅ Campaign listing
* ✅ API documentation (Swagger)
* ✅ Dockerized using Laravel Sail
* ✅ Pest-powered testing
* ✅ Repository Pattern architecture

---

## Tech Stack

| Tool            | Version        |
| --------------- | -------------- |
| PHP             | 8.2            |
| Laravel         | 11.x           |
| Laravel Sail    | Latest         |
| Pest            | ^3.8           |
| Laravel Sanctum | ^4.0           |
| MySQL           | 8.0 (via Sail) |
| Swagger (L5)    | ^10.x          |

---

## 🐳 Docker Setup (Laravel Sail)

This project uses Laravel Sail for local development with Docker. It includes services like MySQL, PHP, and a web server.

### Prerequisites

* Docker Desktop installed and running
* Composer installed

### Step-by-Step

1. **Clone the Repository:**

   ```bash
   git clone https://github.com/tvarga94/employee-donations-system.git
   cd employee-donations-system
   ```

2. **Install Dependencies:**

   ```bash
   composer install
   ```

3. **Install Sail (if not present):**

   ```bash
   php artisan sail:install --with=mysql
   ```

4. **Create `.env` and Set Environment Variables:**

   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

   Then update:

   ```env
   DB_CONNECTION=mysql
   DB_HOST=mysql
   DB_PORT=3306
   DB_DATABASE=donations-system
   DB_USERNAME=sail
   DB_PASSWORD=password
   ```

5. **Start the Docker Containers:**

   ```bash
   ./vendor/bin/sail up -d
   ```

6. **Run Migrations and Seeders:**

   ```bash
   ./vendor/bin/sail artisan migrate --seed
   ```

7. **Access the App:**

    * API base URL: `http://localhost`
    * Swagger UI: `http://localhost/api/documentation`

---

## Running Tests

```bash
./vendor/bin/sail test
```

Testing uses:

* SQLite in-memory database (`.env.testing` configured)
* Pest test framework

---

## API Endpoints

> All routes are prefixed with `/api` and protected by Sanctum (except login).

### Auth

* `POST /api/login` — Get access token
* `GET /api/user` — Get authenticated user

### Campaigns

* `POST /api/campaigns` — Create campaign
* `GET /api/campaigns` — List campaigns

### Donations

* `POST /api/donations` — Donate to a campaign

> Full Swagger docs available at `/api/documentation`

---

## Architecture Overview

### Repository Pattern

We use the repository pattern to decouple business logic from Eloquent:

* Interface-driven (`App\Repositories\Interfaces`)
* Bound in `AppServiceProvider`

### Request Validation

* Done via `FormRequest` classes (`StoreCampaignRequest`, etc.)

### Authentication

* Laravel Sanctum used for API token-based authentication

### Swagger (L5)

* Installed and configured with `app/Swagger/OpenApiSpec.php`
* Each controller includes inline annotations

### Testing

* Pest with `RefreshDatabase`
* Dedicated `DonationTest`, `CampaignTest`, etc.
* `.env.testing` uses SQLite in-memory for speed and safety

---

## Assumptions

* Payment system was mocked via donation record creation (per task note).
* No full CRUD or UI needed — only what was explicitly requested.
* Campaign "management" interpreted as creation + listing.

---

## 📦 Future Enhancements (if needed)

* Payment gateway integration (Stripe, PayPal)
* Campaign editing/deletion
* Donation history or campaign stats
* Admin view
* UI for employee interaction

---

## 🧑‍💻 Author

Tamas (PHP Developer)

---

> ✅ Fully scoped to assignment — functional, secure, and Docker-ready.
