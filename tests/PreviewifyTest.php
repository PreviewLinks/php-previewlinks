<?php

use PreviewLinks\PreviewLinks;

use function PHPUnit\Framework\assertEquals;

it('can generate an async image', function () {
    $previewlinks = new PreviewLinks('test-key');

    $url = $previewlinks->asyncImage(1, [
        'previewlinks:title' => 'Hi',
        'previewlinks:description' => 'This is a test',
    ]);

    assertEquals(
        'https://previewlinks.io/api/async-image?data=eyJ0ZW1wbGF0ZV9pZCI6MSwiZmllbGRzIjp7InByZXZpZXdpZnk6dGl0bGUiOiJIaSIsInByZXZpZXdpZnk6ZGVzY3JpcHRpb24iOiJUaGlzIGlzIGEgdGVzdCJ9fQ%3D%3D&signature=276956e53123b06bcf6a71624eb9a69a7e32cbfa72281ad53601fb24ae2468b8',
        $url,
    );
});
