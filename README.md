# WEBHUB.UZ — PHP + HTML + CSS + JAVASCRIPT + JSON

# CURRENT DEVELOPMENT STATUS

**Bosqich:** 0 — Toza arxitektura / rebuild boshlanishi  
**Branch:** `feature/json-api-foundation`  
**PR:** #2

## QAT’IY TEXNOLOGIK QOIDALAR

- PHP 8.x
- HTML5
- CSS3
- Vanilla JavaScript
- JSON
- Apache + `.htaccess`
- MySQL/SQL MUTLAQO YO‘Q.
- React, Vue, Angular, Node.js, TypeScript, Tailwind, Bootstrap, Laravel, Symfony, WordPress, jQuery va boshqa frameworklar MUTLAQO YO‘Q.
- User-facing barcha matnlar o‘zbek lotin tilida.
- Mock/fake data yo‘q.
- Real JSON persistence va real PHP API ishlatiladi.
- Keraksiz sahifa yoki papka yaratilmaydi.
- UI faqat yorqin premium Apple-inspired Light Mode.
- Dark mode, qora/dark background, cyberpunk/neon MUTLAQO YO‘Q.

---

# LOYIHA STRUKTURASI — O‘ZGARMAS

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
│   ├── auth.php
│   ├── profile.php
│   ├── orders.php
│   ├── order.php
│   ├── order-create.php
│   ├── order-update.php
│   ├── chat.php
│   ├── message.php
│   ├── message-send.php
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

Bu struktura asosiy arxitektura hisoblanadi va o‘zboshimchalik bilan o‘zgartirilmaydi.

---

# WEBHUB.UZ — iOS 18/19 INSPIRED GLASS DESIGN SYSTEM

WebHub.uz dizayni **iOS 18/19 uslubidagi premium Light Glass** konsepsiyasida quriladi. Maqsad — oddiy card emas, balki Apple uslubidagi shaffoflik, chuqurlik, yumshoq yorug‘lik va tabiiy interactionga ega interfeys yaratish.

## 1. ORQA FON VA DEPTH EFFECT

Hero hududida 3 ta loyqa, aylantirilgan vizual qatlam ishlatiladi:

- **Rasm 1:** markazda, katta — `360x460`, `rotate(-6deg)`, opacity `0.45`
- **Rasm 2:** yuqori o‘ngda — `180x220`, `rotate(12deg)`, opacity `0.30`
- **Rasm 3:** pastki chapda — `160x200`, `rotate(-14deg)`, opacity `0.25`
- Rasmlar blur qilinadi va turli qatlamlarda joylashtiriladi.
- Hover paytida rasmlar juda yengil harakatlanib, depth/parallax effekt beradi.
- Dekorativ rasm sahifa ishlashi uchun majburiy emas.

### CSS 3D platforma / tosh

WebHub hero konsepsiyasidagi tosh/platforma **alohida rasm sifatida majburiy emas**. Afzal yechim — HTML element + CSS:

- `border-radius`
- `linear-gradient`
- `radial-gradient`
- `box-shadow`
- `transform: perspective(...) rotateX(...) rotateZ(...)`
- ichki highlight
- ichki shadow
- yumshoq texture illusion

Bu usul responsive, yengil va assetga bog‘liqlikni kamaytiradi.

---

# 2. GLASS CARD

Asosiy card:

```css
backdrop-filter: blur(32px) saturate(180%);
-webkit-backdrop-filter: blur(32px) saturate(180%);
border-radius: 38px;
background: rgba(255,255,255,0.55);
border: 1px solid rgba(255,255,255,0.5);
```

Hover:

- background `rgba(255,255,255,0.75)` ga yaqinlashadi
- `translateY(-4px)`
- shadow kuchayadi
- glass depth oshadi
- ko‘k va binafsha glow dog‘lari kengayadi

Card ichida:

- yuqori yorug‘lik chizig‘i
- pastki yumshoq yorug‘lik chizig‘i
- 2 ta glow: ko‘k + binafsha
- glow yumshoq, neon emas

---

# 3. INVISIBLE UI

Default holatda:

- card border deyarli bilinmaydi
- tugma ramkasi bilinmaydi
- shadow juda yengil
- elementlar fonda tabiiy erishadi

Cursor hover bo‘lganda:

- glass effekt aniqroq ko‘rinadi
- nozik border paydo bo‘ladi
- blur/depth kuchayadi
- shadow kuchayadi
- micro-interaction ishlaydi

Touch qurilmalarda hoverga bog‘liq asosiy funksiya bo‘lmaydi.

---

# 4. HERO KONTENTI

### Badge

`✦ Studio`

Ko‘k accentli, yumaloq pill.

### Icon

`⚡` — taxminan `3rem`.

### Sarlavha

`WebHub.uz`

`Hub` qismi ko‘k accent rangida.

### Ost sarlavha

`Raqamli mahsulotlar studiyasi`

### Xizmatlar

4 ta iOS-style xizmat elementi:

1. Web saytlar
2. Telegram botlar
3. AI yechimlar
4. Mobil ilovalar

Har bir element:

- icon
- label
- qiymat/narx
- yumaloq container
- nozik divider
- hover interaction

### Statistika

- `50+` — Loyiha
- `30+` — Mijoz
- `100%` — Mamnuniyat

### CTA

`Loyiha boshlash →`

Ko‘k, yumaloq va hoverda yengil lift effektiga ega.

