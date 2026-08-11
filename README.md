# WEBHUB.UZ — PHP + HTML + CSS + JAVASCRIPT + JSON

# CURRENT DEVELOPMENT STATUS

**Bosqich:** 0 — Toza arxitektura / rebuild boshlanishi

**Branch:** `feature/json-api-foundation`

**PR:** #2

## Qat’iy texnologik qoidalar

- PHP 8.x
- HTML5
- CSS3
- Vanilla JavaScript
- JSON
- Apache
- `.htaccess`
- MySQL/SQL yo‘q.
- React, Vue, Angular, Node.js, TypeScript, Tailwind, Bootstrap, Laravel, Symfony, WordPress, jQuery va boshqa frameworklar yo‘q.
- Dark mode, qora/dark background, cyberpunk/neon yo‘q.
- User-facing barcha matnlar o‘zbek lotin tilida.
- Mock/fake data yo‘q.
- Real JSON persistence va real PHP API ishlatiladi.
- Keraksiz qo‘shimcha sahifalar yaratilmaydi.

## MUHIM

Oldingi implementation kodlari to‘liq tozalanadi/rebuild qilinadi.

Quyidagi struktura **o‘zgarmas asosiy loyiha strukturasi** hisoblanadi. Yangi papka yoki sahifa faqat real zarurat bo‘lsa va README'dagi arxitekturaga mos ravishda qo‘shiladi.

---

# LOYIHA STRUKTURASI

```text
webhub/
│
├── index.php
├── about.php
├── services.php
├── portfolio.php
├── contact.php
├── login.php
├── register.php
├── logout.php
│
├── config.php
├── functions.php
├── auth.php
│
├── api/
│   ├── index.php
│   │
│   ├── auth.php
│   ├── profile.php
│   │
│   ├── orders.php
│   ├── order.php
│   ├── order-create.php
│   ├── order-update.php
│   │
│   ├── chat.php
│   ├── message.php
│   ├── message-send.php
│   │
│   ├── projects.php
│   ├── services.php
│   └── notifications.php
│
├── data/
│   ├── users.json
│   ├── orders.json
│   ├── messages.json
│   ├── projects.json
│   ├── services.json
│   ├── notifications.json
│   └── settings.json
│
├── admin.php
├── admin-login.php
├── admin-dashboard.php
├── admin-orders.php
├── admin-chat.php
├── admin-projects.php
├── admin-services.php
├── admin-users.php
├── admin-settings.php
│
├── install.php
└── .htaccess
```

## Strukturani o‘zgartirmaslik qoidasi

- `webhub/` root strukturasi shu ko‘rinishda qoladi.
- `api/` APK va boshqa clientlar uchun PHP API qatlamidir.
- `data/` faqat JSON persistence uchun ishlatiladi.
- `admin*.php` admin boshqaruv qismidir.
- `config.php`, `functions.php`, `auth.php` umumiy backend foundation hisoblanadi.
- CSS va Vanilla JS alohida framework/build tizimiga chiqarilmaydi; kerakli sahifa ichida ishlatiladi.
- SQL database, migration, ORM yoki database server qo‘shilmaydi.

---

# SAHIFALAR VAZIFASI

## Public

### `index.php`

Asosiy landing/home sahifa.

### `about.php`

WebHub haqida.

### `services.php`

Mavjud xizmatlar.

### `portfolio.php`

Bajarilgan loyihalar va portfolio.

### `contact.php`

WebHub bilan bog‘lanish.

### `login.php`

Foydalanuvchi login sahifasi.

### `register.php`

Yangi foydalanuvchi ro‘yxatdan o‘tishi.

### `logout.php`

Sessiyani xavfsiz yakunlash.

---

# UMUMIY BACKEND

### `config.php`

- loyiha konfiguratsiyasi
- JSON storage yo‘llari
- session konfiguratsiyasi
- umumiy xavfsizlik sozlamalari

### `functions.php`

- JSON read/write
- validation helperlar
- response helperlar
- ID/UUID generator
- umumiy utility funksiyalar

### `auth.php`

- authentication
- authorization
- session tekshiruvi
- user ownership tekshiruvi
- admin authorization foundation

---

# API

`api/` alohida API framework emas. Oddiy PHP endpointlar to‘plami.

## `api/index.php`

API kirish/ma’lumot endpointi.

## `api/auth.php`

