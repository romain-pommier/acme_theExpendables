<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\Container0nhowg1\appProdProjectContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/Container0nhowg1/appProdProjectContainer.php') {
    touch(__DIR__.'/Container0nhowg1.legacy');

    return;
}

if (!\class_exists(appProdProjectContainer::class, false)) {
    \class_alias(\Container0nhowg1\appProdProjectContainer::class, appProdProjectContainer::class, false);
}

return new \Container0nhowg1\appProdProjectContainer([
    'container.build_hash' => '0nhowg1',
    'container.build_id' => 'c5ebb1f0',
    'container.build_time' => 1597993889,
], __DIR__.\DIRECTORY_SEPARATOR.'Container0nhowg1');