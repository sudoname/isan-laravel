#!/usr/bin/env php
<?php

/**
 * Helper script to update Onisan images
 *
 * Usage:
 *   php update_onisan_image.php <onisan_number> <image_filename>
 *
 * Example:
 *   php update_onisan_image.php 8 onisan8.jpg
 *   php update_onisan_image.php 1 historical-first-onisan.png
 *
 * This will:
 * 1. Look for the image in Downloads folder
 * 2. Copy it to public/images/onisan/
 * 3. Update the database entry for that Onisan
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Onisan;

// Check arguments
if ($argc < 3) {
    echo "Usage: php update_onisan_image.php <onisan_number> <image_filename>\n";
    echo "\nExample:\n";
    echo "  php update_onisan_image.php 8 onisan8.jpg\n";
    echo "  php update_onisan_image.php 1 first-king.png\n";
    echo "\nThis will copy the image from ~/Downloads/ and update the database.\n";
    exit(1);
}

$onisanNumber = $argv[1];
$imageFilename = $argv[2];

// Validate Onisan number
if (!is_numeric($onisanNumber) || $onisanNumber < 1 || $onisanNumber > 10) {
    echo "Error: Onisan number must be between 1 and 10\n";
    exit(1);
}

// Find the Onisan
$ordinal = getOrdinal($onisanNumber);
$onisan = Onisan::where('full_title', 'LIKE', "%{$ordinal} Onisan%")->first();

if (!$onisan) {
    echo "Error: Could not find {$ordinal} Onisan in database\n";
    exit(1);
}

// Check if source image exists
$homeDir = getenv('HOME');
$sourceImage = $homeDir . '/Downloads/' . $imageFilename;

if (!file_exists($sourceImage)) {
    echo "Error: Image not found at {$sourceImage}\n";
    echo "Please make sure the image is in your Downloads folder.\n";
    exit(1);
}

// Create destination path
$destinationDir = __DIR__ . '/public/images/onisan/';
if (!is_dir($destinationDir)) {
    mkdir($destinationDir, 0755, true);
}

// Generate clean filename
$extension = pathinfo($imageFilename, PATHINFO_EXTENSION);
$cleanFilename = 'onisan-' . $onisanNumber . '-historical.' . $extension;
$destinationImage = $destinationDir . $cleanFilename;

// Copy the image
if (!copy($sourceImage, $destinationImage)) {
    echo "Error: Failed to copy image\n";
    exit(1);
}

echo "✓ Image copied to: public/images/onisan/{$cleanFilename}\n";

// Update database
$dbImagePath = 'images/onisan/' . $cleanFilename;
$onisan->image_url = $dbImagePath;
$onisan->save();

echo "✓ Database updated for {$onisan->full_title}\n";
echo "\nImage successfully assigned to {$ordinal} Onisan!\n";
echo "View at: http://localhost:8000/onisan\n";

function getOrdinal($number) {
    $suffix = 'th';
    if ($number == 1) $suffix = 'st';
    elseif ($number == 2) $suffix = 'nd';
    elseif ($number == 3) $suffix = 'rd';
    return $number . $suffix;
}
