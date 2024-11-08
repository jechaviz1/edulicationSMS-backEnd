<?php
return [
    'username' => env('TGA_USERNAME'),
    'password' => env('TGA_PASSWORD'),
    'page_size' => env('TGA_PAGE_SIZE', 1000), // Default page size
    'delay' => env('TGA_DELAY', 1),          // Delay between requests in seconds
];