# Playing Card Distribution
Simple playing card distribution to distribute `52` cards to `n (number)` of player randomly and show the result without overlapping cards in players result set..

## Explanation
### Backend
Backend is coded using Laravel Framework version 6.x. Eventhough the it a simple backend process, using the framework will make it flexible for future enhancement.

`app/Http/Controller/HomeController@index` - Alghorithm to distribute `52` cards to  `n` (number) of player randomly 

`app/Http/Controller/HomeController@card` - Card type and numbers.

### Frontend
Frontend is coded using HTML to create the form input and with jQuery to retrieve the result of card distribution from backend.

`resources/view/home/index.blade.php` - Form and result page.
 
## Language Used:
- Laravel 6 `{backend}`
- HTML/jQuery `{frontend}`
- Bootstrap UI

## Installation
Clone the repo on your development/test environment

```
git clone https://github.com/afiqjamil/laravel-card-distribution.git laravel_card_distribution
cd laravel_card_distribution
composer install
cp env.example .env
```

## Contact
If there's any question, feels free to email me at `afiqjamil88@gmail.com`.
