<?php

use function PHPUnit\Framework\assertEquals;

use PreviewLinks\PreviewLinks;

it('can generate an async image', function () {
    $previewlinks = new PreviewLinks('test-key');

    $url = $previewlinks->asyncImage(1, [
        'previewlinks:title' => 'Hi',
        'previewlinks:description' => 'This is a test',
    ]);

    assertEquals(
        'https://previewlinks.io/api/async-image?data=eyJ0ZW1wbGF0ZV9pZCI6MSwiZmllbGRzIjp7InByZXZpZXdsaW5rczp0aXRsZSI6IkhpIiwicHJldmlld2xpbmtzOmRlc2NyaXB0aW9uIjoiVGhpcyBpcyBhIHRlc3QifX0%3D&signature=8f690cf87aa9994a42eb7d4920788c6643a1cc9ec0025ec77a912052921af1f6',
        $url,
    );
});
