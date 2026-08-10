# WEBHUB.UZ — PHP + HTML + CSS + JAVASCRIPT + MYSQL + JSON

# COMPLETE WEBSITE + ADMIN PANEL MASTER PROMPT

You are a senior PHP architect, UI/UX designer, frontend engineer, backend engineer, database architect, security engineer, and QA engineer.

Your task is to completely redesign and rebuild WebHub.uz from scratch as a premium digital product studio platform.

IMPORTANT:

The project MUST use ONLY:

* PHP 8.x
* HTML5
* CSS3
* Vanilla JavaScript
* MySQL 8.x
* JSON
* Apache
* .htaccess

DO NOT use:

* React
* Vue
* Angular
* Next.js
* Node.js
* TypeScript
* Tailwind CSS
* Bootstrap
* Laravel
* Symfony
* WordPress
* jQuery
* npm
* Redis
* WebSocket server
* external frontend frameworks
* external backend frameworks

The website must be completely functional using native PHP, HTML, CSS, Vanilla JavaScript, MySQL and JSON.

---

# 01 — CORE ARCHITECTURE

Build one centralized WebHub PHP application.

Architecture:

Browser
↓
PHP
↓
MySQL

JavaScript communicates with PHP API endpoints using:

fetch()

PHP returns JSON.

Example:

JavaScript:

fetch('/api/v1/projects.php')

PHP:

/api/v1/projects.php

Response:

{
"success": true,
"data": []
}

The browser must NEVER connect directly to MySQL.

Only PHP connects to MySQL.

---

# 02 — PROJECT PHILOSOPHY

WebHub must feel like a premium modern digital product studio.

It must NOT look like:

* old IT company website
* WordPress template
* Bootstrap template
* generic agency website
* cheap freelancer website
* AI-generated landing page

Design direction:

Apple
Linear
Vercel
Stripe
Premium creative technology studios

Use these only as conceptual inspiration.

Do not copy their UI.

---

# 03 — MAIN WEBSITE

Public pages:

/

/work.php

/project.php?slug=

/services.php

/about.php

/contact.php

/login.php

/register.php

Client dashboard:

/dashboard.php

/projects.php

/project.php?id=

/messages.php

/profile.php

Admin:

/admin/

---

# 04 — ADMIN PANEL

Admin Panel MUST be inside the same PHP website.

Directory:

/admin/

Example:

/admin/index.php
/admin/users.php
/admin/projects.php
/admin/messages.php
/admin/services.php
/admin/portfolio.php
/admin/media.php
/admin/banners.php
/admin/pages.php
/admin/features.php
/admin/settings.php
/admin/notifications.php
/admin/audit.php
/admin/admins.php
/admin/roles.php

Every admin page may contain its own:

HTML
CSS
JavaScript
PHP

But keep reusable PHP logic inside:

/includes/

---

# 05 — RECOMMENDED PROJECT STRUCTURE

Use:

/webhub/

```
index.php

login.php
register.php
logout.php

work.php
project.php
services.php
about.php
contact.php

dashboard.php
projects.php
messages.php
profile.php

/api/
    /v1/
        auth/
        users/
        projects/
        messages/
        services/
        portfolio/
        media/
        notifications/
        config/

/admin/
    index.php
    users.php
    projects.php
    messages.php
    services.php
    portfolio.php
    media.php
    banners.php
    pages.php
    features.php
    settings.php
    notifications.php
    audit.php
    admins.php
    roles.php

/config/
    database.php
    config.php

/includes/
    auth.php
    functions.php
    header.php
    footer.php
    navbar.php
    admin-header.php
    admin-footer.php

/assets/
    /css/
    /js/
    /images/
    /icons/

/uploads/
    /images/
    /documents/
    /audio/
    /video/

/database/
    schema.sql
    seed.sql

/storage/
    logs/

.htaccess

robots.txt
sitemap.xml
```

---

