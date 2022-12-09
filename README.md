# PreviewLinks for PHP

This is the official [PreviewLinks](https://previewlinks.io) client for PHP.

## Installation

You can install the package via composer:

```bash
composer require previewlinks/php-previewlinks
```

## Usage

### Images

Use the `image` method to generate downloadable image URLs, be aware that this might increase the loading time on your page. If you want to use this for on-demand previews continue to Async images.

```php
<?php

use PreviewLinks\PreviewLinks;

$previewlinks = new PreviewLinks('<YOUR_SITE_API_KEY>');

$response = $previewlinks->image(
    templateId: 1,
    fields: [
        'previewlinks:title' => 'Hello from PHP SDK',
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

use PreviewLinks\PreviewLinks;

$previewlinks = new PreviewLinks('<YOUR_SITE_API_KEY>');

$url = $previewlinks->asyncImage(
    templateId: 1,
    fields: [
        'previewlinks:title' => 'Hello from PHP SDK',
    ],
);

// <meta name="twitter:image" content="{{ $url }}" >
```

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

-   [Logan Craft](https://github.com/CraftLogan)
-   [Lars Klopstra](https://github.com/flowframe)
-   [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
