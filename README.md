## To Run the project  V 1.0.0



Future enhancements:

<ul>
    <li>Integration of Progressive Web Applications (PWA) to enhance user experience and ensure service availability offline.</li>
    <li>Introduction of digital products to broaden the service scope and meet diverse customer needs.</li>
    <li>Provision of multiple payment gateways, whether online or even offline, to facilitate purchasing processes.</li>
    <li>Addition of a communication button at the bottom of the website to improve interaction and provide an easy way for customers to reach support or make inquiries.</li>
    <li>Inclusion of comprehensive reports on the website's performance for more transparency and data analysis to improve service and better meet customer needs.</li>
</ul>





👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇👇

**The Project: Clone the project repository from the source control system to your local machine.**
```
git clone https://github.com/YacoubAl-hardari/profile_site.git

```

**Install Dependencies:** Run the command in the project directory to install all the required dependencies for the project.
 ```installComposer
 composer install
 ``` 

**Rename the Environment File:** In the project directory, locate the file named **"env.example" and rename it to ".env".** This file contains environment-specific configuration settings.

**Generate Application Key:** Run the command  to generate a unique application key for your project. This key is used for encryption and other security purposes.
```
php artisan key:generate
```

**Generate New Database in your server:**


**Migrate Database Tables:** To create the necessary tables in the database, run the command. This will set up the required database structure for the project.
```
php artisan migrate

```

**Generate User Account:** To create a user account for the application, use the command  followed by your **name, Gmail, and password**. This command will generate a user account with the provided credentials.
```
php artisan make:filament-user

```

```
php artisan db:seed

```

**Generate Storage link:** In order to display the image, run the following command in the terminal: 
```
php artisan storage:link

```
After generating the storage link, copy the URL and paste it into the **APP_URL=http://127.0.0.1:8000** .env file.


**Start the Server:** Finally, run the command "" to start the PHP development server  **http://127.0.0.1:8000/admin**. 
```
php artisan serve

```


<h3>
For Sending Emails 
</h3>

<p> add your email setting in **env file ** </p>

<p>MAIL_MAILER=smtp</p>
<p>MAIL_HOST=mailpit</p>
<p>MAIL_PORT=1025</p>
<p>MAIL_USERNAME=null</p>
<p>MAIL_PASSWORD=null</p>
<p>MAIL_ENCRYPTION=null</p>
<p>MAIL_FROM_ADDRESS="hello@example.com"</p>
<p>MAIL_FROM_NAME="${APP_NAME}"</p>

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
