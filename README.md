# 🎉 Event Management System

A modern, full-featured event management application built with Laravel 12, featuring a beautiful dark theme UI and comprehensive event booking functionality.

![Laravel](https://img.shields.io/badge/Laravel-12.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-3.4-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![SQLite](https://img.shields.io/badge/SQLite-3-003B57?style=for-the-badge&logo=sqlite&logoColor=white)

## ✨ Features

- **Event Management**: Create, edit, view, and delete events with full CRUD operations
- **Event Booking System**: Users can book and manage their event registrations
- **Capacity Management**: Automatic tracking of available slots and booking limits
- **Dark Theme UI**: Beautiful, modern dark theme interface with smooth animations
- **Image Uploads**: Support for event images with size validation (max 2MB)
- **User Authentication**: Secure login and registration with Laravel Jetstream
- **Responsive Design**: Mobile-friendly interface using Tailwind CSS
- **SQLite Database**: Easy setup with SQLite for development
- **Real-time Validation**: Client and server-side form validation
- **Theme Toggle**: Switch between dark and light modes

## 🚀 Tech Stack

### Backend
- **Framework**: Laravel 12.8.1
- **PHP Version**: 8.2+
- **Authentication**: Laravel Jetstream with Livewire
- **Session Management**: File-based sessions
- **Database**: SQLite (development) - easily switchable to MySQL/PostgreSQL
- **Storage**: Local filesystem with symlink to public directory

### Frontend
- **CSS Framework**: Tailwind CSS 3.4
- **JavaScript**: Alpine.js (via Livewire)
- **UI Components**: Livewire 3.0
- **Icons**: Font Awesome 6.5.0
- **Animations**: Animate.css 4.1.1
- **Build Tool**: Vite 6.2.4

### Development Tools
- **Package Manager**: Composer, NPM
- **Code Quality**: Laravel Pint (PHP CS Fixer)
- **Testing**: PHPUnit 11.5

## 📁 Project Structure

```
event-management/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── EventController.php      # Event CRUD operations
│   │       ├── BookingController.php    # Booking management
│   │       └── HomeController.php       # Dashboard/welcome page
│   └── Models/
│       ├── User.php                     # User model with Jetstream
│       ├── Event.php                    # Event model
│       └── Booking.php                  # Booking model
│
├── database/
│   ├── migrations/
│   │   ├── create_users_table           # Users with 2FA support
│   │   ├── create_events_table          # Events with all details
│   │   └── create_bookings_table        # User-Event bookings
│   └── database.sqlite                  # SQLite database file
│
├── resources/
│   ├── views/
│   │   ├── events/
│   │   │   ├── index.blade.php          # List all events
│   │   │   ├── create.blade.php         # Create new event
│   │   │   ├── edit.blade.php           # Edit event
│   │   │   └── show.blade.php           # Event details & booking
│   │   ├── bookings/
│   │   │   └── index.blade.php          # User's booked events
│   │   ├── layouts/
│   │   │   ├── app.blade.php            # Main layout with dark theme
│   │   │   ├── footer.blade.php         # Footer component
│   │   │   └── navbar.blade.php         # Navigation bar
│   │   └── welcome.blade.php            # Landing page
│   ├── css/
│   │   └── app.css                      # Tailwind CSS imports
│   └── js/
│       └── app.js                       # Alpine.js & Livewire
│
├── routes/
│   └── web.php                          # Application routes
│
├── storage/
│   ├── app/
│   │   └── public/                      # Uploaded event images stored here
│   ├── framework/                       # Framework cache, sessions, views
│   └── logs/                            # Application logs
│
└── public/
    ├── storage/                         # Symlinked to storage/app/public
    └── index.php                        # Application entry point
```

## 🗄️ Database Schema

### Users Table
- `id` - Primary key
- `name` - User's full name
- `email` - Unique email address
- `password` - Hashed password
- `email_verified_at` - Email verification timestamp
- `two_factor_secret` - 2FA secret (Jetstream)
- `two_factor_recovery_codes` - 2FA recovery codes
- `profile_photo_path` - Profile picture path
- `created_at`, `updated_at` - Timestamps

### Events Table
- `id` - Primary key
- `title` - Event name
- `description` - Event details
- `location` - Event venue
- `date` - Event date
- `time` - Event time
- `capacity` - Maximum attendees
- `image` - Event image path (stored in storage/app/public)
- `user_id` - Foreign key to users (event creator)
- `created_at`, `updated_at` - Timestamps

### Bookings Table
- `id` - Primary key
- `user_id` - Foreign key to users (who booked)
- `event_id` - Foreign key to events (what event)
- `created_at`, `updated_at` - Timestamps
- **Unique constraint**: `user_id + event_id` (prevents double booking)

## 💾 Storage Configuration

### File Storage
- **Location**: `storage/app/public/`
- **Public Access**: Symlinked to `public/storage/`
- **Uploaded Files**: Event images
- **Max Upload Size**: 2MB (validated on client and server)
- **Allowed Formats**: Images (jpg, jpeg, png, gif, webp)

### Session Storage
- **Driver**: File-based
- **Location**: `storage/framework/sessions/`
- **Lifetime**: 120 minutes

### Cache Storage
- **Driver**: File-based
- **Location**: `storage/framework/cache/`

### Logs
- **Location**: `storage/logs/laravel.log`
- **Channel**: Stack (single file)

## 📋 Requirements

- **PHP**: 8.2 or higher
- **Composer**: Latest version
- **Node.js**: 16.x or higher
- **NPM**: 8.x or higher
- **PHP Extensions**:
  - SQLite3 (for database)
  - PDO (for database connections)
  - GD or Imagick (for image processing)
  - OpenSSL
  - Mbstring
  - JSON
  - Fileinfo

## 🛠️ Installation Guide

### Step 1: Clone the Repository
```bash
git clone https://github.com/kinshukkush/event-management.git
cd event-management
```

### Step 2: Install Backend Dependencies
```bash
composer install
```
This installs all PHP packages including Laravel, Jetstream, Livewire, etc.

### Step 3: Install Frontend Dependencies
```bash
npm install
```
This installs Tailwind CSS, Vite, and other Node.js packages.

### Step 4: Environment Configuration
```bash
# Copy the environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

**Important**: The `.env` file contains:
- `DB_CONNECTION=sqlite` - Database configuration
- `APP_URL` - Your application URL
- Session, cache, and queue settings

### Step 5: Database Setup
```bash
# Create SQLite database file (Windows)
type nul > database/database.sqlite

# Or on Linux/Mac
touch database/database.sqlite

# Run migrations to create tables
php artisan migrate

# Create storage symlink for file uploads
php artisan storage:link
```

### Step 6: Build Frontend Assets
```bash
# For production
npm run build

# For development with hot reload
npm run dev
```

### Step 7: Start the Development Server
```bash
php artisan serve
```

Visit **http://127.0.0.1:8000** in your browser.

### Step 8: Create Your First User
Either:
1. **Register** through the web interface at `/register`
2. Or use Tinker to create a user:
```bash
php artisan tinker
```
```php
$user = new App\Models\User();
$user->name = 'Your Name';
$user->email = 'your@email.com';
$user->password = bcrypt('password123');
$user->email_verified_at = now();
$user->save();
```

## 🎨 UI/UX Features

### Dark Theme Design
- **Primary Background**: Gray-900 (#111827)
- **Card Background**: Gray-800 (#1F2937)
- **Accent Colors**: Pink-500, Purple-500
- **Text**: White and Gray-100 for readability
- **Borders**: Gray-700 with hover effects
- **Shadows**: Enhanced shadow-xl for depth

### Responsive Breakpoints
- **Mobile**: < 640px
- **Tablet**: 640px - 1024px
- **Desktop**: > 1024px

### Animations
- Smooth transitions (300ms ease-in-out)
- Hover scale effects (scale-105, scale-110)
- Gradient animations on landing page
- Fade-in animations for cards

## 🔐 Security Features

- **Authentication**: Laravel Jetstream with session management
- **Password Hashing**: Bcrypt with 12 rounds
- **CSRF Protection**: Enabled on all forms
- **SQL Injection Prevention**: Eloquent ORM with prepared statements
- **XSS Protection**: Blade templating engine auto-escapes output
- **File Upload Validation**: Type and size validation (max 2MB)
- **Two-Factor Authentication**: Available through Jetstream

## 🚀 Key Functionalities

### Event Management
1. **Create Event**: Form with title, description, location, date, time, capacity, and image
2. **View Events**: Grid layout with event cards showing key details
3. **Event Details**: Full event information with booking button
4. **Edit Event**: Update event information (creator only)
5. **Delete Event**: Remove events (creator only)

### Booking System
1. **Book Event**: One-click booking with capacity check
2. **View Bookings**: See all your booked events
3. **Cancel Booking**: Remove your booking from an event
4. **Duplicate Prevention**: Can't book the same event twice
5. **Capacity Management**: Events show available slots

### User Features
- Registration with email verification
- Login with "Remember Me" option
- Profile management (via Jetstream)
- Password reset functionality
- Two-factor authentication (optional)

## 🔄 API Endpoints

### Public Routes
- `GET /` - Welcome page
- `GET /login` - Login page
- `POST /login` - Login action
- `GET /register` - Registration page
- `POST /register` - Registration action

### Protected Routes (Requires Authentication)
- `GET /dashboard` - User dashboard
- `GET /events` - List all events
- `GET /events/create` - Create event form
- `POST /events` - Store new event
- `GET /events/{id}` - Show event details
- `GET /events/{id}/edit` - Edit event form
- `PUT /events/{id}` - Update event
- `DELETE /events/{id}` - Delete event
- `POST /events/{id}/book` - Book an event
- `GET /my-bookings` - View user's bookings
- `DELETE /bookings/{id}` - Cancel booking

## 📊 Application Flow

```
User Registration/Login
        ↓
    Dashboard/Home
        ↓
    Browse Events
        ↓
    View Event Details
        ↓
    Book Event (if available)
        ↓
    View My Bookings
        ↓
    Cancel Booking (if needed)
```

## 🛠️ Development

### Running Tests
```bash
php artisan test
```

### Code Formatting
```bash
./vendor/bin/pint
```

### Clearing Cache
```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Database Operations
```bash
# Refresh database (careful: deletes all data)
php artisan migrate:fresh

# Rollback last migration
php artisan migrate:rollback

# See migration status
php artisan migrate:status
```

## 📦 Deployment

### Switching to MySQL/PostgreSQL

1. Update `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

2. Run migrations:
```bash
php artisan migrate
```

### Production Checklist
- [ ] Set `APP_ENV=production` in `.env`
- [ ] Set `APP_DEBUG=false` in `.env`
- [ ] Run `php artisan config:cache`
- [ ] Run `php artisan route:cache`
- [ ] Run `php artisan view:cache`
- [ ] Run `npm run build` for optimized assets
- [ ] Set up proper file permissions for `storage/` and `bootstrap/cache/`
- [ ] Configure web server (Apache/Nginx)
- [ ] Set up SSL certificate (HTTPS)
- [ ] Configure database backups

## 🌐 Deployment Options

### Recommended Platforms
1. **Railway.app** - Free tier, easy setup
2. **Render.com** - Free tier with PostgreSQL
3. **Fly.io** - Good for SQLite deployments
4. **DigitalOcean** - $4/month droplet
5. **AWS/Heroku** - Scalable options

## 🐛 Troubleshooting

### Database Connection Error
```bash
# Ensure SQLite database exists
ls database/database.sqlite

# If not, create it
touch database/database.sqlite

# Run migrations
php artisan migrate
```

### Storage Link Error
```bash
# Remove existing link
rm public/storage

# Recreate link
php artisan storage:link
```

### Permission Issues (Linux/Mac)
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

## 📚 Technologies & Packages

### Backend Dependencies
- `laravel/framework`: ^12.0 - Core framework
- `laravel/jetstream`: ^5.3 - Authentication scaffolding
- `laravel/sanctum`: ^4.0 - API authentication
- `livewire/livewire`: ^3.0 - Dynamic UI components
- `spatie/laravel-export`: ^1.2 - Static site generation

### Frontend Dependencies
- `tailwindcss`: ^3.4.17 - CSS framework
- `@tailwindcss/forms`: ^0.5.7 - Form styling
- `@tailwindcss/typography`: ^0.5.10 - Typography plugin
- `vite`: ^6.2.4 - Build tool
- `alpinejs`: (via Livewire) - JavaScript framework

## 👨‍💻 Author

**Kinshuk Saxena**
- 📍 Location: Jaipur, Rajasthan, India
- 🌐 GitHub: [@kinshukkush](https://github.com/kinshukkush)
- 💼 LinkedIn: [kinshuk-saxena](https://www.linkedin.com/in/kinshuk-saxena-/)
- 📧 Email: Available on GitHub profile

## 🤝 Contributing

Contributions, issues, and feature requests are welcome!

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📝 License

This project is open-sourced software licensed under the [MIT License](LICENSE).

## 🙏 Acknowledgments

- Laravel Framework and Community
- Tailwind CSS Team
- Font Awesome for Icons
- All open-source contributors

---

**Made with ❤️ by Kinshuk Saxena** | © 2025 All Rights Reserved
