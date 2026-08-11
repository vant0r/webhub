# WEBHUB.UZ — PHP + HTML + CSS + JAVASCRIPT + JSON

# CURRENT DEVELOPMENT STATUS

**Bosqich:** 0 — Arxitektura va foundation

**Branch:** `feature/json-api-foundation`

**PR:** #2 — `feat: WebHub JSON PHP foundation`

## Muhim arxitektura qarori

Loyiha **MySQL/SQL ishlatmaydi**. Barcha persistent ma’lumotlar real JSON fayllarda saqlanadi. Web sayt va APK ma’lumotlarni PHP API orqali oladi.

## Qat’iy texnologik qoidalar

- PHP 8.x
- HTML5
- CSS3
- Vanilla JavaScript
- JSON
- Apache
- `.htaccess`
- React, Vue, Angular, Node.js, TypeScript, Tailwind, Bootstrap, Laravel, Symfony, WordPress, jQuery va boshqa frameworklar yo‘q.
- Dark mode, qora/dark background, cyberpunk/neon yo‘q.
- User-facing barcha matnlar o‘zbek lotin tilida.
- Mock/fake data yo‘q.
- Real JSON persistence va real PHP API ishlatiladi.
- Keraksiz sahifalar yaratilmaydi.

## Hozirgacha bajarilgan

- Repository audit qilindi.
- PHP foundation yaratildi.
- JSON storage foundation yaratildi.
- JSON read/write helperlari yaratildi.
- JSON API response helperlari yaratildi.
- Session cookie security foundation qo‘yildi.
- Responsive premium Light Mode homepage foundation yaratildi.
- User dashboard foundation yaratildi.
- `/api/v1/` yo‘nalishi boshlandi.
- API config endpoint foundation yaratildi.
- API services endpoint foundation yaratildi.

## Muhim eslatma

Foundation hali production-ready emas. Authentication, authorization, buyurtma, chat, admin, JSON concurrency, rate limiting, audit va barcha security tekshiruvlari hali to‘liq yakunlanmagan.

---

# LOYIHA MAQSADI

WebHub — raqamli mahsulot studiyasi platformasi.

Foydalanuvchi:

1. Web sayt yoki APK orqali kiradi.
2. Ro‘yxatdan o‘tadi yoki login qiladi.
3. Xizmatni tanlaydi.
4. Buyurtma beradi.
5. Buyurtma bo‘yicha alohida chatga ega bo‘ladi.
6. Buyurtma statusini kuzatadi.
7. Admin bilan chat orqali ishlaydi.
8. Bildirishnomalarni oladi.

Admin:

1. Foydalanuvchilarni boshqaradi.
2. Buyurtmalarni boshqaradi.
3. Buyurtma statuslarini o‘zgartiradi.
4. Chat orqali foydalanuvchi bilan ishlaydi.
5. Xizmatlar va portfolio ma’lumotlarini boshqaradi.
6. Bildirishnomalarni boshqaradi.
7. Audit tarixini ko‘radi.

---

# TAVSIYA ETILGAN STRUKTURA

```text
/webhub/
│
├── index.php
├── work.php
├── project.php
├── services.php
├── about.php
├── contact.php
├── login.php
├── register.php
├── logout.php
│
├── dashboard.php
├── projects.php
├── messages.php
├── profile.php
│
├── api/
│   └── v1/
│       ├── auth/
│       ├── users/
│       ├── projects/
│       ├── messages/
│       ├── services/
│       ├── portfolio/
│       ├── notifications/
│       └── config/
│
├── admin/
│   ├── index.php
│   ├── users.php
│   ├── projects.php
│   ├── messages.php
│   ├── services.php
│   ├── portfolio.php
│   ├── settings.php
│   ├── notifications.php
│   ├── audit.php
│   ├── admins.php
│   └── roles.php
│
├── config.php
├── functions.php
├── auth.php
│
├── data/
│   ├── users.json
│   ├── orders.json
│   ├── conversations.json
│   ├── messages.json
│   ├── projects.json
│   ├── services.json
│   ├── portfolio.json
│   ├── notifications.json
│   ├── sessions.json
│   ├── settings.json
│   └── audit.json
│
├── storage/
│   └── logs/
│
├── install.php
└── .htaccess
```

