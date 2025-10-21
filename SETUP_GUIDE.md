# Isan Ekiti Laravel Website - Setup Guide

## 🚀 Project Overview

A full-featured Laravel 12 application for Isan Ekiti community with:
- **Authentication System**: User registration, login, and profile management (Laravel Breeze)
- **Indigene Registration**: Form for community members to register
- **Blog/News System**: Content management for community updates
- **Forum**: Community discussion platform
- **Admin Dashboard**: Content moderation and management
- **Responsive Design**: Tailwind CSS with mobile-first approach

## 📋 What's Already Set Up

✅ **Laravel 12** installed
✅ **Laravel Breeze** (authentication) with Blade templates
✅ **Tailwind CSS** configured
✅ **Database Migrations** created and run
✅ **Models** created for all features
✅ **Controllers** created for all pages

### Database Tables Created:
- `users` - User accounts with admin flag and profile fields
- `registrations` - Indigene registration submissions
- `posts` - Blog posts/news articles
- `forum_categories` - Forum category organization
- `forum_topics` - Forum discussion topics
- `forum_replies` - Replies to forum topics

## 🔧 Quick Start

### 1. Start the Development Server

```bash
cd /Users/yomi/isanekiti-laravel
php artisan serve
```

Then open http://localhost:8000 in your browser.

### 2. Create Your First Admin User

After registering a user account, run this command to make yourself an admin:

```bash
php artisan tinker
```

Then in the tinker console:
```php
$user = App\Models\User::where('email', 'your-email@example.com')->first();
$user->is_admin = true;
$user->save();
exit
```

### 3. Seed Default Forum Categories

You can manually add forum categories through the admin panel, or run:

```bash
php artisan tinker
```

```php
use App\Models\ForumCategory;

ForumCategory::create(['name' => 'General Discussion', 'description' => 'General topics about Isan Ekiti', 'slug' => 'general']);
ForumCategory::create(['name' => 'Events & Celebrations', 'description' => 'Discuss upcoming events', 'slug' => 'events']);
ForumCategory::create(['name' => 'Development & Infrastructure', 'description' => 'Town development discussions', 'slug' => 'development']);
ForumCategory::create(['name' => 'Culture & Heritage', 'description' => 'Share our cultural heritage', 'slug' => 'culture']);
ForumCategory::create(['name' => 'Help & Support', 'description' => 'Get help from the community', 'slug' => 'support']);
exit
```

## 📁 Project Structure

```
isanekiti-laravel/
├── app/
│   ├── Http/Controllers/
│   │   ├── HomeController.php
│   │   ├── PageController.php          # Static pages (History, Heroes, etc.)
│   │   ├── RegistrationController.php  # Indigene registration
│   │   ├── PostController.php          # Blog/News
│   │   ├── ForumController.php         # Forum features
│   │   └── Admin/
│   │       └── AdminController.php     # Admin dashboard
│   └── Models/
│       ├── User.php
│       ├── Registration.php
│       ├── Post.php
│       ├── ForumCategory.php
│       ├── ForumTopic.php
│       └── ForumReply.php
├── database/
│   └── migrations/                     # All database tables
├── resources/
│   └── views/                          # Blade templates (to be created)
└── routes/
    └── web.php                         # Application routes
```

## 📝 Next Steps

### Immediate Tasks:
1. **Create Blade Templates** for all pages:
   - Homepage with hero section
   - History, Heroes, Attractions pages
   - Registration form
   - Blog/News listing and detail pages
   - Forum categories, topics, and replies
   - Admin dashboard

2. **Implement Controllers** with business logic:
   - Homepage controller with featured content
   - Registration form processing
   - Blog CRUD operations
   - Forum functionality
   - Admin approval workflows

3. **Set Up Routes** in `routes/web.php`

4. **Add Styling** with Tailwind CSS

5. **Image Management**:
   - Create storage link: `php artisan storage:link`
   - Upload images for attractions, news, etc.

## 🎨 Pages to Build

### Public Pages:
- **Home** (`/`) - Hero section, features, latest news
- **History** (`/history`) - Town history with timeline
- **Heroes** (`/heroes`) - Notable indigenes
- **Attractions** (`/attractions`) - Tourist sites and landmarks
- **Isan Day** (`/isan-day`) - Annual celebration info
- **Contact** (`/contact`) - Contact form
- **Registration** (`/registration`) - Indigene registration form

### Blog/News:
- **News Index** (`/news`) - List all posts
- **News Detail** (`/news/{slug}`) - Single post view

### Forum:
- **Forum Index** (`/forum`) - List categories
- **Category View** (`/forum/{category}`) - Topics in category
- **Topic View** (`/forum/topic/{id}`) - Topic with replies
- **Create Topic** (`/forum/create`) - New topic form

### Admin (Protected):
- **Dashboard** (`/admin`) - Overview and stats
- **Manage Posts** (`/admin/posts`) - Create/edit/delete posts
- **Manage Registrations** (`/admin/registrations`) - Approve/reject
- **Manage Forum** (`/admin/forum`) - Moderate discussions

## 🔒 Authentication Routes (Already Set Up by Breeze)

- `/register` - User registration
- `/login` - User login
- `/dashboard` - User dashboard
- `/profile` - Edit profile
- `/logout` - Logout

## 🗄️ Database Configuration

The application uses SQLite by default (located at `database/database.sqlite`).

To use MySQL instead, update `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=isanekiti
DB_USERNAME=root
DB_PASSWORD=
```

Then create the database and run migrations again:
```bash
mysql -u root -e "CREATE DATABASE isanekiti"
php artisan migrate:fresh
```

## 🚀 Deployment

### Prepare for Production:

1. **Environment Setup**:
```bash
cp .env .env.production
# Edit .env.production with production values
```

2. **Optimize Application**:
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan optimize
```

3. **Build Assets**:
```bash
npm run build
```

### Deploy to Hosting:

**Option 1: Traditional Hosting (cPanel, etc.)**
- Upload files to server
- Point domain to `public` directory
- Set up database
- Run migrations on server
- Set correct file permissions

**Option 2: Cloud Hosting (Digital Ocean, AWS, etc.)**
- Use Laravel Forge or Envoyer for easy deployment
- Or manually set up LEMP stack (Linux, Nginx, MySQL, PHP)

## 🆘 Troubleshooting

**Issue**: Database connection errors
- Check `.env` file database credentials
- Ensure SQLite file exists: `touch database/database.sqlite`
- Or switch to MySQL and create database

**Issue**: Permission errors
- Fix storage permissions: `chmod -R 775 storage bootstrap/cache`

**Issue**: CSS not loading
- Run: `npm install && npm run build`

**Issue**: Routes not working
- Clear route cache: `php artisan route:clear`
- Check web server configuration

## 🔗 Useful Commands

```bash
# Start development server
php artisan serve

# Run migrations
php artisan migrate

# Reset database
php artisan migrate:fresh

# Create new model
php artisan make:model ModelName

# Create new controller
php artisan make:controller ControllerName

# Create storage link for public file access
php artisan storage:link

# Clear all caches
php artisan optimize:clear

# Run tests
php artisan test
```

## 📞 Support

For issues or questions about this setup:
- Laravel Documentation: https://laravel.com/docs
- Tailwind CSS: https://tailwindcss.com/docs
- Laravel Breeze: https://laravel.com/docs/starter-kits#breeze

---

Built with ❤️ for the Isan Ekiti community
