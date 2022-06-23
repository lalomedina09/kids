## Tech stack

### Backend

- PHP
- Laravel

### Frontend

- Bootstrap
- Sass

- Node
- Vue.js
- Node.js

## Database setup

All the tables and rows required for the platform to work can be obtained running the database migrations and tables seeders with the following command:

```bash
php artisan migrate --seed
```

## Database connection

The database server doesn't allow external connections, so in order to connect to the database you need to create an SSH tunnel.

- SSH
  - Host: 54.91.13.249
  - Username: queridodinero

- MySQL

  - Host: 127.0.0.1
  - Port: 3306
  - Username: queridodinero
  - Database: queridodinero
  - Password: *The database password*

## Redis connection

The redis server doesn't allow external connections, so in order to connect to the database you need to create an SSH tunnel.

- SSH
  - Host: 54.91.13.249
  - Username: queridodinero

- Redis
  - Host: 127.0.0.1
  - Port: 6379
  - Password: *It doesn't have a password*