- register
- login
- logout
- current user
- authentication flow

## `api/profile.php`

- profilni olish
- profilni yangilash

## `api/orders.php`

- buyurtmalar ro‘yxati
- userga tegishli buyurtmalar

## `api/order.php`

- bitta buyurtma
- buyurtma tafsilotlari

## `api/order-create.php`

- yangi buyurtma yaratish

## `api/order-update.php`

- buyurtma ma’lumotlari/statusini ruxsat asosida yangilash

## `api/chat.php`

- chat/conversation ma’lumotlari
- chatni olish

## `api/message.php`

- bitta xabar
- xabar tafsilotlari

## `api/message-send.php`

- yangi xabar yuborish

## `api/projects.php`

- loyiha ma’lumotlari
- project/order bilan bog‘liq umumiy ma’lumotlar

## `api/services.php`

- xizmatlar ro‘yxati

## `api/notifications.php`

- foydalanuvchi notificationlari
- o‘qilgan/o‘qilmagan holati

---

# JSON DATA

## `data/users.json`

Foydalanuvchilar.

Saqlanadi:

- id
- name
- phone/email
- password hash
- status
- created_at
- updated_at
- last_login_at

Password hech qachon API response'da qaytarilmaydi.

## `data/orders.json`

Buyurtmalar.

Saqlanadi:

- id
- user_id
- service_id
- title
- description
- budget
- deadline
- status
- created_at
- updated_at

## `data/messages.json`

Chat xabarlari.

- id
- order_id
- sender_id
- message
- reply_to
- read status
- created_at
- updated_at

## `data/projects.json`

WebHub loyihalari/portfolio bilan bog‘liq project ma’lumotlari.

## `data/services.json`

WebHub xizmatlari.

## `data/notifications.json`

Foydalanuvchi va tizim notificationlari.

## `data/settings.json`

Sayt va tizim sozlamalari.

---

# ADMIN

### `admin.php`

Admin panelga kirish/router asosiy nuqtasi.

### `admin-login.php`

Admin authentication.

### `admin-dashboard.php`

Real JSON ma’lumotlar asosidagi dashboard.

### `admin-orders.php`

Buyurtmalarni boshqarish.

### `admin-chat.php`

Foydalanuvchilar bilan buyurtma chatlari.

### `admin-projects.php`

Loyihalarni boshqarish.

### `admin-services.php`

Xizmatlarni boshqarish.

### `admin-users.php`

Foydalanuvchilarni boshqarish.

### `admin-settings.php`

Tizim sozlamalari.

---

# `install.php`

Birinchi o‘rnatish uchun.

Vazifalari:

- kerakli JSON fayllarni yaratish
- boshlang‘ich JSON strukturasini tayyorlash
- kerakli kataloglarni yaratish
- permissionlarni tekshirish
- o‘rnatish holatini tekshirish

SQL/database installation bo‘lmaydi.

---

# `.htaccess`

- JSON fayllarga to‘g‘ridan-to‘g‘ri HTTP accessni bloklash
- `data/` himoyasi
- xavfsizlik headerlari
- PHP fayllarining noto‘g‘ri ishlatilishini cheklash
- kerakli Apache routing/security qoidalari

---

# UI/UX

Faqat **premium Light Mode**.

- oq
- yorqin kulrang
- Apple-inspired
- glass
- blur
- minimal
- katta typography
- whitespace
- yumshoq micro-animation

## Invisible UI

Default holatda:

- border deyarli ko‘rinmaydi
- tugma ramkasi bilinmaydi
- card ramkasi bilinmaydi
- shadow minimal

Cursor hover bo‘lganda:

- glass effect
- blur
- nozik border
- soft shadow
- micro interaction

Mobile/touch qurilmalarda hover mavjud emasligi hisobga olinadi.

---

# ASOSIY FUNKSIYALAR

## User

1. Ro‘yxatdan o‘tish.
2. Login.
3. Profil.
4. Xizmatlarni ko‘rish.
5. Buyurtma berish.
6. Buyurtmalarini ko‘rish.
7. Buyurtma statusini kuzatish.
8. Buyurtma chatidan foydalanish.
9. Notificationlarni ko‘rish.
10. Logout.

## Admin

1. Login.
2. Userlarni boshqarish.
3. Buyurtmalarni ko‘rish.
4. Buyurtma statusini boshqarish.
5. Chatga javob berish.
6. Loyihalarni boshqarish.
7. Xizmatlarni boshqarish.
8. Settingsni boshqarish.

