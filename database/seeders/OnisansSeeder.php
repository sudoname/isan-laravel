<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Onisan;

class OnisansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $onisans = [
            [
                'name' => 'Oba Olusua',
                'title' => 'Ilomi Ruling House',
                'full_title' => 'Oba Olusua - Ilomi Ruling House',
                'short_description' => 'Traditional ruler of Isan Ekiti from the Ilomi Ruling House',
                'biography' => 'Oba Olusua served as the traditional ruler of Isan Ekiti from the prestigious Ilomi Ruling House. His reign contributed to the development and cultural preservation of Isan Ekiti.',
                'is_current' => false,
                'is_published' => true,
                'display_order' => 1,
            ],
            [
                'name' => 'Oba Igbarubioya',
                'title' => 'Ilomi Ruling House',
                'full_title' => 'Oba Igbarubioya - Ilomi Ruling House',
                'short_description' => 'Traditional ruler of Isan Ekiti from the Ilomi Ruling House',
                'biography' => 'Oba Igbarubioya served as the traditional ruler of Isan Ekiti from the prestigious Ilomi Ruling House. His reign contributed to the development and cultural preservation of Isan Ekiti.',
                'is_current' => false,
                'is_published' => true,
                'display_order' => 2,
            ],
            [
                'name' => 'Oba Aladegbayi',
                'title' => 'Odowa Ruling House',
                'full_title' => 'Oba Aladegbayi - Odowa Ruling House',
                'short_description' => 'Traditional ruler of Isan Ekiti from the Odowa Ruling House',
                'biography' => 'Oba Aladegbayi served as the traditional ruler of Isan Ekiti from the esteemed Odowa Ruling House. His reign contributed to the development and cultural preservation of Isan Ekiti.',
                'is_current' => false,
                'is_published' => true,
                'display_order' => 3,
            ],
            [
                'name' => 'Oba Adesua',
                'title' => 'Ilomi Ruling House',
                'full_title' => 'Oba Adesua - Ilomi Ruling House',
                'short_description' => 'Traditional ruler of Isan Ekiti from the Ilomi Ruling House',
                'biography' => 'Oba Adesua served as the traditional ruler of Isan Ekiti from the prestigious Ilomi Ruling House. His reign contributed to the development and cultural preservation of Isan Ekiti.',
                'is_current' => false,
                'is_published' => true,
                'display_order' => 4,
            ],
            [
                'name' => 'Oba Adegbokun Okunade',
                'title' => 'Odowa Ruling House',
                'full_title' => 'Oba Adegbokun Okunade - Odowa Ruling House',
                'short_description' => 'Traditional ruler of Isan Ekiti from the Odowa Ruling House',
                'biography' => 'Oba Adegbokun Okunade served as the traditional ruler of Isan Ekiti from the esteemed Odowa Ruling House. His reign contributed to the development and cultural preservation of Isan Ekiti.',
                'is_current' => false,
                'is_published' => true,
                'display_order' => 5,
            ],
            [
                'name' => 'Oba Adeusi',
                'title' => 'Ilomi Ruling House',
                'full_title' => 'Oba Adeusi - Ilomi Ruling House',
                'short_description' => 'Traditional ruler of Isan Ekiti from the Ilomi Ruling House',
                'biography' => 'Oba Adeusi served as the traditional ruler of Isan Ekiti from the prestigious Ilomi Ruling House. His reign contributed to the development and cultural preservation of Isan Ekiti.',
                'is_current' => false,
                'is_published' => true,
                'display_order' => 6,
            ],
            [
                'name' => 'Oba Oyewo',
                'title' => 'Odowa Ruling House',
                'full_title' => 'Oba Oyewo - Odowa Ruling House',
                'short_description' => 'Traditional ruler of Isan Ekiti from the Odowa Ruling House',
                'biography' => 'Oba Oyewo served as the traditional ruler of Isan Ekiti from the esteemed Odowa Ruling House. His reign contributed to the development and cultural preservation of Isan Ekiti.',
                'is_current' => false,
                'is_published' => true,
                'display_order' => 7,
            ],
            [
                'name' => 'Oba Adebiyi',
                'title' => 'Ilomi Ruling House',
                'full_title' => 'Oba Adebiyi - Ilomi Ruling House',
                'short_description' => 'Traditional ruler of Isan Ekiti from the Ilomi Ruling House',
                'biography' => 'Oba Adebiyi served as the traditional ruler of Isan Ekiti from the prestigious Ilomi Ruling House. His reign contributed to the development and cultural preservation of Isan Ekiti.',
                'is_current' => false,
                'is_published' => true,
                'display_order' => 8,
            ],
            [
                'name' => 'Oba Sunday Owolabi Ajiboye (J.P.) MFR',
                'title' => 'Odowa Ruling House',
                'full_title' => 'Oba Sunday Owolabi Ajiboye (J.P.) MFR - Odowa Ruling House',
                'short_description' => 'Traditional ruler of Isan Ekiti from the Odowa Ruling House',
                'biography' => 'Oba Sunday Owolabi Ajiboye (J.P.) MFR served as the traditional ruler of Isan Ekiti from the esteemed Odowa Ruling House. A justice of the peace and recipient of the Member of the Federal Republic honor, his reign was marked by dedication to justice and community development.',
                'is_current' => false,
                'is_published' => true,
                'display_order' => 9,
            ],
            [
                'name' => 'Oba Adejuwon Gabriel Ayodele (FCIT)',
                'title' => 'Ilomi Ruling House',
                'full_title' => 'Oba Adejuwon Gabriel Ayodele (FCIT) - Ilomi Ruling House',
                'short_description' => 'Current traditional ruler of Isan Ekiti from the Ilomi Ruling House',
                'biography' => 'Oba Adejuwon Gabriel Ayodele (FCIT) is the current traditional ruler of Isan Ekiti from the prestigious Ilomi Ruling House. A Fellow of the Chartered Institute of Transport, he brings modern leadership and vision to the traditional institution while preserving the rich cultural heritage of Isan Ekiti.',
                'is_current' => true,
                'is_published' => true,
                'display_order' => 10,
            ],
        ];

        foreach ($onisans as $onisan) {
            Onisan::create($onisan);
        }
    }
}
