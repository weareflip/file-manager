<?php

if (! function_exists('fm_format_bytes')) {
    function fm_format_bytes($bytes) {
        $formats = ['Bytes', 'KB', 'MB', 'GB', 'TB'];

        while ($bytes / 1024 >= 1 && count($formats) > 1) {
            $bytes /= 1024;
            array_shift($formats);
        }

        return (int) $bytes.' '.$formats[0];
    }
}

if (! function_exists('fm_asset')) {

    /**
     * Get path to a webpack bundle asset
     *
     * @param string $bundle Bundle name
     * @param string $type Asset type to take from the bundle ('js', 'css' or 'text')
     * @return string Path to asset
     */
    function fm_asset(string $bundle, string $type = 'js'): string
    {
        $path = __DIR__.'/../public/dist/manifest.json';

        if (! file_exists($path)) {
            throw new InvalidArgumentException('Unable to locate webpack manifest');
        }

        // Decode the webpack manifest
        $manifest = json_decode(file_get_contents($path));

        if (! isset($manifest->$bundle->$type)) {
            throw new InvalidArgumentException("Unable to find $bundle $type bundle");
        }

        return $manifest->$bundle->$type;
    }
}

if (! function_exists('fm_should_list')) {

    /**
     * Determine if file should be listed in manager
     *
     * @param string $path
     * @return bool
     */
    function fm_should_list(string $path): bool
    {
        return ! (preg_match('/[^\/]+$/', $path, $match) && preg_match(config('file-manager.hide_matches') ?: '/$^/', $match[0]));
    }
}
