# Admin CMS Quick Start Guide

## Installation Steps

### 1. Run Migrations (if needed)

If the `is_admin` column doesn't exist in your users table, run:

```bash
php artisan migrate
```

This will add the `is_admin` column to the users table.

### 2. Create Admin User

Run the seeder to create an admin user:

```bash
php artisan db:seed --class=AdminUserSeeder
```

**Default Admin Credentials:**
- Email: `admin@isanekiti.com`
- Password: `password`

> **Important:** Change the password immediately after first login in production!

### 3. Access Admin Panel

1. Start your Laravel development server (if not already running):
   ```bash
   php artisan serve
   ```

2. Visit: `http://localhost:8000/login`

3. Login with admin credentials

4. Navigate to: `http://localhost:8000/admin/dashboard`

## Admin Panel URLs

Once logged in as admin, you can access:

| Section | URL | Description |
|---------|-----|-------------|
| Dashboard | `/admin/dashboard` | Admin home with statistics |
| Manage Onisans | `/admin/onisans` | List all Onisans |
| Create Onisan | `/admin/onisans/create` | Add new Onisan |
| Edit Onisan | `/admin/onisans/{id}/edit` | Edit specific Onisan |
| Manage News | `/admin/news` | List all news posts |
| Create News | `/admin/news/create` | Add new news post |
| Edit News | `/admin/news/{id}/edit` | Edit specific news post |

## Make Existing User Admin

If you want to make an existing user an admin, use Laravel Tinker:

```bash
php artisan tinker
```

Then run:

```php
$user = User::where('email', 'your-email@example.com')->first();
$user->is_admin = true;
$user->save();
exit
```

Or update directly in database:

```sql
UPDATE users SET is_admin = 1 WHERE email = 'your-email@example.com';
```

## Features Overview

### Onisan Management
- Create/edit/delete Onisan profiles
- Upload profile images
- Rich text biography editor
- Manage achievements and development projects
- Track reign periods
- Mark current Onisan (only one at a time)
- Publish/unpublish

### News & Blog Management
- Create/edit/delete news posts
- Upload featured images
- Rich text content editor
- Categories: News, Blog, Announcement
- Schedule publishing
- Track views
- Publish/unpublish

### Dashboard
- Statistics cards
- Recent activity
- Quick actions
- Current Onisan highlight

## File Upload Limits

Default limits:
- Maximum file size: 2MB
- Allowed formats: JPEG, PNG, JPG, WEBP

To increase limits, update:

1. **php.ini**:
   ```ini
   upload_max_filesize = 10M
   post_max_size = 10M
   ```

2. **Validation rules** in controllers if needed

## Directory Permissions

Ensure upload directories are writable:

```bash
chmod -R 775 public/images/onisan
chmod -R 775 public/images/news
```

## Troubleshooting

### Issue: Cannot access admin panel (403 error)
**Solution:** Ensure your user has `is_admin = true` in the database

### Issue: Images not uploading
**Solution:**
- Check directory permissions (775 or 777)
- Verify php.ini upload limits
- Check available disk space

### Issue: TinyMCE not loading
**Solution:**
- Check internet connection (uses CDN)
- Check browser console for errors
- Ensure no ad-blockers are interfering

### Issue: Routes not found
**Solution:**
- Clear route cache: `php artisan route:clear`
- Clear config cache: `php artisan config:clear`
- Restart development server

## Security Reminders

1. **Change default admin password** immediately
2. **Use strong passwords** in production
3. **Enable HTTPS** in production
4. **Keep Laravel updated** for security patches
5. **Validate all uploads** (already implemented)
6. **Backup database** regularly

## Development Tips

### Clear Caches
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Check Routes
```bash
php artisan route:list --name=admin
```

### Database Refresh (Development Only)
```bash
php artisan migrate:fresh --seed
php artisan db:seed --class=AdminUserSeeder
```

## Support

For detailed documentation, see: `ADMIN_CMS_SETUP.md`

For Laravel documentation: https://laravel.com/docs

---

**Quick Access Checklist:**
- [ ] Run migrations
- [ ] Create admin user (or update existing)
- [ ] Login as admin
- [ ] Access /admin/dashboard
- [ ] Create your first Onisan
- [ ] Create your first news post
- [ ] Change admin password!
