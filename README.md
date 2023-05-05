<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# LARAVEL REST API STARTER KIT USING SANCTUM
A simple Laravel RESTAPI starter kit using Sanctum to kick start RESTful APIs development using Laravel. 

Application Name ................................................................... Laravel Rest Api 

Laravel Version ...................................................................... 10.4.1

PHP Version ........................................................................... 8.1.10

Database ................................................................................ MYSQL 

## FEATURES:

Create Users

Create (Read | Update | Delete) Customers

Create (Single | Bulk) Invoices against Customers

## Installation
```bash
git clone https://github.com/imgrasooldev/laravel-rest-api.git
cd laravel-rest-api
```
open .env file (available) at root directory and check (or update) database details.

Go to CLI and run below commands:  
```bash
composer install
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve
```

## DISPATCH EMAIL 

 "**If want to dispatch welcome email on register check below:**"

=>	Fill the email details in .env file (I personally used Mailtrap). 

=>	(Optional) If you want to dispatch welcome email using Redis, Change "**QUEUE_CONNECTION**" (available inside .env) to redis and fill redis credential details inside .env file "**otherwise change the QUEUE_CONNECTION to database**".

Finally hit queue listener by using below command in CLI.

```bash
php artisan queue:listen  
```

"**If don’t want to dispatch welcome email:**"

If you don’t wish to send welcome email on register action, please Comment the below line of code available in signup function inside (root/app/Http/Controllers/Api/V1/AuthController.php).

```bash
 dispatch(new \App\Jobs\EmailJobs\Auth\SendRegisterMailJob($request->email));
```

## Endpoints: 

#### Register User: 
```
POST /api/v1/register
Body => {
    "name": "",
    "email": "",
    "password": "",
    "confirmPassword": ""
}
```
#### Login User: 
```
POST	/api/v1/login
Body => {
    "email": "",
    "password": ""
}
```
#### Get Customers: 
```
GET	/api/v1/customers (Pass token from login/register response as bearer-token).
```
#### Get Filtered Customers: 
```
GET 	/api/v1/customers?customer_id[eq]=50&status[eq]=P&includeInvoices=true
```
"**Include invoice** query parameter is to include individual customer invoices inside response."

#### Create Customers:
```
POST	/api/v1/customers
			Body => {
    					"name": "",
    					"type": "I", //I for Individual, B for Business
    					"email": "",
    					"address": "",
    					"city": "",
    					"state": "",
    					"postalCode": ""
}
```
#### Delete Customers:
```
	DELETE 	/api/v1/customers/{id}
```
#### Get Invoices:
```
GET 	/api/v1/invoices 
```
#### Get Single Invoices:
```
	GET 	/api/v1/invoices/{id}
```
#### Get Filtered Invoices:
```
	GET	    /api/v1/invoices?customer_id[eq]=50&status[eq]=P
```
#### Create Bulk Invoices: 
```
POST 	/api/v1/invoices/bulk
Body => [
    {
            "customerId": 30,
            "amount": 444,
            "status": "V",
            "billedDate": "2015-08-05 08:49:54",
            "paidDate": null
        },
        {
            "customerId": 10,
            "amount": 444,
            "status": "P",
            "billedDate": "2019-01-10 20:06:43",
            "paidDate": "2016-07-24 20:02:19"
        },
        {
            "customerId": 14,
            "amount": 444,
            "status": "B",
            "billedDate": "2018-06-20 19:08:25",
            "paidDate": "2017-04-20 10:01:35"
        }
]
```
Best of Luck :+1:

Rate my work please :star:
