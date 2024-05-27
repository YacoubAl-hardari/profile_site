# Project Setup Guide v1.0.0

## Screenshots
<img src="https://raw.githubusercontent.com/YacoubAl-hardari/profile_site/main/screencapture-profile-site-test-2024-05-04-03_33_10.png" alt="Screenshot 1" style="width:250px; margin-right:10px;"> <img src="https://raw.githubusercontent.com/YacoubAl-hardari/profile_site/main/screencapture-profile-site-test-2024-05-04-03_33_33.png" alt="Screenshot 2" style="width:250px; margin-right:10px;"> <img src="https://raw.githubusercontent.com/YacoubAl-hardari/profile_site/main/screencapture-profile-site-test-2024-05-04-03_33_20.png" alt="Screenshot 3" style="width:250px; margin-right:10px;"> <img src="https://raw.githubusercontent.com/YacoubAl-hardari/profile_site/main/1.jpg" alt="Screenshot 4" style="width:250px; margin-right:10px;"> <img src="https://raw.githubusercontent.com/YacoubAl-hardari/profile_site/main/2.jpg" alt="Screenshot 5" style="width:250px; margin-right:10px;">

## Future Enhancements
- **Progressive Web Application (PWA)**: Enhance user experience and ensure service availability offline.
- **Digital Products**: Introduce new digital products to expand service offerings.
- **Payment Gateways**: Integrate multiple payment options, both online and offline, to facilitate transactions.
- **Communication Button**: Add a communication button for easy customer support and inquiries.
- **Performance Reports**: Include comprehensive reports on website performance for better transparency and data analysis.

## Setup Instructions

### Clone the Repository
Clone the project repository to your local machine:
```bash
git clone https://github.com/YacoubAl-hardari/profile_site.git
```

### Install Dependencies
Navigate to the project directory and install the required dependencies:
```bash
composer install
```

### Environment Configuration
Rename the environment configuration file:
```bash
mv env.example .env
```


### Create a New Database
Create a new database on your server.

### Migrate Database Tables
Run the following command to create the necessary tables in the database:
```bash
php artisan migrate
```

### Generate Application Key
Generate a unique application key:
```bash
php artisan key:generate
```


### Seed the Database
Generate user accounts and seed the database:
```bash
php artisan db:seed
```
To create a specific user account, use:
```bash
php artisan make:filament-user
```

### Create Storage Link
To enable image display, create a storage link:
```bash
php artisan storage:link
```
Update the `.env` file with your local URL:
```env
APP_URL=http://127.0.0.1:8000
```

### Start the Server
Start the PHP development server:
```bash
php artisan serve
```
Access the application at [http://127.0.0.1:8000/admin](http://127.0.0.1:8000/admin).

### Email Configuration
Add your email settings to the `.env` file:
```env
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Additional Environment Variables
Add the following environment variables to your `.env` file if needed:
```env

ENABLE_GOOGLE_ANALYTICS_PROVIDER=true
CAPTCHA_SITE_KEY=
CAPTCHA_SECRET_KEY=
ANALYTICS_PROPERTY_ID=
META_PIXEL_ID=
```


## To add the google analytics

```

mkdir -Force storage\app\analytics
cd storage\app\analytics
code service-account-credentials.json


```

## Contributing
Thank you for considering contributing! Please review the [contribution guide](https://laravel.com/docs/contributions).

## Code of Conduct
Please adhere to the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct) to ensure a welcoming community.

## Security Vulnerabilities
If you discover a security vulnerability, please contact Taylor Otwell at [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License
The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
