Keep the current local dev setup

This project has been configured for local development with the following stable state:

- DB: MySQL (set in .env: DB_CONNECTION=mysql, DB_DATABASE=tubeswebpro)
- Session & Cache: database driver (SESSION_DRIVER=database, CACHE_STORE=database)
- Seeded demo admin: admin@floodsense.test (password: password)
- /dashboard is the default landing page after login; admin pages are protected by middleware.

To avoid accidentally breaking this setup:

- Don't change DB_CONNECTION in .env unless you know what you're doing. If you switch to sqlite, migrations may affect the sqlite file.
- Use `php artisan migrate --seed` only when the DB is in the expected state. Prefer `php artisan migrate:fresh --seed` only when you want a clean database.
- The DatabaseSeeder uses `updateOrCreate` so running seeds multiple times won't duplicate the admin user.
- To reset and reseed safely:
  1. Stop the dev server (`Ctrl+C` where `php artisan serve` is running).
  2. Run `php artisan migrate:fresh --seed`.
  3. Start the dev server again `php artisan serve`.

If you want me to lock any specific files or add CI hooks to prevent accidental changes, tell me which files and I'll add a script/check.
