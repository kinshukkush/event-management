# 🧹 Repository Cleanup Guide

Since `node_modules` and `vendor` directories were previously pushed to GitHub, follow these steps to clean them up:

## Option 1: Remove from Git History (Recommended)

### Step 1: Remove from tracking and delete from remote
```bash
# Navigate to project directory
cd "c:\KINSHUK FOLDER\Programming\event-management"

# Remove node_modules and vendor from Git tracking
git rm -r --cached node_modules vendor

# Add the new .gitignore
git add .gitignore

# Commit the changes
git commit -m "Remove node_modules and vendor from repository, add proper .gitignore"

# Push to remote
git push origin main
```

### Step 2: Clean up Git history (Optional but recommended to reduce repo size)
```bash
# Install git-filter-repo if not already installed
# For Windows, download from: https://github.com/newren/git-filter-repo

# Create a backup first!
git clone https://github.com/kinshukkush/event-management.git event-management-backup

# Remove directories from entire history
git filter-repo --path node_modules --invert-paths
git filter-repo --path vendor --invert-paths

# Force push to remote (WARNING: This rewrites history!)
git push origin --force --all
```

## Option 2: Simple Removal (Easier but repo history keeps old files)

```bash
# Navigate to project directory
cd "c:\KINSHUK FOLDER\Programming\event-management"

# Stage all changes including the new .gitignore
git add .gitignore

# Remove node_modules and vendor from Git
git rm -r --cached node_modules vendor

# Commit changes
git commit -m "chore: Remove node_modules and vendor, add proper .gitignore

- Added comprehensive .gitignore file
- Removed node_modules and vendor from tracking
- Updated all views with dark theme
- Improved UI/UX across the application"

# Push changes
git push origin main
```

## Step 3: Reinstall Dependencies

After pushing, team members should:

```bash
# Pull latest changes
git pull origin main

# Install PHP dependencies
composer install

# Install Node dependencies
npm install

# Build assets
npm run build
```

## Important Notes

⚠️ **Before proceeding:**
1. Make sure all team members have committed their work
2. Inform team members about the upcoming force push if using Option 1
3. Create a backup of your repository

✅ **After cleanup:**
- Repository size will be significantly smaller
- Future clones will be faster
- .gitignore will prevent accidental commits of dependencies

## Files Now Ignored by .gitignore

- `/node_modules` - NPM packages
- `/vendor` - Composer packages
- `.env` - Environment configuration
- `/public/storage` - Storage symlink
- `/storage/*.key` - Encryption keys
- All IDE configuration files

## Next Steps

1. Run the cleanup commands
2. Verify changes: `git status`
3. Push to GitHub
4. Pull on other machines and run `composer install` and `npm install`
5. Delete this CLEANUP_GUIDE.md file once done

---

Need help? Contact: kinshuksaxena@example.com
