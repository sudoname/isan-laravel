# Onisan Historical Images Guide

This guide explains how to add authentic historical photographs of past Onisans to the website.

## What You Need

Historical photographs of traditional Yoruba rulers (Obas) showing:
- **Traditional royal regalia**: Agbada, native wear, ceremonial robes
- **Beaded crowns (Ade)**: Traditional Yoruba royal crowns
- **Royal beads and jewelry**: Coral beads, ceremonial necklaces
- **Ceremonial staffs and accessories**
- **Black and white vintage photographs** (preferred for 1st-8th Onisans)
- **Historical portraits** from 1800s-1900s era

## Current Status

- **10th Onisan** - Oba Gabriel Ayodele Adejuwon ✅ (Has image)
- **9th Onisan** - Oba Sunday Ajiboye ✅ (Has image)
- **8th-1st Onisans** - Awaiting historical images (currently using placeholders)

## How to Add Historical Images

### Step 1: Save Your Image
1. Download or save your historical photograph
2. Place it in your **Downloads** folder
3. Name it something descriptive (e.g., `onisan8-historical.jpg`, `first-king-bw.png`)

### Step 2: Run the Update Script

```bash
cd /Users/yomi/isanekiti-laravel
php update_onisan_image.php <number> <filename>
```

### Examples:

**Add image for 8th Onisan:**
```bash
php update_onisan_image.php 8 onisan8.jpg
```

**Add image for 1st Onisan:**
```bash
php update_onisan_image.php 1 first-king-vintage.png
```

**Add image for 5th Onisan:**
```bash
php update_onisan_image.php 5 fifth-ruler-historical.jpg
```

### Step 3: Verify
Visit http://localhost:8000/onisan to see your image displayed with the vintage grayscale effect.

## Image Recommendations

### Best Practices:
- **Resolution**: Minimum 600x800 pixels (portrait orientation)
- **Format**: JPG, PNG, or WEBP
- **Style**: Historical photographs work best
- **Black & White**: Preferred for older rulers (1st-5th)
- **Sepia/Vintage**: Adds authentic 1800s-1900s feel

### Where to Find Images:
- Nigerian National Archives
- WikiCommons (search: "Nigerian traditional rulers", "Yoruba Oba")
- British Museum African Collections
- Family archives and historical societies
- Academic publications on Yoruba history

### Important Note:
These are placeholder images until actual historical records of specific past Onisans are found. The grayscale filter and "Historical Record" label indicate that detailed information is still being compiled.

## Viewing Current Placeholder Numbers

To see which Onisans need images:

```bash
cd /Users/yomi/isanekiti-laravel
php artisan tinker --execute="
  App\Models\Onisan::where('name', 'Name To Be Confirmed')
    ->orderBy('display_order')
    ->get(['full_title', 'image_url'])
    ->each(function(\$o) {
      echo \$o->full_title . ' - ' . (\$o->image_url ? 'Has image' : 'Needs image') . \"\\n\";
    });
"
```

## Tips for Historical Authenticity

1. **Match the Era**: Use images that reflect the 1800s-1900s period
2. **Royal Attire**: Look for traditional agbada, beaded crowns, and ceremonial dress
3. **Descendants of Oduduwa**: Images showing traditional Yoruba royal lineage
4. **Cultural Context**: Images should reflect Yoruba/Ekiti traditional monarchy
5. **Dignity and Majesty**: Choose images that convey royal bearing and authority

## Need Help?

If you encounter any issues with the upload script or have questions about image selection, the grayscale and opacity effects are automatically applied in the view to give all placeholder images a consistent historical appearance.
