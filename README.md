# Gold Fleet Management System

A comprehensive fleet management solution built with Laravel, designed to help businesses efficiently manage their vehicle fleets, drivers, maintenance schedules, and operations.

## Features

- **Fleet Management**: Track and manage your entire vehicle fleet
- **Driver Management**: Maintain driver records and assignments
- **Maintenance Tracking**: Schedule and monitor vehicle maintenance
- **Trip Management**: Record and analyze fleet trips
- **Company Management**: Support for multiple companies
- **User Authentication**: Secure login system with role-based access
- **Responsive Dashboard**: Modern, intuitive user interface

## Technology Stack

- **Backend**: Laravel 11
- **Frontend**: Tailwind CSS, Alpine.js
- **Database**: MySQL/PostgreSQL
- **Build Tool**: Vite

## Installation

1. Clone the repository:
   ```bash
   git clone <repository-url>
   cd gold-fleet
   ```

2. Install PHP dependencies:
   ```bash
   composer install
   ```

3. Install Node.js dependencies:
   ```bash
   npm install
   ```

4. Copy the environment file and configure:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. Run database migrations:
   ```bash
   php artisan migrate
   ```

6. Build assets:
   ```bash
   npm run build
   ```

7. Start the development server:
   ```bash
   php artisan serve
   ```

## Usage

- Register a new company account
- Add vehicles to your fleet
- Register drivers
- Schedule maintenance
- Create and track trips
- Monitor fleet performance from the dashboard

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the MIT License.
