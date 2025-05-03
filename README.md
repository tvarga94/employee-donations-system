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

2. **Create `.env` File:**

   ```bash
   cp .env.example .env
   ```

   **Create `.env.testing` File for tests:**

   ```bash
   cp .env.testing.example .env.testing
   ```

3. **Run the Setup Script:**

   A script is provided to streamline local setup:

   ```bash
   chmod +x setup.sh
   ./setup.sh
   ```

   This script will:

    * Install dependencies
    * Spin up Docker containers
    * Generate app key
    * Run migrations and seeders
    * Run the test suite
    * Run PHPStan analysis

4. **Access the App:**

    * API base URL: `http://localhost`
    * Swagger UI: `http://localhost:8000/api/documentation`

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

### Accessing the database
```bash
./vendor/bin/sail mysql
```

### User that could be used for login (generating token) after the user table is populated
```bash
{
  "email": "employee@example.com",
  "password": "password"
}
```

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
