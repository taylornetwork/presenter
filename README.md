# Presenter for Laravel

Adds another place to put logic for models. Instead of cluttering up models with logic to display/format data, add them to a presenter!

This is a rewrite of [laracasts/Presenter][link-presenter] with some added functionality, commands, etc.

## Install

Via Composer

``` bash
$ composer require taylornetwork/presenter
```

## Setup

Add the service provider to the providers array in `config/app.php`

``` php
'providers' => [

    TaylorNetwork\Presenter\PresenerServiceProvider::class,

],
```

## Publish Config

``` bash
$ php artisan vendor:publish
```

This will add `config/presenter.php` where you can define the namespace you want your presenter classes to be stored.

## Usage

Create a presenter using the artisan command, for example a presenter for the User model.

``` bash
$ php artisan make:presenter UserPresenter
```

This will create a presenter class you can add logic to that you don't want in the model or the view. Model attributes are accessible via `$this->model`

``` php
use TaylorNetwork\Presenter\Presenter;

class UserPresenter extends Presenter
{
    /**
     * Get the user's full name
     *
     * @return string
     */
    public function fullName()
    {
        return $this->model->first_name . ' ' . $this->model->last_name;
    }

    /**
     * Get the time since the user signed up
     *
     * @return string
     */
    public function userSince()
    {
        return $this->model->created_at->diffForHumans();
    }
}
```

You will need to add the presentable trait and a `$presenter` property to your model

``` php

use TaylorNetwork\Presenter\Presentable;
use App\Presenters\UserPresenter;

class User extends Model
{
    use Presentable;

    /**
     * Presenter Class
     *
     * @var string
     */
    protected $presenter = UserPresenter::class;

    // Code
}

```

You can access the presenter with `present()`

``` php
<h1>{{ $user->present()->fullName }}, you signed up {{ $user->present()->userSince }}</h1>
```

## Credits

- Main Author: [Sam Taylor][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[link-author]: https://github.com/taylornetwork
[link-presenter]: https://github.com/laracasts/Presenter