Kerak bo‘lmagan modul yoki sahifa faqat kelajakda real talab paydo bo‘lsa qo‘shiladi.

---

# PHASE 1 — JSON AUTHENTICATION

**Hozirgi asosiy ish shu.**

## 1. Register

- `register.php`
- `POST /api/v1/auth/register.php`
- ism
- telefon yoki email
- password
- duplicate account tekshiruvi
- input validation
- `password_hash()`
- unique ID/UUID
- `created_at`
- `updated_at`
- JSON'ga real yozish

## 2. Login

- `login.php`
- `POST /api/v1/auth/login.php`
- credential validation
- `password_verify()`
- secure session
- session regeneration
- `last_login_at`
- xavfsiz error response

## 3. Logout

- `POST /api/v1/auth/logout.php`
- session revoke/destroy
- cookie tozalash

## 4. Current user

- `GET /api/v1/auth/me.php`
- login qilinmagan user → `401`
- login qilgan user → public profile
- password hash/token/session secret hech qachon response'da bo‘lmaydi

## 5. Profile

- `GET /api/v1/users/me.php`
- `PATCH /api/v1/users/update.php`
- faqat o‘z profilini o‘zgartirish
- name/phone/email validation

## 6. Auth security

- session fixation himoyasi
- CSRF browser formalarida
- request validation
- output escaping
- secure session cookie
- JSON write uchun `LOCK_EX`
- data/storage HTTP access bloklanishi
- brute-force/rate limit foundation

### PHASE 1 yakun mezoni

`register → login → session → me → profile → logout` real JSON storage bilan ishlashi va security testlardan o‘tishi kerak.

---

# PHASE 2 — BUYURTMA TIZIMI

Auth tugamaguncha boshlanmaydi.

## Buyurtma

- xizmat tanlash
- nom/title
- batafsil tavsif
- budjet
- deadline
- validation
- unique ID/UUID
- created_at
- updated_at
- status

## Statuslar

1. Yangi
2. Muhokama
3. Rejalashtirish
4. Dizayn
5. Dasturlash
6. Test
7. Mijoz ko‘rib chiqishi
8. Tuzatish
9. Yakunlandi
10. Bekor qilindi

## Buyurtma yaratilganda

1. validation
2. JSON'ga yozish
3. boshlang‘ich status
4. project conversation yaratish
5. userni conversation'ga biriktirish
6. admin notification yaratish
7. JSON success response

---

# PHASE 3 — CHAT

Web va APK bir xil PHP API chat tizimidan foydalanadi.

**WebSocket server ishlatilmaydi.**

Vanilla JS `fetch()` + AJAX polling ishlatiladi.

## API

- `GET /api/v1/messages/list.php`
- `POST /api/v1/messages/send.php`
- `POST /api/v1/messages/read.php`
- `POST /api/v1/messages/delete.php`

## Funksiyalar

- text
- reply
- edit
- delete
- read status
- unread count
- typing indicator
- online/last seen
- system message

Yangi xabarlarni olishda `after_id` ishlatiladi; butun tarix har pollingda qayta olinmaydi.

---

# PHASE 4 — APK API

APK frontend emas, PHP backend API bilan ishlaydi.

Barcha API response'lar JSON:

```text
success
 data
 message
```

yoki:

```text
success
 error
```

## Asosiy endpointlar

```text
/api/v1/config.php

/api/v1/auth/register.php
/api/v1/auth/login.php
/api/v1/auth/logout.php
/api/v1/auth/me.php

/api/v1/users/me.php
/api/v1/users/update.php

/api/v1/projects/list.php
/api/v1/projects/create.php
/api/v1/projects/get.php
/api/v1/projects/update.php
/api/v1/projects/status.php

/api/v1/messages/list.php
/api/v1/messages/send.php
/api/v1/messages/read.php
/api/v1/messages/delete.php

/api/v1/services/list.php
/api/v1/portfolio/list.php
```

