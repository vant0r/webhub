# WEBHUB.UZ — CONTINUATION STATUS

> **AI AGENT: READ THIS FIRST.** This README is the permanent handoff document. Inspect the repository and continue from the exact phase below. Never restart completed work.

```text
CURRENT PHASE: PHASE 01 — FOUNDATION / API CORE
STATUS: IN PROGRESS
LAST COMPLETED: Project structure, MySQL schema, seed data, auth foundation, Apache security, public services/portfolio APIs, user profile/notifications/projects APIs, message polling API
NEXT TASK: Complete remaining API endpoints and admin API namespace, then begin authentication UI
LAST COMMIT: 5d86185cd4f9538130f37ab480137539c476d9ed
BLOCKERS: NONE
DESIGN: BRIGHT APPLE-INSPIRED ONLY
STACK: PHP 8.x + HTML5 + CSS3 + VANILLA JS + MYSQL 8.x + JSON + APACHE
```

## MANDATORY CONTINUATION RULES

1. Read this README before coding.
2. Read `CURRENT PHASE` first.
3. Inspect existing files before editing.
4. Continue from `NEXT TASK`.
5. Never recreate completed work.
6. Use only the locked technology stack.
7. User-facing UI is Uzbek Latin.
8. Design is bright Apple-inspired only. No dark mode, black/dark backgrounds, cyberpunk neon, Tailwind, Bootstrap or generic templates.
9. After every logical milestone, update this status block and commit it with the implementation.
10. A new chat must resume without asking what was previously done.

## DESIGN LOCK

Bright, white/ivory/soft-gray, premium, minimal, spacious, Apple-inspired. Use glass/blur carefully, subtle borders/shadows, smooth micro-interactions, responsive layout and accessible contrast.

Colors:
- Background `#F8F8F6`
- Surface `#FFFFFF`
- Secondary `#F2F2EF`
- Text `#111111`
- Secondary text `#6E6E73`
- Accent `#0071E3`
- Success `#34C759`
- Warning `#FF9F0A`
- Danger `#FF3B30`

**No dark UI.**

## TECHNOLOGY LOCK

Allowed only: PHP 8.x, HTML5, CSS3, Vanilla JavaScript, MySQL 8.x, JSON, Apache, `.htaccess`.

Forbidden: React, Vue, Angular, Next.js, Node.js, TypeScript, Tailwind CSS, Bootstrap, jQuery, Laravel, Symfony, WordPress, npm, Redis, WebSocket server and external frontend/backend frameworks.

## CURRENT IMPLEMENTATION

### Database

`database/schema.sql` contains users, roles, sessions, project_statuses, services, projects, portfolio, pages, banners, media, conversations, conversation_members, messages, message_attachments, notifications, feature_flags, settings and audit_logs.

`database/seed.sql` contains default roles, project statuses, feature flags and public settings.

### Security foundation

- PDO architecture
- password hashing
- session authentication helpers
- permission helpers
- CSRF helpers
- Apache directory protection
- upload PHP execution blocking

### API currently implemented

- `/api/v1/auth/register.php`
- `/api/v1/auth/login.php`
- `/api/v1/auth/logout.php`
- `/api/v1/auth/me.php`
- `/api/v1/config.php`
- `/api/v1/users/me.php`
- `/api/v1/users/update.php`
- `/api/v1/users/notifications.php`
- `/api/v1/projects/index.php`
- `/api/v1/messages/index.php`
- `/api/v1/services/index.php`
- `/api/v1/portfolio/index.php`

Message polling verifies conversation membership and requests only messages newer than the supplied message ID.

## TARGET STRUCTURE

```text
webhub/
├── index.php login.php register.php logout.php
├── work.php project.php services.php about.php contact.php
├── dashboard.php projects.php messages.php profile.php
├── api/v1/
│   ├── bootstrap.php config.php
│   ├── auth/ users/ projects/ messages/
│   ├── services/ portfolio/ media/ notifications/ admin/
├── admin/
│   ├── index.php users.php projects.php messages.php
│   ├── services.php portfolio.php media.php banners.php pages.php
│   ├── features.php settings.php notifications.php audit.php
│   └── admins.php roles.php
├── config/ includes/ assets/ uploads/ database/ storage/
└── .htaccess
```

## DEVELOPMENT PHASES

- PHASE 00 — Planning: **COMPLETE**
- PHASE 01 — Foundation / API Core: **IN PROGRESS**
- PHASE 02 — Authentication UI: **NOT STARTED**
- PHASE 03 — Public Website UI/UX: **NOT STARTED**
- PHASE 04 — User Dashboard: **NOT STARTED**
- PHASE 05 — Project Management: **NOT STARTED**
- PHASE 06 — Chat: **NOT STARTED**
- PHASE 07 — Admin Panel: **NOT STARTED**
- PHASE 08 — CMS / Media: **NOT STARTED**
- PHASE 09 — Notifications / Feature Flags: **NOT STARTED**
- PHASE 10 — Security Hardening: **NOT STARTED**
- PHASE 11 — QA / Responsive / Production: **NOT STARTED**

## NEXT EXECUTION ORDER

1. Complete missing user/project/message APIs.
2. Add admin API namespace with server-side permission checks.
3. Complete shared config and error handling.
4. Implement login/register UI with Vanilla JS.
5. Implement bright Apple-style public website.
6. Implement dashboard and project UI.
7. Implement AJAX chat.
8. Implement full admin CMS.
9. Implement media/uploads.
10. Implement notifications and feature controls.
11. Security audit.
12. Responsive QA and production cleanup.

**NEXT AGENT: DO NOT ASK WHAT TO DO. READ THIS FILE, INSPECT THE REPOSITORY, AND CONTINUE FROM PHASE 01.**
