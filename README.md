# Welcome to the PHP MVC Framework

This is a simple MVC framework for building web applications in PHP.

## Starting an Application Using This Framework

1. First, download the framework, either directly or by cloning the repo.
1. Configure your web server to have the **Public** folder as the web root.
1. Create **Controllers**, **Views** and **Models**.

See below for more details.

## URL Structure

For example for URL = **http://localhost/Controller/Action/Parameters**

## Controllers

The [Application.php](App/Core/Application.php) translates URLs into controllers and actions. `HomeController` like this:

```php
class HomeController extends Controller {
    public function IndexAction(){
        $this->View("Home/Index");
    }
}
```

And you can add **parameters**, like this:

```php
class HomeController extends Controller {
    public function IndexAction($get_parameter){
        $this->View("Home/Index", $get_parameter);
    }
}
```

## Views

Views are used to display information (normally HTML). View files go in the `App/Views` folder. Views can be in one of two formats: Standard PHP or PHTML