# Admin CMS System Setup Guide

## Overview
A comprehensive admin CMS system has been created for managing Onisans (Traditional Rulers) and News/Blog posts in your Laravel 12 application.

## What Was Created

### 1. Controllers

#### `/app/Http/Controllers/Admin/DashboardController.php`
- Main admin dashboard with statistics
- Shows total counts for Onisans, News, and Users
- Displays current Onisan
- Lists recent Onisans and News posts

#### `/app/Http/Controllers/Admin/OnisanController.php`
- Full CRUD operations for Onisan management
- Image upload handling
- Auto-slug generation from name
- Ensures only one Onisan can be marked as current
- Handles JSON arrays for achievements and development projects

#### `/app/Http/Controllers/Admin/NewsController.php`
- Full CRUD operations for News/Blog management
- Featured image upload handling
- Auto-slug generation from title
- Category management (news, blog, announcement)
- Publish/unpublish functionality with timestamps

### 2. Views

#### Admin Layout: `/resources/views/admin/layouts/admin.blade.php`
- Clean, responsive sidebar layout with Tailwind CSS
- Navigation menu with active state indicators
- Flash message display (success/error)
- TinyMCE rich text editor integration
- Font Awesome icons

#### Dashboard: `/resources/views/admin/dashboard.blade.php`
- Statistics cards for Onisans, News, and Users
- Current Onisan highlight section
- Recent Onisans list with status badges
- Recent News list with category badges
- Quick action buttons

#### Onisan Views:
- `/resources/views/admin/onisans/index.blade.php` - List all Onisans with filtering
- `/resources/views/admin/onisans/create.blade.php` - Create new Onisan
- `/resources/views/admin/onisans/edit.blade.php` - Edit existing Onisan

#### News Views:
- `/resources/views/admin/news/index.blade.php` - List all News/Blogs with category tabs
- `/resources/views/admin/news/create.blade.php` - Create new post
- `/resources/views/admin/news/edit.blade.php` - Edit existing post

### 3. Routes

Updated `/routes/web.php` with:

```php
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Onisans Management
    Route::resource('onisans', OnisanController::class);

    // News & Blog Management
    Route::resource('news', NewsController::class);
});
```

### 4. Image Directories

Created upload directories:
- `/public/images/onisan/` - For Onisan profile images
- `/public/images/news/` - For News featured images

Both directories include `.gitkeep` files for version control.

## Features Implemented

### Onisan Management
- ✅ Create, Read, Update, Delete operations
- ✅ Image upload with preview
- ✅ Rich text editor for biography
- ✅ Dynamic achievements list (add/remove fields)
- ✅ Dynamic development projects list
- ✅ Reign period tracking
- ✅ Current Onisan toggle (enforces only one)
- ✅ Published/Draft status
- ✅ Display order management
- ✅ Contact information fields
- ✅ Auto-slug generation

### News/Blog Management
- ✅ Create, Read, Update, Delete operations
- ✅ Featured image upload with preview
- ✅ Rich text editor with advanced plugins
- ✅ Category selection (News, Blog, Announcement)
- ✅ Excerpt field for listings
- ✅ Published/Draft status
- ✅ Publish date scheduling
- ✅ View count tracking
- ✅ Author tracking
- ✅ Auto-slug generation

### Admin Dashboard
- ✅ Statistics overview
- ✅ Current Onisan highlight
- ✅ Recent activity lists
- ✅ Quick action buttons
- ✅ Responsive design

### UI/UX Features
- ✅ Clean Tailwind CSS design
- ✅ Responsive layout
- ✅ Icon integration (Font Awesome)
- ✅ Flash messages (success/error)
- ✅ Form validation with error display
- ✅ Image preview on upload
- ✅ Confirmation dialogs for delete actions
- ✅ Status badges (Current, Published, Draft)
- ✅ Pagination support

## Access URLs

Once logged in as an admin user, you can access:

- **Dashboard**: `/admin/dashboard`
- **Manage Onisans**: `/admin/onisans`
- **Create Onisan**: `/admin/onisans/create`
- **Manage News**: `/admin/news`
- **Create News**: `/admin/news/create`

## Admin Middleware

The system uses the existing `AdminMiddleware` at:
- `/app/Http/Middleware/AdminMiddleware.php`

This checks for authenticated users with `is_admin` flag set to true.

## Required Dependencies

The system uses CDN-hosted dependencies (no installation needed):
- **Tailwind CSS**: For styling
- **Font Awesome 6**: For icons
- **TinyMCE 6**: For rich text editing

## Usage Notes

### Image Uploads
- Onisan images: Recommended square format, at least 500x500px, max 2MB
- News featured images: Recommended 1200x630px, max 2MB
- Accepted formats: JPEG, PNG, JPG, WEBP

### Slug Generation
- Slugs are automatically generated from titles/names
- Uses Laravel's `Str::slug()` helper
- Unique slugs should be maintained for proper routing

### Current Onisan
- Only one Onisan can be marked as "Current" at a time
- When you mark a new Onisan as current, the system automatically unmarks the previous one

### Rich Text Editor
- TinyMCE provides WYSIWYG editing for biography and news content
- Supports formatting, lists, links, images, and more
- Code view available for advanced users

### Flash Messages
- Success messages: Green background, shown for create/update/delete actions
- Error messages: Red background, shown for validation errors or failures
- Messages auto-dismissible via close button

## Database Schema Notes

### Onisan Model Fields
- name, slug, title, full_title
- short_description, biography
- image_url
- reign_start, reign_end (dates)
- is_current, is_published (booleans)
- achievements, development_projects (JSON arrays)
- palace_address, contact_email, contact_phone
- display_order (integer)

### News Model Fields
- title, slug
- excerpt, content
- featured_image
- category (enum: news, blog, announcement)
- author_id (foreign key to users)
- is_published (boolean)
- published_at (datetime)
- views (integer)

## Next Steps

To start using the admin CMS:

1. **Ensure you have an admin user**:
   ```php
   // In tinker or a seeder
   $user = User::find(1);
   $user->is_admin = true;
   $user->save();
   ```

2. **Login to your application** with an admin account

3. **Navigate to** `/admin/dashboard` to access the CMS

4. **Start managing** your Onisans and News posts!

## Support & Customization

All code is well-commented and follows Laravel best practices. You can:
- Customize views in `resources/views/admin/`
- Modify controllers in `app/Http/Controllers/Admin/`
- Adjust validation rules as needed
- Add additional fields to forms
- Customize TinyMCE configuration
- Modify upload size limits in php.ini or controller validation

## Security Notes

- All routes protected by `auth` and `admin` middleware
- File upload validation enforces allowed image types
- CSRF protection on all forms
- Delete confirmations prevent accidental data loss
- Image paths validated before deletion

---

**Created**: October 21, 2025
**Laravel Version**: 12
**PHP Version**: 8.x recommended