# 06 — DATABASE

Use MySQL 8.x.

Character set:

utf8mb4

Collation:

utf8mb4_unicode_ci

Use PDO.

Never use raw SQL concatenation with user input.

Always use prepared statements.

---

# 07 — DATABASE TABLES

Create these tables:

users

roles

sessions

projects

project_statuses

services

portfolio

pages

banners

media

conversations

conversation_members

messages

message_attachments

notifications

feature_flags

settings

audit_logs

---

# 08 — USERS TABLE

Fields:

id
uuid
name
username
email
phone
password_hash
avatar_url
role_id
status
email_verified_at
phone_verified_at
last_login_at
last_seen_at
metadata
created_at
updated_at

Passwords MUST NEVER be stored as plaintext.

Use:

password_hash()

and:

password_verify()

Prefer:

PASSWORD_ARGON2ID

when supported.

---

# 09 — ROLES

Default roles:

USER
ADMIN
SUPER_ADMIN

Store permissions as JSON.

Example:

{
"permissions": [
"projects.read",
"projects.create",
"messages.read",
"messages.send"
]
}

---

# 10 — SESSIONS

Implement secure PHP session authentication.

Store:

user_id
session_token_hash
device
IP
user_agent
expires_at
revoked_at
created_at

Use secure session cookies.

Set:

HttpOnly
Secure
SameSite=Lax or Strict

depending on architecture.

---

# 11 — PROJECTS

Fields:

id
uuid
user_id
title
description
service_id
status_id
budget
currency
priority
metadata
started_at
deadline_at
completed_at
created_at
updated_at

---

# 12 — PROJECT STATUSES

Default:

New
Discussion
Planning
Design
Development
Testing
Client Review
Revision
Completed
Cancelled

Admin must be able to:

* create
* rename
* reorder
* activate/deactivate
* change color
* delete non-system statuses

---

# 13 — SERVICES

Fields:

title
slug
short_description
description
icon
image_url
technologies
sort_order
is_active
is_featured
created_at
updated_at

Technologies may be JSON.

Example:

[
"PHP",
"MySQL",
"JavaScript"
]

---

# 14 — PORTFOLIO

Fields:

title
slug
short_description
description
cover_image
category
technologies
client_name
project_url
year
case_study
status
is_featured
created_at
updated_at

Case study can be JSON.

---

# 15 — CMS PAGES

Admin must be able to edit public website content without editing source code.

Pages:

Home
About
Contact
Footer
SEO

Store flexible content in JSON where appropriate.

Do NOT store the entire website blindly as one giant JSON object.

Important relational content must remain in SQL tables.

---

# 16 — BANNERS

Fields:

title
subtitle
image_url
mobile_image_url
button_text
button_url
sort_order
starts_at
ends_at
is_active
metadata

Admin can:

Create
Edit
Delete
Reorder
Activate
Deactivate
Schedule

---

# 17 — MEDIA LIBRARY

Admin must have a professional Media Library.

Support:

Images
Documents
Audio
Video

Features:

Upload
Preview
Search
Filter
Rename
Delete
Copy URL

Generate unique filenames.

Never trust uploaded filenames.

Validate:

MIME type
extension
file size

Never allow uploaded PHP files to execute.

---

# 18 — USER DASHBOARD

After login:

Dashboard must show:

Welcome message
Active projects
Recent messages
Notifications
Project statuses

Example:

PROJECT

VatanParvar Platform

Status:

Development

---

# 19 — START PROJECT

User clicks:

START A PROJECT

Form:

Name
Service
Description
Budget
Deadline
Attachments

After submission:

1. Validate
2. Create project
3. Set initial status
4. Create conversation
5. Add user
6. Notify admins
7. Return success JSON

---

# 20 — CHAT SYSTEM

Because only PHP + JavaScript are allowed, DO NOT use a WebSocket server.

Implement real-time-like chat using:

