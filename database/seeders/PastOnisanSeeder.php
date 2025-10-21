<?php

namespace Database\Seeders;

use App\Models\Onisan;
use Illuminate\Database\Seeder;

class PastOnisanSeeder extends Seeder
{
    public function run(): void
    {
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
            'reign_start' => null,
            'reign_end' => '2017-01-12',
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
    }
}
