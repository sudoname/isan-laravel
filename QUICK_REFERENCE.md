# Quick Reference Guide

## Admin Access
- **URL:** `/admin/dashboard`
- **Login Required:** Yes (with is_admin = 1)

## Created Files Summary

### Models (4 new, 1 updated)
```
/app/Models/SiteSetting.php      ✅ Created
/app/Models/Page.php              ✅ Created
/app/Models/Attraction.php        ✅ Created
/app/Models/Registration.php      ✅ Updated
/app/Models/Hero.php              ✅ Existing (integrated)
```

### Controllers (7 new, 1 updated)
```
/app/Http/Controllers/Admin/SiteSettingController.php    ✅ Created
/app/Http/Controllers/Admin/HeroController.php           ✅ Created
/app/Http/Controllers/Admin/PageController.php           ✅ Created
/app/Http/Controllers/Admin/AttractionController.php     ✅ Created
/app/Http/Controllers/Admin/UserController.php           ✅ Created
/app/Http/Controllers/Admin/RegistrationController.php   ✅ Created
/app/Http/Controllers/Admin/MediaController.php          ✅ Created
/app/Http/Controllers/Admin/DashboardController.php      ✅ Updated
```

### Migrations (3 new)
```
database/migrations/2025_10_21_193601_create_site_settings_table.php   ✅ Run
database/migrations/2025_10_21_193731_create_pages_table.php           ✅ Run
database/migrations/2025_10_21_193755_create_attractions_table.php     ✅ Run
```

### Seeders (2 new)
```
database/seeders/SiteSettingSeeder.php   ✅ Run
database/seeders/PageSeeder.php          ✅ Run
```

### Views (2 created, others need creation)
```
resources/views/admin/dashboard.blade.php                ✅ Updated
resources/views/admin/layouts/admin.blade.php            ✅ Updated
resources/views/admin/site-settings/edit.blade.php       ✅ Created

⚠️ Still needed:
resources/views/admin/heroes/index.blade.php
resources/views/admin/heroes/create.blade.php
resources/views/admin/heroes/edit.blade.php
resources/views/admin/pages/index.blade.php
resources/views/admin/pages/create.blade.php
resources/views/admin/pages/edit.blade.php
resources/views/admin/attractions/index.blade.php
resources/views/admin/attractions/create.blade.php
resources/views/admin/attractions/edit.blade.php
resources/views/admin/users/index.blade.php
resources/views/admin/users/edit.blade.php
resources/views/admin/registrations/index.blade.php
resources/views/admin/registrations/show.blade.php
resources/views/admin/media/index.blade.php
```

### Documentation (4 files)
```
CMS_IMPLEMENTATION_GUIDE.md    ✅ Complete implementation guide
CMS_COMPLETION_SUMMARY.md      ✅ Project status and next steps
VIEWS_TEMPLATES.md             ✅ View file templates
QUICK_REFERENCE.md             ✅ This file
```

### Routes (1 updated)
```
routes/web.php   ✅ All new routes added
```

## Routes Added

```php
// Site Settings
GET    /admin/settings          -> SiteSettingController@edit
PUT    /admin/settings          -> SiteSettingController@update

// Heroes (Resource)
GET    /admin/heroes            -> HeroController@index
GET    /admin/heroes/create     -> HeroController@create
POST   /admin/heroes            -> HeroController@store
GET    /admin/heroes/{id}       -> HeroController@show
GET    /admin/heroes/{id}/edit  -> HeroController@edit
PUT    /admin/heroes/{id}       -> HeroController@update
DELETE /admin/heroes/{id}       -> HeroController@destroy

// Pages (Resource - same pattern as heroes)
// Attractions (Resource - same pattern as heroes)

// Users (Partial Resource)
GET    /admin/users             -> UserController@index
GET    /admin/users/{id}/edit   -> UserController@edit
PUT    /admin/users/{id}        -> UserController@update
DELETE /admin/users/{id}        -> UserController@destroy

// Registrations (Limited)
GET    /admin/registrations     -> RegistrationController@index
GET    /admin/registrations/{id}-> RegistrationController@show
DELETE /admin/registrations/{id}-> RegistrationController@destroy

// Media Library
GET    /admin/media             -> MediaController@index
POST   /admin/media/upload      -> MediaController@upload
DELETE /admin/media             -> MediaController@destroy
```

## Database Tables

### site_settings (Singleton)
```sql
- id
- site_name
- site_tagline
- site_description
- logo_url
- favicon_url
- homepage_hero_image
- homepage_hero_title
- homepage_hero_subtitle
- contact_email
- contact_phone
- contact_address
- social_facebook, social_twitter, social_instagram, social_youtube, social_linkedin
- footer_text
- footer_copyright
- google_maps_embed_url
- timestamps
```

