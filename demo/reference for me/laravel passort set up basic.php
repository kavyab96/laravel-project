composer require laravel/passport
php artisan migrate

php artisan passport:install
   
   --------------
Step 4: Configure Passport in the AuthServiceProvider
Open app/Providers/AuthServiceProvider.php.

Add the Passport::routes() method within the boot function:


use Laravel\Passport\Passport;
public function boot()
{
    $this->registerPolicies();
    Passport::routes();
}
------------------------
Step 5: Set Up API Authentication Guard
   open config/auth.php

   'guards' => [

    'web' => [
        'driver' => 'session',
        'provider' => 'users',
    ],

    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
    ],
],

-------------------------------
Step 6: Update User Model
In app/Models/User.php, include the HasApiTokens trait from Passport:

php
Copy code
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;
}
-------------------------------------


Remove Passport::routes() from api.php and AuthServiceProvider: Since the Passport::routes() method is no longer available, remove it from both api.php and AuthServiceProvider.

Use Passport’s Built-in Route Configuration (Via config/auth.php): Laravel Passport should now be configured to automatically register routes. In the config/auth.php file, ensure that api uses Passport as the guard driver.

php
Copy code
'guards' => [
    'api' => [
        'driver' => 'passport',
        'provider' => 'users',
        'hash' => false,
    ],
],


publish:

php artisan vendor:publish --tag=passport-config

---------------------------------

url for postman :
    http://localhost/demo/public/api/register
    i/p: 

            {
        "name":"kavya",
        "email":"kavya@123.com",
        "password":"1234"
        }

   o/p:

    {
        "name": "kavya",
        "email": "kavya@123.com",
        "updated_at": "2024-10-30T13:35:20.000000Z",
        "created_at": "2024-10-30T13:35:20.000000Z",
        "id": 1
    }


    ----------------login--------------
    http://localhost/demo/public/api/login

    i/p :
            {
        "email":"kavya@123.com",
        "password":"1234"
        }

    o/p :
        {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiYzkzMDUzYzZkZmJjNzg2ZTU2NzgyYmY5NWIxMjU3Y2VkMzdkYzc5MTI4MTk5ODRmZGE0YzgxZDA1OTU2OTkxM2Q1MmNiN2Q0ODllNWM5MWIiLCJpYXQiOjE3MzAyOTU1ODQuOTYzMDQ3LCJuYmYiOjE3MzAyOTU1ODQuOTYzMDUyLCJleHAiOjE3NjE4MzE1ODQuOTU0NDMzLCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.lhoWKqlhHuF053U6nCCXBnsKrj_0U0nJqai-bQTY8fumwWoNW_mZjxF-jJVmvypZzXXo4H6ORWMCitS8Uy10RmRQ4Vtvg3mFO2cKWv-3KhiNO4K3aWQzbuiXlOO_JQDAH0BQNGzgnDJNEe6Hg8gjfvh07zSDWWrA4x1hDXCsI7ukac1PrshEjtbjrKI36zoBUg_qdRHePyL9uaTgbGQypB55dpSODRp_bGMXOaPESA2P3tUl0iSOWzp4J8xO2srUn-BnfnjlzSZn6FyJZkHbTxAt9umlt13l_Kk-s_Eoj6jd7fBQUrUO4z-IwQGh4cEH2V2YiW9Y9Uw3ItfPXKYAaEIGTZtIyDahk0x-raJDoCr3IUrZ7ff5gKX6Caehzg-iE8UF4V8qam-pZcMKV7CIR6mR_DMncp6sBE2K8iO75u1dFc4jCeSDjq73tiIpACy2hX1_1aCQkJ821pG9FY17vgWEhgMOSpnr6PcCeMF_M-D4bfuMrBMSvMITthnEcjUWTROADzSFiFZP2oSYYnjET-lmXgYShjb-OEp40YusXVvvyOLYx5sowYmkDvd-yL_zsjUWkv5CYhHYWlv15s6bOHyiObCPwsgrY4NcJekTR4Ooy6jPwc4h9C9J1Vet9K7s5BZItpvzrgrtvmXk5fy44aOvwGa48rIgKaVa3kD5PGg"
    }