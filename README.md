# HarmonyHub

Full-stack Coding Assessment
 
## Technologies Used

- Laravel 10
- Inertia.js
- VueJS 3
- Vuetify + Phosporicons
- Vite

## System Requirements
- PHP version 8.0 and above,
- MySQL version 5 and above
- Composer
- Node
- Yarn


## Installation

Clone repo locally
```bash
composer install 
```

Install PHP Dependencies

```bash
composer install 
```

If Composer install fails run

```bash
composer update
```

Install NPM Dependencies

```bash
npm install
```

If NPM gives errors use Yarn

```bash
yarn install
```

Build assets for production

```bash
npm run prod
```

Setup Configuration

```bash
cp .env.example .env
```

Generate application key

```bash
php artisan key:generate
```

Run Database migrations

```bash
php artisan migrate
```

For demo data
```bash
php artisan migrate --seed
```

##Testing Users

If the database is seeded the default users are as follows
- admin@example.com
- student@example.com
- instructor@example.com
- Password 12345678

These users are for testing purposes only.
