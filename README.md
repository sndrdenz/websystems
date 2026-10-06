# IT0049 TFA2 — From Arrays to a Real Database

**Student:** BALATBAT, DENZEL GAVIN  
**Base project:** Existing `lab1balatbat` TFA1 CodeIgniter application

This activity extends TFA1 with a MySQL database. Customer Accounts and User Accounts now retrieve records through CodeIgniter Models using `orderBy('id', 'ASC')->findAll()`. The original home page, about page, navigation, routes, and stylesheet are retained.

## Requirements

- PHP 8.2 or higher compatible with the included Composer dependencies.
- PHP extensions `intl`, `mbstring`, and `mysqli` with mysqlnd enabled.
- MySQL or a compatible MariaDB server (such as the database bundled with XAMPP).
- Apache with `mod_rewrite` and `.htaccess` overrides enabled for the XAMPP setup below.
- Composer if installing dependencies from a GitHub clone. The ZIP includes the original `vendor` directory.

## Run locally with XAMPP

1. Extract the ZIP. Put the inner **lab1balatbat** folder in `C:\xampp\htdocs\` so that `C:\xampp\htdocs\lab1balatbat\spark` exists. Avoid an extra nested project folder.
2. Start **Apache** and **MySQL** in the XAMPP Control Panel.
3. Open `http://localhost/phpmyadmin/`, choose **Import**, select `database/pos_db.sql` from the project, and click **Go**. The SQL creates `pos_db`, the two required tables, and five records per table. Import it once into a new database; it deliberately does not drop existing tables.
4. The ZIP includes a configured `.env`. If working from a GitHub clone, copy `.env.example` to `.env` first:

   ```powershell
   Copy-Item .env.example .env
   ```

5. Confirm these settings in `.env` match your own local MySQL installation:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost/lab1balatbat/'

   database.default.hostname = localhost
   database.default.database = pos_db
   database.default.username = root
   database.default.password = ''
   database.default.DBDriver = MySQLi
   database.default.DBPrefix = ''
   database.default.port = 3306
   ```

   The empty password is the local XAMPP default. Set your actual password if you changed it. If you change the folder name or Apache port, update `app.baseURL` as well.

6. For a GitHub clone without `vendor`, open a terminal in the project folder and run `composer install`. The supplied ZIP already includes TFA1's dependencies.
7. Visit:

   | Page | Local URL |
   | --- | --- |
   | Home | http://localhost/lab1balatbat/ |
   | About | http://localhost/lab1balatbat/about |
   | Customer Accounts | http://localhost/lab1balatbat/customers |
   | User Accounts | http://localhost/lab1balatbat/users |

The root `.htaccess` retains TFA1's forwarding to `public/` and includes a guard against repeatedly adding `public/` during internal rewrites.

### Alternative: CodeIgniter development server

Keep MySQL running and import the database first. In `.env`, change `app.baseURL` to `http://localhost:8080/`. From the project folder run:

```bash
php spark serve
```

Open `http://localhost:8080/`. Use this base URL for the other routes too.

## Database and application changes

The SQL export is **database/pos_db.sql**. It contains the exact table definitions supplied in the activity:

| Table | Fields |
| --- | --- |
| `customers` | `id` INT auto-increment primary key; `full_name` VARCHAR(100) required; `email` VARCHAR(100) required; `phone` VARCHAR(20) nullable; `created_at` DATETIME required |
| `users` | `id` INT auto-increment primary key; `username` VARCHAR(50) required and unique; `full_name` VARCHAR(100) required; `created_at` DATETIME required |

The sample names are retained from TFA1. Customer phone numbers are fictional strings that retain their leading zero. Mia Reyes has a NULL phone to demonstrate the optional field. Both tables have five sample rows with explicit creation dates.

