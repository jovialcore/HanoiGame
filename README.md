## How it works:

The [`app/Helper/functions.php`](./app/Helper/functions.php) holds the logic that validates game moves and gets the game.

The [`app/Http/Controllers/HanoiGameController.php`](./app/Http/Controllers/HanoiGameController.php) for some final finishing touches before returning code to the client. 

I also used the [`Marcosh\LamPHPda`](https://github.com/marcosh/lamphpda) library for returning type-safe data structures. 


## Tests

The [`tests/Feature/HanoiGameControllerTest.php`](./tests/Feature/HanoiGameControllerTest.php) has three feature tests I wrote for the game feature.

- Run `php artisan test`


## How to Install 

- First, Clone the GitHub repository
- Run `composer install`
- cp `.env.example .env`
- Boot the application by running `php artisan serve`

- The endpoints are 
- `GET` : `/api/state` to get the state of the game
- `POST` :`/api/move/0/2` to move the game

Thank you !
