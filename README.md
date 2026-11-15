# Personal Portfolio Website

My portfolio website for the Web Development Lab Project (SENG-362, University of Ha'il). The site is built with HTML, CSS, JavaScript, PHP and MySQL. All of the content is stored in a MySQL database and loaded with PHP.

## Project requirements

| Section | Where it is |
| --- | --- |
| Navigation bar | `header.php`, shared by every page |
| Home / Welcome | `index.php` |
| About Me | `about.php` |
| Skills | `skills.php` |
| Projects | `projects.php` |
| Contact form | `contact.php` |

## Technical requirements

### Responsive design

- The card grids use CSS Grid with `auto-fill` / `auto-fit`, so the number of columns changes with the screen width.
- Media queries at `768px` and `600px` in `style.css` change the navigation bar and layout for tablets and phones.
- `header.php` sets the viewport meta tag so the page scales correctly on mobile.

### Content loaded from MySQL using PHP

- `db.php` connects to the database with PDO and loads the `site_content` table into the `$content` array.
- Each page queries its own table:
  - `index.php`: `highlights`
  - `skills.php`: `skills`, grouped by category
  - `projects.php`: `projects`
- The contact form saves each message to the `messages` table with a prepared statement.
- Every value is passed through the `e()` helper (`htmlspecialchars`) before it's printed.

### JavaScript features

`script.js` adds two interactive features:

1. **Dark/light mode.** The button in the header switches the theme and saves the choice in `localStorage`. On the first visit it follows the system setting.
2. **Project filtering.** The buttons on the Projects page show only the projects in the chosen category (Go, Linux, Open Source, Web).

## Files

| File | Type | Description |
| --- | --- | --- |
| `index.php`, `about.php`, `skills.php`, `projects.php`, `contact.php` | PHP / HTML | The pages of the site |
| `header.php`, `footer.php` | PHP / HTML | Shared header (navigation, theme button) and footer |
| `db.php` | PHP | Database connection and helper functions |
| `style.css` | CSS | All styles, including the light and dark themes |
| `script.js` | JavaScript | Dark/light mode and project filtering |
| `PPW.sql` | SQL | Creates the `PPW` database and its tables, and adds the content |

## Database

`PPW.sql` creates the `PPW` database with five tables:

| Table | Contents |
| --- | --- |
| `site_content` | Page text and links, stored as key/value pairs |
| `highlights` | The three cards on the home page |
| `skills` | Skills and their category |
| `projects` | Projects, with tags, category (used by the filter) and link |
| `messages` | Messages sent from the contact form |

## How to run

1. Install PHP (with `pdo_mysql`) and MySQL or MariaDB, or use XAMPP.
2. Create the database:

   ```sh
   mysql -u root -p < PPW.sql
   ```

3. If your MySQL username or password is different, change it in `db.php`.
4. Start the server in the project folder:

   ```sh
   php -S localhost:8000
   ```

   With XAMPP, copy the folder into `htdocs` instead.
5. Open <http://localhost:8000> in a browser.