AJAX polling

Vanilla JavaScript:

setInterval()

Example:

Every 2–4 seconds:

GET:

/api/v1/messages/list.php?conversation_id=123&after_id=456

Only request messages newer than the last known message.

This minimizes database load.

---

# 21 — CHAT FEATURES

Implement:

Text
Images
Files
Audio
Reply
Edit
Delete
Read status
Unread count
Typing indicator
Online status
Notifications

Typing indicator can use AJAX polling.

Example:

POST:

/api/v1/messages/typing.php

---

# 22 — CONVERSATIONS

Types:

support
project
general

Every project automatically receives a project conversation.

Example:

Project:

VatanParvar Platform

Conversation:

Project #1024

---

# 23 — MESSAGES TABLE

Fields:

id
uuid
conversation_id
sender_id
type
body
reply_to_id
metadata
edited_at
deleted_at
created_at

Message types:

text
image
file
audio
video
system

---

# 24 — READ STATUS

Store last read message per conversation.

When user opens chat:

POST:

/api/v1/messages/read.php

Example:

{
"conversation_id": 102,
"message_id": 892
}

Update:

last_read_message_id

---

# 25 — NOTIFICATIONS

Notification types:

new_message
project_created
project_status_changed
file_uploaded
admin_reply
system

User dashboard:

Notifications

Unread count

Mark as read

---

# 26 — FEATURE FLAGS

Create:

feature_flags

Example:

chat_enabled
voice_messages_enabled
file_upload_enabled
project_tracking_enabled
notifications_enabled
registration_enabled
maintenance_mode

Admin can switch:

ON/OFF

Frontend retrieves public configuration through PHP JSON API.

---

# 27 — CONFIG API

Endpoint:

GET /api/v1/config.php

Return:

{
"success": true,
"data": {
"app": {
"name": "WebHub",
"version": "1.0.0"
},
"features": {
"chat": true,
"voice_messages": true,
"file_upload": true,
"project_tracking": true
},
"branding": {
"logo": "/uploads/images/logo.svg"
},
"maintenance": false
}
}

NEVER expose:

database credentials
passwords
API secrets
session secrets
admin-only settings

---

# 28 — API STRUCTURE

All APIs:

/api/v1/

Example:

/api/v1/auth/login.php

/api/v1/auth/register.php

/api/v1/auth/logout.php

/api/v1/auth/me.php

/api/v1/projects/list.php

/api/v1/projects/create.php

/api/v1/projects/get.php

/api/v1/projects/update.php

/api/v1/messages/list.php

/api/v1/messages/send.php

/api/v1/messages/read.php

/api/v1/messages/delete.php

/api/v1/services/list.php

/api/v1/portfolio/list.php

/api/v1/config.php

---

# 29 — API RESPONSE

Success:

{
"success": true,
"data": {},
"message": "Success"
}

Error:

{
"success": false,
"error": {
"code": "VALIDATION_ERROR",
"message": "Invalid request"
}
}

Always return JSON.

Set:

Content-Type: application/json

---

# 30 — AUTH API

Implement:

POST /api/v1/auth/register.php

POST /api/v1/auth/login.php

POST /api/v1/auth/logout.php

GET /api/v1/auth/me.php

POST /api/v1/auth/forgot-password.php

POST /api/v1/auth/reset-password.php

---

# 31 — USER API

GET:

/api/v1/users/me.php

PATCH:

/api/v1/users/update.php

POST:

/api/v1/users/avatar.php

GET:

/api/v1/users/projects.php

GET:

/api/v1/users/notifications.php

---

# 32 — PROJECT API

POST:

/api/v1/projects/create.php

GET:

/api/v1/projects/list.php

GET:

/api/v1/projects/get.php?id=

POST/PATCH:

/api/v1/projects/update.php

POST:

/api/v1/projects/status.php

Users can only access their own projects.

Admins can access projects according to permission.

---