---

# BUYURTMA → CHAT OQIMI

```text
User
 ↓
Xizmat tanlaydi
 ↓
Buyurtma beradi
 ↓
orders.json
 ↓
Buyurtma yaratiladi
 ↓
Admin notification
 ↓
Buyurtmaga bog‘langan chat
 ↓
User ↔ Admin
 ↓
Status yangilanadi
 ↓
Buyurtma yakunlanadi
```

---

# APK

APK ushbu PHP API orqali ishlaydi.

```text
APK
 ↓
PHP API
 ↓
JSON
```

APK uchun alohida database yoki alohida backend yaratilmaydi.

API real JSON ma’lumotlari bilan ishlaydi.

---

# SECURITY TALABLARI

- `password_hash()`
- `password_verify()`
- secure session
- session regeneration
- authorization
- ownership check
- CSRF
- input validation
- output escaping
- IDOR himoyasi
- brute-force/rate limiting
- path traversal himoyasi
- JSON corruption himoyasi
- `LOCK_EX`
- data directory HTTP access block
- secure headers
- max request size
- audit kerak bo‘lgan amallarni qayd qilish

---

# DEVELOPMENT ORDER

## PHASE 0 — CLEAN FOUNDATION

- [x] README arxitekturasi belgilandi.
- [ ] Eski implementation kodlarini to‘liq tozalash.
- [ ] Faqat belgilangan strukturani qoldirish.
- [ ] JSON storage foundation.
- [ ] PHP umumiy foundation.
- [ ] `.htaccess` security foundation.

## PHASE 1 — AUTH

- [ ] Register
- [ ] Login
- [ ] Logout
- [ ] Session
- [ ] Profile
- [ ] Authorization
- [ ] Auth security test

## PHASE 2 — SERVICES

- [ ] `services.php`
- [ ] `api/services.php`
- [ ] `data/services.json`
- [ ] Admin service management

## PHASE 3 — ORDERS

- [ ] Order create
- [ ] Order list
- [ ] Order detail
- [ ] Order update
- [ ] Status system
- [ ] User ownership
- [ ] Admin order management

## PHASE 4 — CHAT

- [ ] Chat list
- [ ] Message list
- [ ] Message send
- [ ] Read status
- [ ] Unread count
- [ ] Polling
- [ ] User ↔ Admin conversation

## PHASE 5 — NOTIFICATIONS

- [ ] New order notification
- [ ] New message notification
- [ ] Status notification
- [ ] Read/unread

## PHASE 6 — PROJECT / PORTFOLIO

- [ ] Projects JSON
- [ ] Portfolio page
- [ ] Project detail
- [ ] Admin project management

## PHASE 7 — ADMIN

- [ ] Admin authentication
- [ ] Dashboard
- [ ] Users
- [ ] Orders
- [ ] Chat
- [ ] Projects
- [ ] Services
- [ ] Settings

## PHASE 8 — SECURITY + TESTING

- [ ] Full authorization audit
- [ ] JSON concurrency test
- [ ] API abuse test
- [ ] CSRF test
- [ ] IDOR test
- [ ] Session test
- [ ] Responsive test
- [ ] Mobile test
- [ ] Production audit

---

# CURRENT NEXT TASK

**PHASE 0 — CLEAN FOUNDATION**

1. Eski implementation kodlarini to‘liq tozalash.
2. Yuqoridagi strukturani aynan saqlash.
3. Faqat kerakli PHP/JSON/Apache foundationni yaratish.
4. Hech qanday qo‘shimcha sahifa yaratmaslik.
5. Keyin PHASE 1 — Auth boshlash.

**Keyingi agent aynan PHASE 0 dan davom etadi.**

---

# README QOIDASI

Har bir muhim milestone oxirida:

1. `CURRENT DEVELOPMENT STATUS` yangilanadi.
2. Bajarilgan ishlar yoziladi.
3. Tekshirilgan ishlar yoziladi.
4. Qolgan ishlar yoziladi.
5. `CURRENT NEXT TASK` aniq belgilanadi.
6. Keyingi agent qayerdan boshlashi yoziladi.
7. Commit qilinadi.

**Tayyor ishlayotgan kod qayta yozilmaydi. Avval audit qilinadi.**
