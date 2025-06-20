# LeaseForMe

A Laravel 12.x application that helps landlords and tenants manage leases online.

## Requirements

- PHP 8.4+
- Composer
- MySQL 8+
- Node 20+ & npm (Vite build)
- Redis (queues & cache)

## Setup

```bash
git clone https://github.com/leaseforme/code.git
cd code
cp .env.example .env
composer install
npm install
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```

## Testing

```bash
php artisan test
```

## Deployment

Configure environment variables on the server and run:

```bash
php artisan config:cache
php artisan route:cache
php artisan queue:restart
```

CI/CD is handled by GitHub Actions (`.github/workflows/ci.yml`).
