<?php

use Flowframe\Previewify\Previewify;

use function PHPUnit\Framework\assertEquals;

it('can generate an async image', function () {
    $previewify = new Previewify('test-key');

    $url = $previewify->asyncImage(1, [
        'previewify:title' => 'Hi',
        'previewify:description' => 'This is a test',
    ]);

    assertEquals(
        'https://previewify.app/api/async-image?data=eyJ0ZW1wbGF0ZV9pZCI6MSwiZmllbGRzIjp7InByZXZpZXdpZnk6dGl0bGUiOiJIaSIsInByZXZpZXdpZnk6ZGVzY3JpcHRpb24iOiJUaGlzIGlzIGEgdGVzdCJ9fQ%3D%3D&signature=276956e53123b06bcf6a71624eb9a69a7e32cbfa72281ad53601fb24ae2468b8',
        $url,
    );
});
