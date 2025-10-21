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
        // 9th Onisan - Oba Sunday Ajiboye (Immediate Past)
        Onisan::create([
            'name' => 'Oba Sunday Ajiboye',
            'slug' => 'oba-sunday-ajiboye',
            'title' => 'Onisan of Isan-Ekiti',
            'full_title' => 'His Royal Majesty, Oba Sunday Ajiboye, The 9th Onisan of Isan-Ekiti',
            'short_description' => 'The 9th Onisan of Isan-Ekiti, an educator and traditional ruler who exemplified resilience and the integration of modern education with traditional leadership. His reign bridged cultural custodianship with professional accomplishment.',
            'biography' => 'Oba Sunday Ajiboye hails from Isan-Ekiti, Ekiti State, Nigeria. His life story is one of remarkable resilience and determination, rising from humble beginnings to become the traditional ruler of his community.

BACKGROUND & EARLY LIFE

Born into modest circumstances in Isan-Ekiti, young Sunday faced significant adversity including illness and financial constraints. These early challenges, however, would shape his character and fuel his determination to succeed against all odds.

EDUCATION & PROFESSIONAL PATH

As a young man, he had to interrupt his education due to family challenges — a setback that would have discouraged many. However, his passion for learning proved unstoppable. He later returned to school with renewed determination, pursuing and obtaining his Nigeria Certificate in Education (NCE) and subsequently a University degree in English Language and Educational Technology.

His academic journey continued as he enrolled in Law at Ekiti State University (then known as University of Ado-Ekiti). Though he faced a setback regarding a mathematics prerequisite, this did not diminish his pursuit of knowledge and excellence.

TEACHING CAREER

Before ascending the throne, Oba Ajiboye built a distinguished career in teaching and education administration. His dedication to education and youth development became hallmarks of his professional life, shaping countless young minds and contributing significantly to the educational landscape of Ekiti State.

ASCENSION TO THE THRONE

His selection as the 9th Onisan of Isan-Ekiti was a testament to his character, achievements, and the respect he commanded in the community. His reign marked a significant period in the town\'s history, characterized by his unique perspective as both an educator and traditional ruler.

REIGN AND CONTRIBUTIONS

Oba Ajiboye brought modern educational values into his kingship, an approach that was both innovative and impactful. Remarkably, he continued his own academic journey even after becoming traditional ruler, demonstrating that learning is a lifelong pursuit and setting an inspiring example for his subjects.

His leadership style integrated traditional wisdom with contemporary educational principles, making him a progressive monarch who understood the importance of adapting to changing times while preserving cultural heritage.

LEGACY

Oba Sunday Ajiboye\'s reign illustrates how traditional authority in Isan-Ekiti can successfully combine cultural custodianship with personal achievement. His life serves as a powerful example of resilience, showing that one\'s background does not determine one\'s destiny.

He served as a bridge between history, community development, and modern education, embodying the values of perseverance, continuous learning, and service to community. His story continues to inspire many in Isan-Ekiti and beyond, demonstrating that traditional leadership and modern professional accomplishment can coexist harmoniously.',
            'image_url' => null,
            'reign_start' => null, // Exact dates to be confirmed
            'reign_end' => '2017-01-12', // Day before current Onisan's enthronement
            'is_current' => false,
            'achievements' => [
                'Nigeria Certificate in Education (NCE)',
                'University degree in English Language and Educational Technology',
                'Distinguished career in teaching and education administration',
                'Integrated modern educational values into traditional leadership',
                'Continued academic pursuits while serving as traditional ruler',
                'Overcame significant early life adversity to become traditional ruler',
                'Promoted education and youth development throughout reign',
                'Served as bridge between traditional authority and modern education',
            ],
            'development_projects' => [
                'Educational Advancement - Promoting learning and academic excellence',
                'Youth Development Programs - Empowering young people through education',
                'Cultural Preservation - Maintaining Isan-Ekiti traditions and heritage',
                'Community Education Initiatives - Bringing modern educational values to traditional leadership',
                'Teacher Development - Supporting educators and education administration',
                'Academic Excellence Programs - Encouraging continuous learning in the community',
            ],
            'palace_address' => 'Onisan\'s Palace, Isan-Ekiti, Oye Local Government Area, Ekiti State, Nigeria',
            'contact_email' => null,
            'contact_phone' => null,
            'display_order' => 2,
            'is_published' => true,
        ]);

        // 10th Onisan - Oba Gabriel Ayodele Adejuwon (Current)
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
