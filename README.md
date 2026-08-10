# WEBHUB.UZ — CONTINUATION STATUS

> **AI AGENT: READ THIS FIRST.** This README is the permanent handoff document. Inspect the repository and continue from the exact phase below. Never restart completed work.

```text
CURRENT PHASE: PHASE 03 — AUTHENTICATION UI
STATUS: IN PROGRESS
LAST COMPLETED: Public website UI/UX + login/register UI + CSRF hardening + session-aware navigation
NEXT TASK: Complete authentication flow audit, then build user dashboard
LAST COMMIT: bf2eb2baa5d273a9987d6ba2823f23b9f6a55459
BLOCKERS: NONE
DESIGN: BRIGHT APPLE-INSPIRED ONLY
STACK: PHP 8.x + HTML5 + CSS3 + VANILLA JS + MYSQL 8.x + JSON + APACHE
```

## MANDATORY CONTINUATION RULES
1. Read this README before coding.
2. Inspect the repository before editing.
3. Continue from the exact NEXT TASK.
4. Never recreate completed work.
5. Use only PHP + HTML + CSS + Vanilla JS + MySQL + JSON + Apache.
6. All user-facing UI is Uzbek Latin.
7. Bright Apple-inspired only. No dark mode, dark backgrounds, cyberpunk neon, Bootstrap or Tailwind.
8. Update this status after every logical milestone.
9. Commit implementation and status updates.
10. A new AI chat must resume from this file alone.

## DESIGN LOCK
Bright, premium, minimal, spacious, responsive, Apple-inspired.

Background `#F8F8F6`; surface `#FFFFFF`; secondary `#F2F2EF`; text `#111111`; muted `#6E6E73`; accent `#0071E3`; success `#34C759`; warning `#FF9F0A`; danger `#FF3B30`.

Use system/SF Pro-style fonts, subtle borders, soft shadows, large typography, rounded surfaces and restrained glass/blur.

## COMPLETED FOUNDATION
- PHP project structure
- MySQL schema and seed data
- PDO/security foundation
- authentication API
- user profile/notifications APIs
- projects API
- chat polling/send APIs
- services/portfolio APIs
- admin authorization
- admin users/projects/settings/features/audit APIs
- Apache protection
- bright Apple-style CSS foundation
- redesigned `index.php`
- refined global navigation

## COMPLETED PUBLIC WEBSITE
- `services.php` — API-backed services
- `work.php` — API-backed portfolio
- `about.php` — CMS-backed about content
- `contact.php` — project inquiry flow
- responsive shared public components

## COMPLETED AUTHENTICATION UI
- `login.php` — premium responsive login UI
- `register.php` — premium responsive registration UI with client-side password confirmation
- Existing authentication APIs audited
- Login and registration APIs now enforce CSRF tokens
- Password hashing remains Argon2id when available, otherwise PHP default
- Session login/logout foundation retained
- Global navigation now switches between `Kirish` and `Kabinet` based on session

## TARGET PUBLIC/APP SITEMAP
- Home
- Work / Portfolio
- Services
- About
- Contact
- Login
- Register
- User Dashboard

Keep the sitemap intentionally small. Do not add unnecessary pages.

## DEVELOPMENT PHASES
- PHASE 00 — Planning: **COMPLETE**
- PHASE 01 — Foundation / API Core: **COMPLETE**
- PHASE 02 — Public Website UI/UX: **COMPLETE**
- PHASE 03 — Authentication UI: **IN PROGRESS**
- PHASE 04 — User Dashboard: **NOT STARTED**
- PHASE 05 — Project Management: **NOT STARTED**
- PHASE 06 — Chat: **NOT STARTED**
- PHASE 07 — Admin Panel: **NOT STARTED**
- PHASE 08 — CMS / Media: **NOT STARTED**
- PHASE 09 — Notifications / Feature Controls: **NOT STARTED**
- PHASE 10 — Security Hardening: **NOT STARTED**
- PHASE 11 — QA / Responsive / Production: **NOT STARTED**

## NEXT EXECUTION ORDER
1. Audit login/register/logout end-to-end against existing session/auth helpers.
2. Build `/user/` dashboard using real authentication/profile/project/notification APIs.
3. Build project management UI.
4. Build chat UI.
5. Continue admin panel → CMS/media → notifications → security hardening → QA.

**NEXT AGENT: DO NOT ASK WHAT TO DO. START WITH THE AUTHENTICATION END-TO-END AUDIT, THEN `/user/`.**