# 33 — ADMIN API

Create:

/api/v1/admin/

Users:

users/list.php
users/get.php
users/update.php
users/block.php
users/delete.php

Projects:

projects/list.php
projects/get.php
projects/update.php
projects/status.php
projects/delete.php

Services:

services/create.php
services/update.php
services/delete.php

Portfolio:

portfolio/create.php
portfolio/update.php
portfolio/delete.php

Media:

media/upload.php
media/delete.php

Settings:

settings/get.php
settings/update.php

Features:

features/list.php
features/update.php

---

# 34 — PERMISSIONS

Use:

resource.action

Examples:

users.read
users.update
users.delete

projects.create
projects.read
projects.update
projects.delete
projects.status.update

messages.read
messages.send
messages.delete

media.upload
media.delete

services.create
services.update
services.delete

portfolio.create
portfolio.update
portfolio.delete

settings.read
settings.update

features.read
features.update

audit.read

---

# 35 — USER PERMISSIONS

USER:

Own profile:
READ
UPDATE

Own projects:
CREATE
READ
UPDATE limited

Messages:
READ
SEND
DELETE own messages

Files:
UPLOAD
READ
DELETE own files

Notifications:
READ
MARK AS READ

Public content:
READ

Admin:
NO ACCESS

---

# 36 — ADMIN PERMISSIONS

ADMIN can manage:

Users
Projects
Messages
Services
Portfolio
Media
Banners
Pages
Notifications
Features
Settings
Audit Logs

SUPER_ADMIN additionally controls:

Admins
Roles
Permissions
Critical system settings

---

# 37 — ADMIN DASHBOARD

Admin homepage:

/admin/index.php

Show real data:

Total users
Active users
New projects
Active projects
Unread messages
Pending requests
Completed projects

Do NOT use fake statistics.

Use MySQL queries.

---

# 38 — ADMIN USERS

/admin/users.php

Features:

Search
Filter
Pagination
View
Edit
Block
Unblock
Delete

User details:

Profile
Projects
Conversations
Activity
Sessions

Never show password hashes.

---

# 39 — ADMIN PROJECTS

/admin/projects.php

Features:

Search
Filter
Status
Priority
Client
Date

Actions:

View
Edit
Change status
Change priority
Set deadline
Open chat
Archive
Complete

---

# 40 — ADMIN CHAT

/admin/messages.php

Layout:

Conversation list
Active conversation
User information
Project information
Message history

Features:

Search conversations
Unread count
Reply
File upload
Image upload
Audio upload
Delete message
Mark read

Use AJAX polling.

Do NOT refresh the whole page.

---

# 41 — ADMIN CONTENT

Admin must be able to change:

Logo
Favicon
Hero
Hero image
Banners
Services
Portfolio
About
Contact
Footer
Social links
SEO

No source-code editing required.

---

# 42 — ADMIN SETTINGS

/admin/settings.php

Sections:

General
Branding
Contact
SEO
Uploads
Security
Notifications
System

---

# 43 — ADMIN FEATURES

/admin/features.php

Example:

Chat
ON

Voice messages
ON

File uploads
ON

Project tracking
ON

Registration
ON

Maintenance
OFF

Changes must be saved to MySQL.

---

# 44 — ADMIN AUDIT LOG

Every important admin action must be logged.

Example:

Admin changed project status.

Store:

admin ID
action
resource
resource ID
old data
new data
IP
timestamp

---

# 45 — SECURITY

Mandatory:

PDO prepared statements

password_hash()

password_verify()

CSRF protection

XSS protection

Input validation

Output escaping

Session regeneration after login

Secure cookies

Rate limiting

Brute-force protection

File upload validation

Authorization middleware

Audit logs

---

# 46 — CSRF

All state-changing requests must use CSRF protection.

For example:

POST
PATCH
DELETE

must validate CSRF token.

AJAX requests must send the token.

---

