CREATE DATABASE IF NOT EXISTS PPW;
USE PPW;


-- We will use this as intro for evry page
CREATE TABLE site_content (
  content_key VARCHAR(50) PRIMARY KEY,
  content     TEXT NOT NULL
);

-- The three small cards on the home page
CREATE TABLE highlights (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  title       VARCHAR(100) NOT NULL,
  description VARCHAR(255) NOT NULL,
  sort_order  INT DEFAULT 0
);

-- Skills, grouped by category on the Skills page
CREATE TABLE skills (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  category   VARCHAR(100) NOT NULL,
  name       VARCHAR(100) NOT NULL,
  sort_order INT DEFAULT 0
);

-- Projects; "category" is used by the JavaScript filter buttons
CREATE TABLE projects (
  id          INT AUTO_INCREMENT PRIMARY KEY,
  title       VARCHAR(150) NOT NULL,
  description TEXT NOT NULL,
  tags        VARCHAR(255) NOT NULL,
  category    VARCHAR(50)  NOT NULL,
  link_url    VARCHAR(255) NULL,
  link_text   VARCHAR(100) NULL,
  sort_order  INT DEFAULT 0
);

-- Messages sent from the contact form
CREATE TABLE messages (
  id         INT AUTO_INCREMENT PRIMARY KEY,
  name       VARCHAR(100) NOT NULL,
  email      VARCHAR(150) NOT NULL,
  subject    VARCHAR(200) NULL,
  message    TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- ---------------------------------------------------------------
-- Content
-- ---------------------------------------------------------------

INSERT INTO site_content (content_key, content) VALUES
('hero_tag',      'Software Developer · RHCSA Certified'),
('hero_title',    'I build practical tools in Go and keep Linux systems running.'),
('hero_text',     'I write command-line tools that solve real, everyday problems — like turning a university exam schedule PDF into a calendar you can import in one click. My Linux background means I care about software that is simple, reliable, and easy to run.'),
('about_text',    'Hi, I''m Abdullah Almutairi — a software developer working across Go, Linux systems, and general-purpose programming. I hold an RHCSA certification, and that systems background shapes how I approach software: I care about tools that are practical, well-documented, and built to keep running reliably, not just ones that work on day one. You can find my work on GitHub, where I build and maintain a mix of Go tools and Linux-focused projects.'),
('skills_intro',  'The languages and tools I use most, grouped by what I use them for.'),
('projects_intro','Things I''ve built, contributed to, or taught. Most of my code is on GitHub.'),
('contact_intro', 'Have a project idea, an internship or job opportunity, or a question about Go, Linux, or the RHCSA? Send me a message — I usually reply within a couple of days.'),
('github_url',    'https://github.com/Almutairi0'),
('email',         'abdullah@almutairi0.dev'),
('linkedin_url',  'www.linkedin.com/in/abdullah-almutairi-swe');

INSERT INTO highlights (title, description, sort_order) VALUES
('Go Development', 'CLI tools, PDF parsing, and calendar (.ics) generation.', 1),
('Linux Systems',  'Red Hat Certified System Administrator (RHCSA).',          2),
('Open Source',    'Contributor to the golang-ical library.',                  3);

INSERT INTO skills (category, name, sort_order) VALUES
('Programming Languages', 'Go', 1),
('Programming Languages', 'Bash', 2),
('Programming Languages', 'Python', 3),
('Programming Languages', 'C', 4),
('Linux & System Administration', 'RHEL / Fedora', 10),
('Linux & System Administration', 'Arch Linux', 11),
('Linux & System Administration', 'Users & permissions', 12),
('Linux & System Administration', 'systemd services', 13),
('Linux & System Administration', 'Storage & LVM', 14),
('Linux & System Administration', 'Networking & firewalld', 15),
('Linux & System Administration', 'SELinux', 16),
('Linux & System Administration', 'Shell scripting', 17),
('Web Development', 'HTML', 20),
('Web Development', 'CSS', 21),
('Web Development', 'JavaScript', 22),
('Web Development', 'PHP', 23),
('Web Development', 'MySQL', 24),
('Web Development', 'Hugo', 25),
('Tools & Workflow', 'Git & GitHub', 30),
('Tools & Workflow', 'Pull requests & code review', 31),
('Tools & Workflow', 'Cloudflare', 32),
('Tools & Workflow', 'Virtual machines', 33),
('Tools & Workflow', 'PDF processing', 34),
('Certifications', 'RHCSA — Red Hat Certified System Administrator', 40),
('Teaching & Communication', 'Technical workshops', 50),
('Teaching & Communication', 'Course material design', 51),
('Teaching & Communication', 'Public speaking', 52);

INSERT INTO projects (title, description, tags, category, link_url, link_text, sort_order) VALUES
('examsFinder',
 'A Go command-line tool that reads a university exam schedule PDF, finds the exams for the courses you choose, and exports them as an .ics calendar file with reminders — so students can add every exam to Google or Apple Calendar in one step.',
 'Go,PDF parsing,iCalendar (RFC 5545)', 'go',
 'https://github.com/Almutairi0/examFinder', 'View on GitHub →', 1),
('syllabus-cal',
 'A Go CLI that takes course specification PDFs, reads each course''s assessment table, and generates one color-coded calendar per course with every quiz, assignment, and exam deadline.',
 'Go,PDF parsing,.ics', 'go',
 'https://github.com/Almutairi0/syllabus-cal', 'View on GitHub →', 2),
('golang-ical contributions',
 'Contributed fixes upstream to golang-ical, the open-source Go library for iCalendar files that my calendar tools depend on. Two pull requests merged (#147 and #148).',
 'Go,Open source,Code review', 'open-source',
 'https://github.com/arran4/golang-ical', 'View repository →', 3),
('Red Hat Certification Seminar',
 'A 45-minute talk for the Programming and Games Club introducing students to the Red Hat certification path — RHCSA, RHCE, OpenShift and RHCA — including my own experience passing the RHCSA.',
 'RHCSA,Public speaking', 'linux', NULL, NULL, 4),
('This Portfolio',
 'The site you''re on — a responsive portfolio built with HTML, CSS, and JavaScript, with content served from a MySQL database through PHP.',
 'HTML/CSS,JavaScript,PHP,MySQL', 'web',NULL , NULL, 5);