API authorization orqali user boshqa userning project/chat ma’lumotini ko‘ra olmaydi.

---

# PHASE 5 — ADMIN

Faqat real kerak bo‘lgan admin sahifalar:

```text
/admin/index.php
/admin/users.php
/admin/projects.php
/admin/messages.php
/admin/services.php
/admin/portfolio.php
/admin/settings.php
/admin/notifications.php
/admin/audit.php
/admin/admins.php
/admin/roles.php
```

## Admin imkoniyatlari

- users
- projects/orders
- status
- chat
- services
- portfolio
- notifications
- settings
- audit
- admins
- roles/permissions

Statistika faqat real JSON ma’lumotlardan hisoblanadi.

---

# PHASE 6 — JSON STORAGE

## Qoidalar

- har bir JSON fayl bitta domen ma’lumotini saqlaydi
- `LOCK_EX` bilan yoziladi
- malformed JSON xavfsiz boshqariladi
- user input sanitize/validate qilinadi
- ID collision oldi olinadi
- parallel requestlarda corruption kamaytiriladi
- data/storage public access yopiladi
- password hash API response'da chiqmaydi
- secret/tokenlar public response'da chiqmaydi

---

# PHASE 7 — SECURITY

Har bir phase davomida bajariladi.

- password hashing
- secure session
- authorization
- ownership check
- input validation
- output escaping
- CSRF
- rate limiting
- brute-force himoyasi
- secure headers
- `.htaccess` himoyasi
- path traversal himoyasi
- IDOR himoyasi
- audit log
- upload bo‘lsa MIME/extension/size validation
- PHP executable uploadni bloklash

---

# PHASE 8 — UI/UX

Faqat Light Mode.

## Dizayn

- Apple-inspired
- premium
- oq
- och kulrang
- glass
- blur
- minimal
- katta typography
- whitespace

## Invisible UI

Default:

- border ko‘rinmasin
- button frame ko‘rinmasin
- card frame ko‘rinmasin
- shadow minimal

Hover:

- glass background
- blur
- nozik border
- soft shadow
- micro animation

Mobile/touch qurilmalarda hover o‘rniga `:active` va touch-friendly interaction ishlatiladi.

## Responsive

- desktop
- laptop
- tablet
- mobile

Navbar, hero, services, portfolio, dashboard, chat va admin panel barcha ekranlarda ishlashi shart.

---

# PHASE 9 — TESTING

Har milestone oxirida:

## Functional

- register
- login
- logout
- profile
- order create
- order list
- ownership
- chat send/list/read
- notifications
- admin authorization

## Security

- unauthorized API
- boshqa user project access
- boshqa user conversation access
- invalid input
- malformed JSON
- CSRF
- session fixation
- brute force
- path traversal

## UI

- responsive
- hover
- touch
- keyboard navigation
- loading
- empty state
- error state

---

# README ISH TARTIBI

Har bir muhim milestone oxirida README boshidagi `CURRENT DEVELOPMENT STATUS` yangilanadi.

Har safar yoziladi:

1. Nima tugadi.
2. Nima tekshirildi.
3. Nima qolgan.
4. Keyingi aniq task.
5. Keyingi agent qayerdan boshlashi.

Chat/token limiti tugashidan oldin `NEXT EXECUTION ORDER` ichida aniq davom etish nuqtasi qoldiriladi.

---

# NEXT EXECUTION ORDER

## HOZIR

**PHASE 1 → Register API**

Ketma-ketlik:

1. Register API
2. Register validation/security
3. JSON persistence test
4. Login API
5. Session security
6. Logout API
7. `me` API
8. Profile API
9. Auth security test
10. README status update
11. Commit

**Boshqa phase'ga o‘tilmasin.**

**Tayyor kod qayta yozilmasin.**

Avval mavjud kod audit qilinsin, keyin faqat qolgan task implement qilinsin.

**Keyingi agentning aniq boshlash nuqtasi: `POST /api/v1/auth/register.php`.**
