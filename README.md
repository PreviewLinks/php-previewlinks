# Previewify for PHP

This is the official [Previewify](https://previewify.app) client for PHP.

## Support us

[<img src="https://flowfra.me/github-ad.png" width="419px" />](https://flowfra.me/github-ad-click)

Like our work? You can support us by purchasing one of our products.

## Installation

You can install the package via composer:

```bash
composer require flowframe/php-previewify
```

## Usage

### Images

Use the `image` method to generate downloadable image URLs, be aware that this might increase the loading time on your page. If you want to use this for on-demand previews continue to Async images.

```php
<?php

use Flowframe\Previewify\Previewify;

$previewify = new Previewify('<YOUR_SITE_API_KEY>');

$response = $previewify->image(
    templateId: 1,
    fields: [
        'previewify:title' => 'Hello from PHP SDK',
    ],
);

// `$response` will return the response object
// Be aware that you have to handle any errors or exceptions
$url = $response->toArray(throw: false)['url'];
```

### Async images

Async images are perfect if you don't want to download the image or use meta tags. It'll return a signed URL which you can put inside your OG or Twitter image meta tag.

```php
<?php

use Flowframe\Previewify\Previewify;

$previewify = new Previewify('<YOUR_SITE_API_KEY>');

$url = $previewify->asyncImage(
    templateId: 1,
    fields: [
        'previewify:title' => 'Hello from PHP SDK',
    ],
);

// <meta name="twitter:image" content="{{ $url }}" >
```

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Lars Klopstra](https://github.com/flowframe)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
