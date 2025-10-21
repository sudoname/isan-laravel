<?php

namespace Database\Seeders;

use App\Models\Onisan;
use Illuminate\Database\Seeder;

class AllPastOnisansSeeder extends Seeder
{
    public function run(): void
    {
        // Create placeholder entries for the 1st through 8th Onisans
        for ($i = 1; $i <= 8; $i++) {
            $ordinal = $this->getOrdinal($i);

            Onisan::create([
                'name' => 'Name To Be Confirmed',
                'slug' => "onisan-{$i}-placeholder",
                'title' => 'Onisan of Isan-Ekiti',
                'full_title' => "His Royal Majesty, The {$ordinal} Onisan of Isan-Ekiti",
                'short_description' => "The {$ordinal} Onisan of Isan-Ekiti. Historical records and detailed information about this distinguished traditional ruler are currently being compiled and will be added soon.",
                'biography' => "Historical information about the {$ordinal} Onisan of Isan-Ekiti is currently being researched and compiled.

ROYAL LINEAGE

The {$ordinal} Onisan was one of the distinguished traditional rulers who shaped the history and development of Isan-Ekiti. Detailed information about his reign, achievements, and contributions to the community will be added as historical records are gathered and verified.

HISTORICAL SIGNIFICANCE

Each Onisan has played a vital role in preserving the culture, heritage, and traditions of Isan-Ekiti. The {$ordinal} Onisan's legacy continues to be an important part of our royal lineage.

We are working diligently to compile comprehensive historical records for all past Onisans to honor their memory and preserve our rich heritage for future generations.",
                'image_url' => null,
                'reign_start' => null,
                'reign_end' => null,
                'is_current' => false,
                'achievements' => [
                    'Served as traditional ruler of Isan-Ekiti',
                    'Preserved cultural heritage and traditions',
                    'Part of the distinguished royal lineage',
                ],
                'development_projects' => [
                    'Cultural Preservation',
                    'Community Leadership',
                    'Traditional Governance',
                ],
                'palace_address' => 'Onisan\'s Palace, Isan-Ekiti, Oye Local Government Area, Ekiti State, Nigeria',
                'contact_email' => null,
                'contact_phone' => null,
                'display_order' => 10 - $i + 1, // So 1st gets order 10, 2nd gets 9, etc.
                'is_published' => true,
            ]);
        }
    }

    private function getOrdinal($number)
    {
        $suffix = 'th';
        if ($number == 1) $suffix = 'st';
        elseif ($number == 2) $suffix = 'nd';
        elseif ($number == 3) $suffix = 'rd';

        return $number . $suffix;
    }
}