# 47 — XSS

Never directly output user-generated content.

Use:

htmlspecialchars()

when appropriate.

Rich content must be sanitized.

Never allow arbitrary PHP/JavaScript execution through CMS.

---

# 48 — SQL SECURITY

Use PDO:

$stmt = $pdo->prepare(...)

Never:

$sql = "SELECT * FROM users WHERE id=" . $_GET['id'];

Always validate and bind values.

---

# 49 — FILE UPLOAD SECURITY

Allowed types must be configurable.

Example:

Images:

jpg
jpeg
png
webp
svg

Documents:

pdf
doc
docx
xls
xlsx

Audio:

mp3
wav
m4a

Maximum file size must be configurable.

Generate random UUID filenames.

Store outside executable PHP directories where possible.

---

# 50 — DESIGN SYSTEM

Background:

#F7F7F5

Text:

#0A0A0A

Secondary:

#6B6B6B

Border:

#E5E5E5

Accent:

#155EEF

Dark:

#080808

Use neutral colors primarily.

Accent must be rare.

---

# 51 — UI STYLE

Use:

large typography
strong whitespace
thin borders
subtle shadows
smooth transitions
minimal cards
editorial layouts
premium buttons

Do NOT overuse:

glass
blur
gradients
neon
particles
3D

The site should feel expensive because of composition, not decoration.

---

# 52 — CSS ARCHITECTURE

Use plain CSS.

Create:

/assets/css/main.css
/assets/css/components.css
/assets/css/admin.css
/assets/css/responsive.css

CSS variables:

:root {
--bg: #F7F7F5;
--text: #0A0A0A;
--muted: #6B6B6B;
--border: #E5E5E5;
--accent: #155EEF;
}

Do not use Tailwind.

Do not use Bootstrap.

---

# 53 — JAVASCRIPT

Use pure Vanilla JavaScript.

Do NOT use:

jQuery
React
Vue
Angular

Use:

fetch()
FormData
async/await
IntersectionObserver
localStorage where appropriate
setInterval for polling

Organize JS into modules.

Example:

/assets/js/main.js
/assets/js/auth.js
/assets/js/projects.js
/assets/js/chat.js
/assets/js/admin.js
/assets/js/media.js

---

# 54 — CHAT POLLING OPTIMIZATION

Do NOT reload all messages every 2 seconds.

Track:

last_message_id

Request:

GET /api/v1/messages/list.php?conversation_id=123&after_id=890

Server returns only new messages.

This keeps the system lightweight.

---

# 55 — ONLINE STATUS

Use heartbeat.

JavaScript periodically calls:

POST /api/v1/users/heartbeat.php

Update:

last_seen_at

If:

current_time - last_seen_at < threshold

then:

ONLINE

Otherwise:

OFFLINE

---

# 56 — TYPING INDICATOR

When user types:

POST:

/api/v1/messages/typing.php

Store temporary typing state.

Frontend polls:

GET:

/api/v1/messages/typing.php?conversation_id=123

Show:

"Typing..."

Do not write unnecessary permanent rows to MySQL.

Use lightweight temporary/session-based storage if possible.

---

# 57 — RESPONSIVE DESIGN

Desktop
Tablet
Mobile

must all be intentionally designed.

Mobile dashboard:

Bottom navigation:

Home
Projects
Messages
Notifications
Profile

Admin mobile:

responsive sidebar/drawer.

---

# 58 — SEO

Implement:

Dynamic title
Meta description
Canonical
Open Graph
Twitter/X cards
Sitemap
Robots.txt

Portfolio pages must have dynamic metadata.

---

# 59 — PERFORMANCE

Use:

lazy loading
WebP images
responsive images
minified production CSS/JS where appropriate
browser caching
PHP OPcache
database indexes
pagination

Do not load unnecessary JavaScript.

---

# 60 — ERROR PAGES

Create:

404.php
403.php
500.php