| File | Purpose |
| --- | --- |
| `app/Models/CustomerModel.php` | Maps the `customers` table and its allowed fields. |
| `app/Models/UserModel.php` | Maps the `users` table and its allowed fields. |
| `app/Controllers/Customers.php` | Retrieves customers through `CustomerModel` and passes them to the existing view. |
| `app/Controllers/Users.php` | Retrieves users through `UserModel` and passes them to the existing view. |
| `app/Views/customers.php` | Displays customer ID, name, email, phone, and registration date. |
| `app/Views/users.php` | Displays user ID, name, username, and creation date. |
| `.env` / `.env.example` | Configures the MySQL connection and local base URL. |

`findAll()` uses the framework's Query Builder internally. Neither controller contains raw SQL or sample account arrays. Models return associative arrays, so the views keep the original `foreach` table structure and escape displayed values with `esc()`. Empty tables display a short message, and NULL phone values display “Not provided”.

The old customer status and user role/last-login columns were replaced because those fields do not exist in the required TFA2 schema. No extra database columns were added. Automatic model timestamps are disabled because records supply `created_at` explicitly and the schema has no `updated_at` column. The activity is an account directory; it does not require login or add/edit/delete forms.

## Verify on your computer

1. Confirm all four pages load and navigation and styling still work.
2. Confirm the customer page shows five records, including Ava Santos and Mia Reyes; Mia's phone should say “Not provided”.
3. Confirm the user page shows five records, including `olivia.martin` and `isla.brown`.
4. In phpMyAdmin, edit one sample customer's `full_name`, save it, and refresh Customer Accounts. The changed name should appear. Restore the original value afterward. This verifies that the displayed records come from the database.
5. Restart the local server and verify the saved records remain available.

Static checks were performed against the supplied DOCX schema, model/controller/view field mappings, sample records, and preservation of the original project. PHP execution, a real MySQL import, and browser rendering have not been verified in the preparation workspace because PHP and MySQL are unavailable there. Complete the checks above before submitting.

If a database connection fails, check that MySQL is running, `pos_db` exists, and the hostname, port, username, and password match `.env`. If clean routes return 404, check Apache's rewrite settings or use `php spark serve`. If PHP reports a missing extension, enable it in the PHP configuration used by that server and restart Apache.

## GitHub submission

The assignment requires a repository link containing the raw project files and SQL export.

1. Create or open your GitHub repository and open this project folder in VS Code.
2. Commit the raw project contents, including `app`, `public`, `database/pos_db.sql`, `.env.example`, `composer.json`, `composer.lock`, `spark`, and this README. Do not upload only the ZIP.
3. Use Source Control to commit and push/sync to your repository.
4. Keep `.env` private. The existing `.gitignore` excludes it, `vendor`, and runtime files. Anyone cloning the project can copy `.env.example` and run `composer install`.
5. Copy your actual repository URL into your submission.

## Hosted application submission

Use a host that supports PHP and MySQL. A static-only host cannot execute this CodeIgniter application.

1. Upload/deploy the project to your PHP host and install dependencies with `composer install --no-dev --optimize-autoloader`, or include a compatible `vendor` directory.
2. Point the site's document root to the project's **public** directory. Keep `app`, `vendor`, `.env`, and the SQL export outside that public document root.
3. Create the database through the host's control panel. If it assigns a database name, omit the `CREATE DATABASE` and `USE pos_db` statements from the SQL file, select the assigned database, and import the remaining table definitions and inserts.
4. Configure the host's `.env` with its database hostname, database name, username, password, and port. Set `app.baseURL` to the actual hosted URL with a trailing slash and `CI_ENVIRONMENT = production`.
5. Make the `writable` directory writable by the web server. Enable routing rewrites as required by the host.
6. Test all four pages and confirm both account tables display the imported records. Submit the actual hosted URL together with your GitHub URL.

**Submission status:** Project files and the SQL export are prepared. No GitHub repository has been pushed and no public hosting deployment has been created; those require your repository and hosting destination.
