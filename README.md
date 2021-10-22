# Imperium Clan Software - Web Search Bundle

## Installation

Make sure Composer is installed globally, as explained in the
[installation chapter](https://getcomposer.org/doc/00-intro.md)
of the Composer documentation.

### Applications that use Symfony Flex

Open a command console, enter your project directory and execute:

```console
composer require ics/websearch-bundle
```

### Applications that don't use Symfony Flex

#### Step 1: Download the Bundle

Open a command console, enter your project directory and execute the
following command to download the latest stable version of this bundle:

```console
$ composer require ics/websearch-bundle
```

#### Step 2: Enable the Bundle

Then, enable the bundle by adding it to the list of registered bundles
in the `config/bundles.php` file of your project:

```php
// config/bundles.php

return [
    // ...
    ICS\WebsearchBundle\WebsearchBundle::class => ['all' => true],
];
```

#### Step 3: Adding bundle routing

Add routes in applications `config/routes.yaml`

```yaml
# config/routes.yaml

# ...
websearch_bundle:
    resource: '@WebsearchBundle/config/routes.yaml'
    prefix: /web/search
# ...

```

## Usage

### Global search

```php

    //...

    use ICS\WebsearchBundle\Service\QwantService;

    //...

    /**
    * @Route("/search",name="websearch")
    */
    public function search(QwantService $service)
    {
        $search = "Imperium Clan Software";

        $searchResults = $service->search($search);

        return $this->render('search.html.twig',[
            'results' => $searchResults,
        ]);
    }

```

### Web only search

```php
    //...

    use ICS\WebsearchBundle\Service\QwantService;

    //...

    /**
    * @Route("/search",name="websearch")
    */
    public function search(QwantService $service)
    {
        $search = "Imperium Clan Software";

        $searchResults = $service->searchWeb($search);

        return $this->render('search.html.twig',[
            'results' => $searchResults,
        ]);
    }

```

### Images only search

```php

    //...

    use ICS\WebsearchBundle\Service\QwantService;

    //...

    /**
    * @Route("/search",name="websearch")
    */
    public function search(QwantService $service)
    {
        $search = "Imperium Clan Software";

        $searchResults = $service->searchImages($search);

        return $this->render('search.html.twig',[
            'results' => $searchResults,
        ]);
    }

```

### Videos only search

```php

    //...

    use ICS\WebsearchBundle\Service\QwantService;

    //...

    /**
    * @Route("/search",name="websearch")
    */
    public function search(QwantService $service)
    {
        $search = "Imperium Clan Software";

        $searchResults = $service->searchVideos($search);

        return $this->render('search.html.twig',[
            'results' => $searchResults,
        ]);
    }

```

### News only search

```php

    //...

    use ICS\WebsearchBundle\Service\QwantService;

    //...

    /**
    * @Route("/search",name="websearch")
    */
    public function search(QwantService $service)
    {
        $search = "Imperium Clan Software";

        $searchResults = $service->searchNews($search);

        return $this->render('search.html.twig',[
            'results' => $searchResults,
        ]);
    }

```

## Developpement

Obtain source code.

```bash

git clone https://github.com/imperiumclansoftware/websearch-bundle.git [sourcePath]

```

Add local repository to composer.json developpement application.

```json
{
    "repositories": [
        {
            "type": "path",
            "url": "[sourcePath]"
        },
    ]
}

```

Add bundle to your developpement application

```console

composer require ics/websearch-bundle

```
