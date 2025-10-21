<?php

namespace Database\Seeders;

use App\Models\Onisan;
use Illuminate\Database\Seeder;

class OnisanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Onisan::create([
            'name' => 'Oba Gabriel Ayodele Adejuwon',
            'slug' => 'oba-gabriel-ayodele-adejuwon',
            'title' => 'Onisan of Isan-Ekiti',
            'full_title' => 'His Royal Majesty, Oba Gabriel Ayodele Adejuwon, The 10th Onisan of Isan-Ekiti',
            'short_description' => 'The 10th Onisan of Isan-Ekiti, a distinguished professional with over two decades of experience in taxation and financial management, who embodies modern leadership while preserving cultural heritage. Currently serves as Chairman of the Ekiti State Council of Traditional Rulers.',
            'biography' => 'Oba Gabriel Ayodele Adejuwon was born on 15 November 1970 in Isan-Ekiti. He began his primary education at St. Paul\'s Anglican Primary School, Isan-Ekiti (1976–1982), and proceeded to Isan Secondary School (1982–1987/88) where he obtained his West African School Certificate.

For tertiary education, he attended the then Ondo State Polytechnic (now Rufus Giwa Polytechnic) where he earned his Ordinary and Higher National Diplomas in Business Administration and Management (1993 & 1997). He then studied at Adekunle Ajasin University, Akungba, Ondo State, obtaining a Post Graduate Diploma in Financial Management in 2000 and an MBA in Finance in 2002.

He holds professional fellowships and memberships, including being a Fellow of the Chartered Institute of Taxation of Nigeria (FCTI), Associate of the Certified Board of Administrators (ACBA), and Associate Member of the Institute of Debts Recovery of Nigeria.

PROFESSIONAL CAREER

Prior to ascending the throne, Oba Adejuwon had a distinguished career spanning over two decades with the Federal Inland Revenue Service (FIRS), where he specialised in taxation, auditing and financial management. His professional expertise brought him recognition in the field of public finance and taxation.

In addition to his professional work, he was also active in church ministry, having studied theology and served as a deacon and assistant pastor in the Redeemed Christian Church of God before his enthronement.

ASCENSION TO THE THRONE

On 13 January 2017, he was enthroned as the 10th Onisan of Isan-Ekiti, from the Adejuwon family of Ilomi ruling house. His ascension marked the beginning of a new era of progressive traditional leadership that combines professional expertise with royal duties.

LEADERSHIP & GOVERNANCE

As Onisan, his role encompasses being the traditional ruler and cultural custodian of Isan-Ekiti, engaging in community leadership, conflict resolution, and representing the town in broader state traditional institutions. In August 2021, he was appointed by the Governor of Ekiti State as Chairman of the Ekiti State Council of Traditional Rulers, a testament to his leadership capabilities and respect among his peers.

COMMUNITY IMPACT & VISION

Oba Adejuwon is noted for promoting youth empowerment, education, community development, and ethical leadership. He has organized educational symposia, empowered youths with tools and employment support, and provided assistance to widows in his community.

His Royal Majesty embodies a modern traditional ruler who bridges professional expertise with royal duties. His tenure reflects a blend of cultural stewardship and developmental orientation, with emphasis on education, youth engagement and community uplift. For Isan-Ekiti, his leadership marks a phase of active engagement in state-wide traditional institution affairs and local empowerment.

PERSONAL LIFE

He is married to Olori Christianah Funke Adejuwon and the couple are blessed with children. Together they have worked to support community development initiatives and cultural preservation in Isan-Ekiti.',
            'image_url' => null, // Will be updated with actual image later
            'reign_start' => '2017-01-13',
            'reign_end' => null,
            'is_current' => true,
            'achievements' => [
                'Appointed Chairman of the Ekiti State Council of Traditional Rulers (August 2021)',
                'Over 20 years of distinguished service with Federal Inland Revenue Service (FIRS)',
                'Fellow of the Chartered Institute of Taxation of Nigeria (FCTI)',
                'Associate of the Certified Board of Administrators (ACBA)',
                'Associate Member of the Institute of Debts Recovery of Nigeria',
                'Master of Business Administration (MBA) in Finance',
                'Post Graduate Diploma in Financial Management',
                'Ordained deacon and served as assistant pastor in RCCG',
                'Recognized for promoting youth empowerment and education',
                'Organized multiple educational symposia for community development',
            ],
            'development_projects' => [
                'Youth Empowerment Programs - Providing tools and employment support',
                'Educational Symposia - Organizing knowledge-sharing events for community',
                'Widows Support Initiative - Financial and material assistance to widows',
                'Cultural Preservation Programs - Maintaining Isan-Ekiti heritage and traditions',
                'Community Peace Building - Conflict resolution and unity initiatives',
                'Education Advocacy - Promoting academic excellence among youth',
                'Traditional Institution Modernization - Bringing professional governance to royal duties',
                'State-wide Traditional Leadership - Coordinating with other traditional rulers',
            ],
            'palace_address' => 'Onisan\'s Palace, Isan-Ekiti, Oye Local Government Area, Ekiti State, Nigeria',
            'contact_email' => null, // Can be added later if available
            'contact_phone' => null, // Can be added later if available
            'display_order' => 1,
            'is_published' => true,
        ]);
    }
}
