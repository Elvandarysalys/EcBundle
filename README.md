# EcBundle

Small Bundle to help use externals urls inside a symfony project.

The goal is to help the communication by centralizing all the routes inside a single
configuration fila and providing methods to use thems.

Installation
============

Open a command console, enter your project directory and execute:

```console
$ composer require <package-name>
```

Hom to use the bundle
============

Inside ```elvandar_ec.yml```, you can configure your sites and routes:

```yaml
    site:
        routes:
            name: 'http://path/to/your/site'
```

The file is organised betwin ```sites```. 
Each ```site``` represents a grouping of urls under the ```routes``` list.

Configuration example
----------------------------------------

```yaml
    your_first_site:
        routes:
            home: 'http://first-site/'
            description: 'http://first-site/description'
            contact: 'http://first-site/contact'
    your_second_site:
        routes:
            home: 'http://second-site/'
            contact: 'http://second-site/contact'
            blog: 'http://second-site/blog'
            
    The name of your site: # the name you want to give to your site
        routes:            # a list of the site routes
            Name: 'URL'    # name of the route : url of the route
```

Use the service
----------------------------------------

You can now use the ```Externals``` service to retrieve :

```php
    $externals = $this->container->get('ec');
    
    $externals->getRoute('contact', 'your_second_site');
```

or redirect to the desired route :

```php
    $externals = $this->container->get('ec');

    $externals->redirectToExternal('description', 'your_first_site');
```
Bboth the ```redirectToEcternal``` and ```getRoute``` methods follow the same parameters rules:

# 1 - premier paramètre

The first parameter is the name of your route. 

For example inside the example configuration, the name for `http://second-site/blog` is `blog`.

This parameter is required.
# 2 - second paramètre

The second parameter is the name of the site.
It is not required but will be needed if multiple roads have the same name. 

For example, the second parameter is not needed for the `blog` route but will be needed for the `home` or the `contact` routes.