### Footer

`24/7 support · hello@webhub.uz`

---

# 5. RANGLAR — iOS LIGHT

```text
Background: #f2f2f7
Primary text: #1d1d1f
Secondary text: #6e6e73
Muted text: #8e8e93
Accent: #007aff
```

Qo‘shimcha ranglar faqat glass highlight va yumshoq ko‘k/binafsha glow uchun ishlatiladi.

Soyalar juda yengil va xira bo‘ladi.

**Dark mode ishlab chiqilmaydi.** README’dagi umumiy loyiha qoidasi bo‘yicha faqat Light Mode ishlatiladi.

---

# 6. RESPONSIVE

### 600px gacha

- padding kamayadi
- card kichrayadi
- rasmlar kichrayadi
- typography moslashadi
- hero markazlashadi

### 420px gacha

- 2- va 3-rasm yashiriladi yoki minimal darajaga tushiriladi
- card yanada ixcham bo‘ladi
- katta bo‘shliqlar kamayadi
- CTA touch-friendly bo‘ladi

### iOS Safari

Majburiy:

```css
-webkit-backdrop-filter: blur(32px) saturate(180%);
```

Safe area:

```css
env(safe-area-inset-top)
env(safe-area-inset-right)
env(safe-area-inset-bottom)
env(safe-area-inset-left)
```

---

# 7. PHP + JSON INTEGRATSIYA

Dizayn statik mock bo‘lib qolmaydi.

- `data/services.json` → xizmatlar
- `data/projects.json` → portfolio
- `data/users.json` → foydalanuvchilar
- `data/orders.json` → buyurtmalar
- `data/messages.json` → chat
- `data/notifications.json` → bildirishnomalar

PHP HTML'ni real JSON ma’lumotlari bilan render qiladi.

Vanilla JS faqat kerakli UI interaction va API communication uchun ishlatiladi.

---

# 8. BACKEND VA API

### Umumiy backend

- `config.php` — konfiguratsiya va JSON yo‘llari
- `functions.php` — JSON read/write, validation, response va utility funksiyalar
- `auth.php` — authentication, authorization, session va ownership

### API

- `api/index.php`
- `api/auth.php`
- `api/profile.php`
- `api/orders.php`
- `api/order.php`
- `api/order-create.php`
- `api/order-update.php`
- `api/chat.php`
- `api/message.php`
- `api/message-send.php`
- `api/projects.php`
- `api/services.php`
- `api/notifications.php`

APK shu PHP API orqali ishlaydi:

```text
APK
 ↓
PHP API
 ↓
JSON
```

SQL/MySQL ishlatilmaydi.

---

# 9. ADMIN

- `admin.php`
- `admin-login.php`
- `admin-dashboard.php`
- `admin-orders.php`
- `admin-chat.php`
- `admin-projects.php`
- `admin-services.php`
- `admin-users.php`
- `admin-settings.php`

Admin barcha ma’lumotlarni real JSON storage orqali boshqaradi.

---

# 10. SECURITY

- `password_hash()`
- `password_verify()`
- secure session
- session regeneration
- authorization
- ownership check
- CSRF protection
- input validation
- output escaping
- IDOR protection
- brute-force/rate limiting
- path traversal protection
- JSON corruption/concurrency protection
- `LOCK_EX`
- `data/` HTTP access block
- security headers
- request size limits

Password API response orqali hech qachon qaytarilmaydi.

---

# 11. DEVELOPMENT ORDER

## PHASE 0 — CLEAN FOUNDATION

- [x] README arxitekturasi
- [x] loyiha strukturasi
- [x] dizayn konsepsiyasi
- [ ] JSON storage foundation
- [ ] PHP umumiy foundation
- [ ] `.htaccess` security foundation
- [ ] `index.php` iOS Glass hero
- [ ] xizmatlarni JSON'dan dinamik chiqarish
- [ ] CSS 3D platforma

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
- [ ] iOS Safari test
- [ ] Production audit

---

# CURRENT NEXT TASK

**PHASE 0 — CLEAN FOUNDATION**

1. JSON storage foundationni yaratish.
2. `config.php`, `functions.php`, `auth.php` foundationni yaratish.
3. `.htaccess` orqali `data/*.json` fayllarini himoyalash.
4. `index.php` uchun iOS 18/19 Light Glass hero dizaynini real PHP/HTML/CSS/Vanilla JS bilan implement qilish.
5. Xizmatlarni `services.json` dan dinamik chiqarish.
6. CSS orqali WebHub 3D platforma/tosh effektini yaratish.
7. Real PHP serverda tekshirish.
8. Responsive va iOS Safari holatini tekshirish.
9. Keyin PHASE 1 — Auth boshlash.

**Keyingi agent aynan shu ro‘yxatdagi 1-banddan davom etadi.**

---

# README QOIDASI

Har bir muhim milestone oxirida:

1. `CURRENT DEVELOPMENT STATUS` yangilanadi.
2. Bajarilgan ishlar yoziladi.
3. Tekshirilgan ishlar yoziladi.
4. Qolgan ishlar yoziladi.
5. `CURRENT NEXT TASK` aniq belgilanadi.
6. Keyingi agent qayerdan boshlashi aniq yoziladi.
7. Commit qilinadi.

**Tayyor ishlayotgan kod qayta yozilmaydi. Avval audit qilinadi.**