### pages
```sql
- id
- title
- slug (unique)
- content (longtext)
- meta_description
- featured_image
- is_published
- display_order
- timestamps
- deleted_at (soft delete)
```

### attractions
```sql
- id
- name
- slug (unique)
- description
- full_description
- image_url
- location
- category
- is_featured
- is_published
- display_order
- timestamps
- deleted_at (soft delete)
```

## Quick Commands

### View Routes
```bash
php artisan route:list --path=admin
```

### Clear Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan view:clear
```

### Re-run Migrations (Caution: Data loss)
```bash
php artisan migrate:fresh --seed
```

### Just Seed Again
```bash
php artisan db:seed --class=SiteSettingSeeder
php artisan db:seed --class=PageSeeder
```

### Create Symbolic Link (for public storage)
```bash
php artisan storage:link
```

## File Upload Paths

All uploads go to `storage/app/public/`:
- `storage/app/public/settings/` - Site settings images
- `storage/app/public/heroes/` - Hero portraits
- `storage/app/public/pages/` - Page featured images
- `storage/app/public/attractions/` - Attraction images
- `storage/app/public/media/` - Media library files
- `storage/app/public/onisans/` - Onisan images (existing)
- `storage/app/public/news/` - News images (existing)

**Public Access:** `public/storage/` (via symlink)

## Usage Examples

### Access Settings in Any View
```php
@php
    $settings = \App\Models\SiteSetting::getSettings();
@endphp

{{ $settings->site_name }}
{{ $settings->contact_email }}
@if($settings->logo_url)
    <img src="{{ asset('storage/' . $settings->logo_url) }}">
@endif
```

### Query Pages
```php
// Get all published pages
$pages = Page::published()->ordered()->get();

// Get single page by slug
$page = Page::where('slug', 'about-us')->published()->firstOrFail();
```

### Query Attractions
```php
// Get featured attractions
$featured = Attraction::featured()->published()->ordered()->get();

// Get by category
$historical = Attraction::category('Historical')->published()->get();
```

### Query Heroes
```php
// Get all published heroes
$heroes = Hero::published()->ordered()->get();

// Get featured heroes
$featured = Hero::featured()->published()->take(6)->get();

// Get by category
$academics = Hero::where('category', 'Academia')->published()->get();
```

## Common Tasks

### Make a User Admin
```sql
UPDATE users SET is_admin = 1 WHERE email = 'admin@example.com';
```

Or via Tinker:
```php
php artisan tinker
$user = User::where('email', 'admin@example.com')->first();
$user->is_admin = true;
$user->save();
```

### Update Site Name
```php
$settings = SiteSetting::first();
$settings->site_name = 'New Name';
$settings->save();
```

### Create a New Page
```php
Page::create([
    'title' => 'New Page',
    'slug' => 'new-page',
    'content' => '<p>Page content here</p>',
    'is_published' => true,
    'display_order' => 10,
]);
```

## Troubleshooting

### Images Not Displaying
1. Check storage link: `php artisan storage:link`
2. Check file permissions: `chmod -R 775 storage`
3. Check paths use `storage/` not `public/`

### Routes Not Found
1. Clear route cache: `php artisan route:clear`
2. Check route list: `php artisan route:list`

### Settings Not Saving
1. Check CSRF token in form
2. Check validation errors
3. Check file upload sizes

### Can't Access Admin
1. Verify user has `is_admin = 1`
2. Check middleware on routes
3. Clear auth sessions

## Default Data

### Seeded Pages
1. About Us (`about-us`)
2. History of Isan Ekiti (`history`)
3. Isan Day (`isan-day`)
4. Attractions (`attractions`)

### Default Settings
- Site Name: Isan Ekiti
- Tagline: Preserving Our Heritage, Building Our Future
- Contact: info@isanekiti.com
- Social Media: Sample URLs (update in admin)

## Performance Tips

1. **Cache Settings:** Site settings are accessed frequently
   ```php
   Cache::remember('site_settings', 3600, function() {
       return SiteSetting::first();
   });
   ```

2. **Eager Loading:** Load relationships together
   ```php
   $registrations = Registration::with('user')->get();
   ```

3. **Pagination:** Always paginate large lists
   ```php
   $heroes = Hero::paginate(15);
   ```

## Security Checklist

- ✅ Admin middleware on all routes
- ✅ CSRF protection on forms
- ✅ File upload validation
- ✅ Password hashing
- ✅ SQL injection protection (Eloquent)
- ✅ XSS protection (Blade escaping)

## Support

For detailed information, see:
- `CMS_IMPLEMENTATION_GUIDE.md` - Full implementation details
- `CMS_COMPLETION_SUMMARY.md` - Project status
- `VIEWS_TEMPLATES.md` - View file templates

---

**Last Updated:** October 21, 2025
**Status:** Backend Complete, Views Pending
