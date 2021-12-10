<?php declare(strict_types=1);

/**
 * @param mixed $object
 */
function debug($object, bool $verbose = false): void
{
    if (!$verbose && is_object($object)) {
        echo 'Object of class ' . \get_class($object);
        return;
    }

    ob_start();
    \var_dump($object);
    $result = ob_get_clean();
    $result = is_string($result) ? $result : '';
    $result = preg_replace('/^(.*)GlobalNamespaceHelper\.php(.*)(\s*)/', '', $result);
    $result = is_string($result) ? $result : '';

    echo trim($result);
}

/**
 * @return void
 */
function trace(): void
{
    $trace = (new \Exception())->getTraceAsString();

    echo $trace;
}