Beautiful branded error pages.

No default Apache errors.

---

# 61 — API ERROR CODES

Use consistent codes:

AUTH_REQUIRED
AUTH_INVALID
FORBIDDEN
NOT_FOUND
VALIDATION_ERROR
RATE_LIMITED
UPLOAD_ERROR
SERVER_ERROR
DATABASE_ERROR

---

# 62 — JSON USAGE

Use JSON for:

API responses
API requests
feature configuration
flexible metadata
SEO metadata
technologies
project case-study metadata
notification payloads

Do NOT use JSON instead of relational tables for:

users
projects
messages
services
permissions
notifications

---

# 63 — DATABASE FILES

Create:

/database/schema.sql

and:

/database/seed.sql

schema.sql must contain the complete database structure.

seed.sql must contain:

default roles
default permissions
default project statuses
default feature flags
default settings

Do not insert fake production users or fake statistics.

---

# 64 — INSTALLATION

Create:

/install.php

Installer must:

1. Check PHP version
2. Check required PHP extensions
3. Check database connection
4. Create database tables
5. Insert default configuration
6. Create first SUPER_ADMIN
7. Generate configuration
8. Lock installer after installation

After successful installation:

/install.php

must become inaccessible.

---

# 65 — CONFIGURATION

Create:

/config/config.php

Database:

/config/database.php

Use environment/server configuration where possible.

Never expose database credentials to frontend.

---

# 66 — .HTACCESS

Configure:

HTTPS redirect
security headers
disable directory listing
protect config files
protect SQL files
protect logs
clean URLs where appropriate

Example:

Users must never be able to download:

/config/database.php
/database/schema.sql
/storage/logs/*
.env

---

# 67 — ADMIN AUTHORIZATION

Every admin page must verify:

1. logged in
2. active account
3. role
4. permission

Do not rely only on hiding menu items.

The backend must block unauthorized requests.

---

# 68 — PUBLIC WEBSITE CMS PRINCIPLE

Admin changes must appear on public website without editing PHP source.

Example:

Admin changes Hero title.

Database:

pages/settings table updated.

Homepage:

PHP queries database.

New title appears automatically.

---

# 69 — USER FLOW

New visitor:

Homepage
↓
Work
↓
Service
↓
Start Project
↓
Register/Login
↓
Project Form
↓
Project Created
↓
Chat
↓
Project Tracking

---

# 70 — ADMIN FLOW

Admin login:

/admin

↓
Dashboard

↓
New project notification

↓
Open project

↓
Open client chat

↓
Discuss

↓
Change project status

↓
Client receives notification

↓
Continue development

↓
Complete project

---

# 71 — ADMIN CONTENT FLOW

Admin:

/admin/media.php

Upload image

↓

Select image in:

Hero / Banner / Portfolio / Service

↓

Save

↓

Website automatically updates.

---

# 72 — NO HARD-CODED CONTENT

Do not hard-code editable values such as:

Hero title
Hero subtitle
Banner
Services
Portfolio
Contact data
Social links
Feature flags

Store them in database.

Static UI labels may remain in PHP/HTML.

---

# 73 — NO FAKE DATA

Absolutely do not invent:

clients
reviews
statistics
revenue
awards
project results

If real data is unavailable:

Use empty state.

---

# 74 — CODE QUALITY

Write clean PHP.

Use reusable functions.

Avoid massive duplicated PHP files.

Use:

/includes/functions.php

for shared utilities.

Use authentication helper:

/includes/auth.php

Use centralized:

database connection

JSON response function

permission check

CSRF validation

file validation

---

# 75 — DATABASE ACCESS

Create a reusable PDO connection.

Example concept:

getDB()

All database access must go through PDO.

---

# 76 — API AUTHENTICATION

API endpoints must detect logged-in user through secure session/token mechanism.

Public endpoints:

services
portfolio
pages
banners
config

Protected:

projects
messages
notifications
profile

Admin-only:

admin APIs

---

# 77 — API PAGINATION

Use:

?page=1
&limit=20

Never return thousands of records unnecessarily.

---

# 78 — SEARCH

Admin search:

Users
Projects
Messages
Portfolio
Media

Use server-side SQL search.

Add indexes where useful.

---

# 79 — ADMIN FILTERING

Projects:

Status
Priority
Service
Date
User

Users:

Status
Role
Date

Messages:

Unread
Project
User
Date

---

# 80 — ACCESS CONTROL EXAMPLES

User A requests:

/api/v1/projects/get.php?id=UserBProject

Server MUST return:

403 FORBIDDEN

User cannot access another user's project.

Admin with:

projects.read

can access.

---

# 81 — PROJECT CHAT SECURITY

Only:

* project owner
* authorized admin

can access project conversation.

Never expose conversation IDs as sufficient authorization.

Always verify membership.

---

# 82 — NOTIFICATION SECURITY

Users only see their own notifications.

Admin notification management requires permission.

---

# 83 — FUTURE COMPATIBILITY

Although Android and Windows are NOT being built now, design API architecture so they can later consume the same API.

Do not create browser-specific data formats.

Keep JSON API clean and predictable.

Future:

Android
↓
/api/v1

Windows
↓
/api/v1

Web
↓
/api/v1

All use the same Core.

---

# 84 — FINAL VISUAL QA

Before finishing, inspect every page.

Check:

Typography
Spacing
Alignment
Images
Mobile
Tablet
Desktop
Hover
Focus
Loading
Errors
Empty states
Forms
Buttons
Navigation

No broken layouts.

No overflow.

No placeholder Lorem Ipsum.

---

# 85 — FINAL FUNCTIONAL QA

Test:

Register
Login
Logout
Password reset
Profile
Project creation
Project editing
Project status
Chat
File upload
Notifications
Admin login
Admin users
Admin projects
Admin chat
Admin media
Admin services
Admin portfolio
Admin banners
Admin settings
Feature flags
Audit logs

---

# 86 — FINAL SECURITY QA

Test:

Unauthorized API
Unauthorized admin page
CSRF
XSS
SQL injection
File upload abuse
Session hijacking protection
Rate limiting
Brute force
Permission escalation
Direct URL access

Fix every critical vulnerability found.

---

# 87 — FINAL RULE

The project MUST use ONLY:

PHP
HTML
CSS
Vanilla JavaScript
MySQL
JSON

No exceptions.

No React.

No Node.js.

No TypeScript.

No Tailwind.

No Bootstrap.

No Laravel.

No WordPress.

No jQuery.

No npm.

No Redis.

No WebSocket server.

The chat must use PHP + AJAX polling.

The database must be MySQL.

All frontend communication with the backend must use PHP JSON APIs.

---

# 88 — FINAL DELIVERABLE

Deliver a complete working WebHub.uz website with:

PUBLIC WEBSITE
+
USER ACCOUNT
+
USER DASHBOARD
+
PROJECT MANAGEMENT
+
REAL-TIME-LIKE CHAT
+
NOTIFICATIONS
+
ADMIN PANEL
+
CMS
+
MEDIA LIBRARY
+
PORTFOLIO MANAGEMENT
+
SERVICE MANAGEMENT
+
FEATURE FLAGS
+
SETTINGS
+
AUTHENTICATION
+
AUTHORIZATION
+
AUDIT LOG
+
MYSQL DATABASE
+
PHP JSON API
+
SECURITY
+
RESPONSIVE DESIGN
+
SEO
+
INSTALLER

Do not stop at a design mockup.

Do not create static fake screens.

Build the actual functional system.

Before declaring completion, perform a full code, database, security, UX, responsive, API and functionality audit.

Fix all critical issues.

The final website must be production-oriented, maintainable, secure, fast and visually premium.
