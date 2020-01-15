## Anti XXX XXX CLUB GENERATOR FRONTEND

### Objective
This project is the frontend component that will run on an ELB EC2 AWS instance. It is the wrapper and showcase of the generator technology. It does not have a DB, but allows users to generate logos as well as purchase shirts & hoodies of set colors with their logo!

These orders are fulfilled by hand using Printful.

### Setup Development
- php 7.1
- Laravel 5.4.*
- AWS
- Stripe
- Node.js

```
git clone <this_repo>
cd <this_repo>
php artisan install
cp .env.example .env
nano .env // Setup your credentials
npm install
npm run watch
php artisan serve
```
