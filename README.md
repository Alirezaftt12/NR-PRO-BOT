<div align="center">

# 🤖 NR PRO BOT

### A powerful Telegram bot for selling VPN services — with fully automated config creation.

<p>
  <a href="https://t.me/NR_server">
    <img src="https://img.shields.io/badge/Telegram-Channel-2CA5E0?style=for-the-badge&logo=telegram&logoColor=white" alt="Telegram Channel"/>
  </a>
  <a href="https://t.me/nr_supports">
    <img src="https://img.shields.io/badge/Telegram-Group-229ED9?style=for-the-badge&logo=telegram&logoColor=white" alt="Telegram Group"/>
  </a>
  <a href="https://nrprobot.com/docs/">
    <img src="https://img.shields.io/badge/Docs-nrprobot.com-38BDF8?style=for-the-badge&logo=readthedocs&logoColor=white" alt="Documentation"/>
  </a>
</p>

<p>
  <a href="https://github.com/Alirezaftt12/NR-PRO-BOT/stargazers">
    <img src="https://img.shields.io/github/stars/Alirezaftt12/NR-PRO-BOT?style=flat-square&color=f5c518" alt="Stars"/>
  </a>
  <a href="https://github.com/Alirezaftt12/NR-PRO-BOT/network/members">
    <img src="https://img.shields.io/github/forks/Alirezaftt12/NR-PRO-BOT?style=flat-square" alt="Forks"/>
  </a>
  <a href="https://github.com/Alirezaftt12/NR-PRO-BOT/issues">
    <img src="https://img.shields.io/github/issues/Alirezaftt12/NR-PRO-BOT?style=flat-square" alt="Issues"/>
  </a>
  <a href="https://github.com/Alirezaftt12/NR-PRO-BOT/blob/main/LICENSE">
    <img src="https://img.shields.io/github/license/Alirezaftt12/NR-PRO-BOT?style=flat-square" alt="License"/>
  </a>
  <img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=flat-square&logo=php&logoColor=white" alt="PHP 8.2"/>
</p>

</div>

---

## 📚 Table of Contents

- [✨ Overview](#-overview)
- [📖 Documentation](#-documentation)
- [📝 Changelog](#-changelog)
- [🧩 Supported Panels](#-supported-panels)
- [💳 Payment Gateways](#-payment-gateways)
- [⚙️ Features](#️-features)
- [🚀 Installation](#-installation)
  - [Prerequisites](#prerequisites)
  - [Direct Bash installation](#direct-bash-installation)
  - [Manual installation](#manual-installation)
  - [Update](#update)
  - [Remove](#remove)
  - [Non-Interactive (CLI) Usage](#non-interactive-cli-usage)
- [💎 Free vs. Pro](#-free-vs-pro)
- [🌍 Languages](#-languages)
- [💵 Support the Project](#-support-the-project)
- [👥 Contributors](#-contributors)
- [🗂️ Project structure](#️-project-structure)

---

## ✨ Overview

**NR PRO BOT** is a feature-rich Telegram bot for selling VPN subscriptions and automating the entire sales workflow — from purchase and payment to config creation and service management.

It connects directly to your panels, builds configurations automatically, accepts a wide range of payment methods, and gives both customers and admins a clean experience through a **Telegram Mini App** and a **web admin panel**.

> Whether you're handing out trial accounts or running a large-scale reseller business, NR PRO BOT has the tools to run it end to end.

### Official NR PRO links

| Service | Official link |
|---------|---------------|
| News channel | [t.me/NR_server](https://t.me/NR_server) |
| Support group | [t.me/nr_supports](https://t.me/nr_supports) |
| Problem reports | [Open the reports topic](https://t.me/nr_supports/6) |
| Direct support | [@Owner_nr](https://t.me/Owner_nr) |
| Donate | [Support NR PRO](https://alirezaftt12.github.io/NR-PRO-Donate/) |

### لینک‌های رسمی NR PRO

| بخش | لینک رسمی |
|-----|-----------|
| کانال اطلاع‌رسانی | [t.me/NR_server](https://t.me/NR_server) |
| گروه پشتیبانی | [t.me/nr_supports](https://t.me/nr_supports) |
| گزارش مشکلات | [تاپیک گزارش مشکلات](https://t.me/nr_supports/6) |
| پشتیبانی مستقیم | [@Owner_nr](https://t.me/Owner_nr) |
| حمایت و دونیت | [حمایت از NR PRO](https://alirezaftt12.github.io/NR-PRO-Donate/) |

---

## 📖 Documentation

The complete user manual lives at **[nrprobot.com/docs](https://nrprobot.com/docs/)** — 61 pages covering every part of the bot, written in **Persian (فارسی)**.

It is not a feature list: every menu is documented with the exact order of the steps the bot asks for, what each field accepts, the error message you get when it rejects your input, and the mistake that most often breaks that feature.

| Section | What it covers |
|---------|----------------|
| **شروع** (Getting started) | Architecture, requirements, server install, shared-host install, CLI flags, updating and removing |
| **ساختار** (Structure) | Repository layout, database tables, which file does what |
| **پنل‌ها** (Panels) | Adding each of the 13 panel types, protocol & inbound setup, per-panel menus, manual config creation, node management |
| **فروشگاه** (Shop) | Products, categories, trial accounts, On-Hold services, bulk purchase, manual sale, renewals and location changes |
| **پرداخت** (Payments) | Card-to-card with receipt approval, every online and crypto gateway, wallet and refunds |
| **مدیریت** (Administration) | Admin roles, feature switches, report channel and topics, texts, forced-join channel, web panel |
| **رشد و بازاریابی** (Growth) | Referrals, cashback, discount and gift codes, lottery and wheel, reseller system |
| **نگهداری** (Operations) | Cron jobs, backup and restore, optimization, security checklist, troubleshooting |

> The docs are generated from the bot's own source, so menu names, limits and error strings match the code rather than an older release.

## 📝 Changelog

تاریخچه‌ی نسخه‌ها، امکانات جدید، اصلاحات فنی و رفع خطاها در فایل [CHANGELOG.md](CHANGELOG.md) ثبت می‌شود. برای دیدن آخرین تغییرات، نسخه‌ی فعلی و موارد در حال توسعه به آن مراجعه کنید.

---

## 🧩 Supported Panels

NR PRO BOT integrates with the most popular VPN and network management panels:

| Panel | Panel |
|-------|-------|
| 🟢 **Marzban** | 🟢 **Marzneshin** |
| 🟢 **Sanaei / Alireza** |
| 🟢 **S-UI** | 🟢 **Hiddify** |
| 🟢 **WGDashboard** (WireGuard) | 🟢 **MikroTik** |
| 🟢 **IBSng** | 🟢 **Pasarguard** |

> Configs are generated automatically and are compatible with all common protocols.

---

## 💳 Payment Gateways

| Gateway | Type |
|---------|------|
| 💵 **Card-to-Card** | Manual (receipt + admin approval) |
| 🪙 **NowPayments** | Crypto |
| 🪙 **Plisio** | Crypto |
| 🪙 **CubePay** | TRON / crypto |
| 🇮🇷 **Zarinpal** | Online gateway |
| 🇮🇷 **Aqayepardakht** | Online gateway |
| 🇮🇷 **IranPay** | Online gateway |

---

## ⚙️ Features

### 🛒 Sales & Configuration
- ✅ VPN purchase with **fully automated** config creation
- ✅ Trial / test accounts for new users
- ✅ Compatibility with all common protocols
- ✅ QR codes for fast config import
- ✅ Protocol-based configuration settings
- ✅ Product, panel & gateway management

### 👤 User Experience
- ✅ **Telegram Mini App** for a modern, in-app interface
- ✅ View & manage purchased services:
  - Renew a service
  - Buy additional volume
  - Retrieve config / update subscription links
- ✅ Wallet & balance system
- ✅ Detailed purchase & trial reports
- ✅ Support section, FAQ & customizable tutorials
- ✅ Phone-number verification
- ✅ Mandatory channel membership for purchases

### 📈 Growth & Marketing
- ✅ Affiliate / referral system
- ✅ Cashback rewards
- ✅ Discount codes
- ✅ Gift codes
- ✅ Lottery system
- ✅ **Agent / reseller** system

### 🛠️ Administration
- ✅ **Web admin panel** (login-protected dashboard)
- ✅ Multiple admins support
- ✅ Balance & user management
- ✅ Full text/message customization from the bot
- ✅ Configurable username-generation methods
- ✅ Automatic backups
- ✅ Notification & expiry-reminder services (cron)
- ✅ On-hold configurations

## راهنمای کامل امکانات پروژه

این پروژه یک سامانه کامل فروش و مدیریت سرویس VPN بر پایه ربات تلگرام است. هر
بخش به پنل‌ها، دیتابیس، پرداخت و ربات متصل می‌شود و مدیر می‌تواند آن را از پنل
مدیریت فعال یا تنظیم کند.

### امکانات عمومی پروژه

| بخش | توضیحات کامل |
|---|---|
| فروش سرویس | ساخت محصول بر اساس حجم، مدت، لوکیشن، پروتکل و قیمت و فروش آن از طریق ربات |
| ساخت کانفیگ | ایجاد خودکار کاربر و کانفیگ روی پنل VPN پس از پرداخت موفق |
| پنل‌های VPN | اتصال به پنل‌های پشتیبانی‌شده و مدیریت چند لوکیشن از یک ربات |
| حساب کاربری | مشاهده سرویس‌ها، لینک اشتراک، QR، حجم مصرفی، تاریخ انقضا و تمدید |
| کیف پول | افزایش موجودی، پرداخت از اعتبار، گزارش تراکنش و برگشت وجه در خطاهای قابل تشخیص |
| حساب تست | ارائه سرویس آزمایشی با محدودیت زمان، حجم و تعداد استفاده قابل تنظیم |
| فروشگاه | دسته‌بندی محصول، نمایش قیمت، تخفیف، خرید تکی و فروش دستی توسط مدیر |
| پرداخت | پرداخت کارت‌به‌کارت با تأیید مدیر، درگاه آنلاین و درگاه‌های رمزارزی موجود در پروژه |
| کدهای تخفیف | ساخت کد درصدی یا مبلغی با محدودیت تعداد استفاده و تاریخ اعتبار |
| کد هدیه | ایجاد اعتبار یا سرویس هدیه برای کاربران و ثبت مصرف هر کد |
| پاداش ورود | پرداخت یک‌باره مبلغ قابل تنظیم به کاربران تازه‌وارد با امکان روشن/خاموش‌کردن |
| دعوت دوستان | لینک دعوت، محاسبه زیرمجموعه و پاداش طبق تنظیمات مدیر |
| اطلاع‌رسانی | پیام‌های خرید، تمدید، اتمام حجم، نزدیک‌شدن به انقضا و گزارش مدیریتی |
| عضویت اجباری | بررسی عضویت کاربر در کانال یا گروه قبل از استفاده از بخش‌های مشخص |
| پشتیبانی | دریافت پیام کاربر، ارسال به مدیر، پاسخ‌دهی و نگهداری سابقه گفتگو |
| چندزبانه | نگهداری متن‌ها در پوشه `lang/` و امکان تغییر متن‌های ربات بدون تغییر منطق اصلی |
| پشتیبان‌گیری | ذخیره نسخه پشتیبان از دیتابیس و داده‌های ربات برای بازیابی در زمان نیاز |
| Cron | اجرای خودکار وظایف زمان‌بندی‌شده مانند انقضا، هشدار، پرداخت و نگهداری |
| پنل مدیریت وب | مدیریت کاربران، محصولات، پنل‌ها، پرداخت‌ها، متن‌ها، مدیران و گزارش‌ها |

### امکانات بخش Pro

بخش Pro یک قابلیت تجاری و پرداختی است و برای استفاده رایگان باز نیست. این بخش
بعد از پرداخت و فعال‌شدن لایسنس روی همان نصب فعال می‌شود.

| قابلیت Pro | توضیح |
|---|---|
| پنل نمایندگی | ساخت حساب نماینده، تعیین سهمیه، موجودی، تخفیف، مدت اعتبار و وضعیت حساب |
| مدیریت مشتری نماینده | هر نماینده مشتری‌های خودش را می‌سازد و اطلاعات آن‌ها از نماینده‌های دیگر جدا است |
| کیف پول نماینده | شارژ کیف پول، رزرو مبلغ هنگام ساخت کانفیگ، ثبت دفترکل و جلوگیری از موجودی منفی |
| سهمیه نماینده | محدودیت تعداد مشتری، تعداد کانفیگ، حجم، مدت، تعداد دستگاه و امکانات قابل استفاده |
| ساخت کانفیگ نماینده | ایجاد کانفیگ از طریق همان درایورهای پنل VPN و جلوگیری از لینک یا اطلاعات ساختگی |
| تمدید و افزایش حجم | تمدید سرویس، افزایش حجم یا زمان و مدیریت وضعیت کانفیگ از پنل نماینده |
| انتقال لوکیشن | جابه‌جایی کانفیگ بین لوکیشن‌های مجاز با بررسی دسترسی، محصول مقصد و باقی‌مانده سرویس |
| گزارش نماینده | نمایش کانفیگ‌ها، مشتری‌ها، هزینه‌ها، تراکنش‌ها، لاگ عملیات و گزارش عملکرد |
| سطح دسترسی | تعیین مجوز جداگانه برای ساخت، حذف، تمدید، تغییر لوکیشن، مشتری و گزارش |
| ساخت ربات نماینده | دریافت توکن BotFather، اعتبارسنجی با Telegram API، ساخت runtime جدا و تنظیم webhook اختصاصی |
| تنظیمات ربات نماینده | تنظیم قیمت حجم و زمان، متن‌ها، محصولات، پنل‌های قابل نمایش و اطلاعات پشتیبانی |
| جداسازی داده‌ها | داده، تنظیمات، توکن و webhook هر ربات نماینده از ربات اصلی جدا نگهداری می‌شود |

### قفل و فعال‌سازی Pro

- پنل نمایندگی از منوی مدیریت و همچنین از URL مستقیم قفل می‌شود.
- API ساخت، حذف و تنظیم ربات نماینده بدون لایسنس Pro پاسخ پرداختی برمی‌گرداند.
- قفل فقط ظاهری نیست؛ کنترل در ورودی ماژول، پنل، API و تابع ساخت ربات انجام می‌شود.
- لایسنس باید بعد از پرداخت روی سرور در `config/pro.php` وارد شود.
- مقدار `license_key` را در GitHub عمومی یا داخل گزارش‌ها قرار ندهید.
- تاریخ انقضای لایسنس با `license_expires_at` قابل کنترل است.
- مبلغ، واحد پول و لینک فرآیند پرداخت در بخش `payment` همین فایل تنظیم می‌شود.

تا زمانی که مقدار معتبر `license_key` تنظیم نشده باشد، امکانات Pro عمداً قفل
می‌مانند و کاربر پیام پرداخت و فعال‌سازی دریافت می‌کند. برای پیاده‌سازی پرداخت
خودکار، باید درگاه موردنظر و قیمت نهایی محصول Pro در تنظیمات فروش شما تعیین شود؛
هسته قفل آماده است و نباید با نمایش‌دادن دکمه یا تغییر متن دور زده شود.

---

## 🚀 Installation

### Reseller Panel

The reseller module is enabled by default after the database schema is applied.
The administrator uses `/panel/resellers.php` to create reseller accounts,
configure quotas and permissions, reset passwords, and fund wallets. Resellers
sign in at `/reseller/`. The module uses the existing `ManagePanel` drivers and
the existing MySQL schema; it does not create a second user or VPN-panel system.

After installing dependencies with `composer install` (with PHP extensions
`gd` and `zip` enabled), the QR endpoint becomes available for configs that
have a real subscription link. The existing cron
dispatcher also runs `cronbot/reseller.php` to expire reseller accounts and
refund stale pending reservations.

#### فعال‌سازی و بررسی

1. ابتدا `config.php` را با مشخصات واقعی MySQL، دامنه و کلید API تکمیل کنید؛
   مقادیر نمونه‌ای مانند `{database_url}` قابل استفاده در production نیستند.
2. وابستگی‌ها را با `composer install --no-dev --optimize-autoloader` نصب کنید.
   PHP باید `pdo_mysql`، `mbstring`، `xml`، `gd` و `zip` را فعال داشته باشد.
3. یک‌بار با حساب administrator وارد `/panel/` شوید و از `/panel/resellers.php`
   نماینده بسازید. این صفحه user mirror، permission defaults و کیف پول نماینده
   را به‌صورت اتمیک ایجاد می‌کند.
4. نماینده از `/reseller/` وارد می‌شود. فقط location و productهایی را می‌بیند
   که پنل‌های فعال پروژه ارائه می‌کنند؛ ساخت کانفیگ از `ManagePanel` موجود عبور
   می‌کند و لینک ساختگی تولید نمی‌شود.
5. اجرای cron پروژه را فعال نگه دارید. `cronbot/reseller.php` حساب‌های منقضی،
   reservationهای pending مانده و retention لاگ‌ها را رسیدگی می‌کند.

نماینده‌ای که مجوز `can_change_loc` داشته باشد می‌تواند کانفیگ فعال خود را از
فهرست کانفیگ‌ها به یک پنل دیگر منتقل کند. انتقال از طریق `ManagePanel` انجام
می‌شود، مصرف باقی‌مانده و زمان انقضا را حفظ می‌کند، دسترسی location/type و
وجود product مقصد را سمت سرور بررسی می‌کند و در شکست عملیات وجه را برمی‌گرداند.
این قابلیت فقط زمانی production-ready است که هر دو پنل مبدا و مقصد و driver
واقعی آن‌ها با یک کانفیگ آزمایشی بررسی شده باشند.

### ساخت ربات اختصاصی نماینده

در مسیر ساخت ربات نماینده، درخواست‌دهنده فقط توکن BotFather را ارسال می‌کند.
توکن با `getMe` اعتبارسنجی می‌شود، runtime از `vpnbot/Default` ساخته و webhook
اختصاصی تنظیم می‌شود. شناسه Telegram همان درخواست‌دهنده به‌عنوان مدیر اولیه
در `botsaz.admin_ids` ثبت می‌شود و تنظیمات هر ربات جداگانه در `botsaz.setting`
نگهداری می‌شود. توکن در پیام موفقیت نمایش داده نمی‌شود و نباید در log قرار گیرد.

قبل از فعال‌سازی عمومی، ساخت یک نماینده‌ی آزمایشی، ورود، ساخت یک کانفیگ روی
پنل VPN واقعی، دریافت subscription/QR و سپس حذف آن را با لاگ‌های
`reseller_logs` بررسی کنید. اطلاعات production و رمزها را در repository یا
فایل‌های log قرار ندهید.

### Prerequisites

| Requirement | Details |
|-------------|---------|
| 🖥️ **OS** | A **clean** Ubuntu **22.04** or **24.04** server |
| 🌐 **Domain** | A domain name pointed to your server's IP |
| ⚙️ **Stack** | PHP 8.2, Apache, MySQL, SSL — *installed automatically by the script* |

> 💡 Start from a fresh server with no existing web server, database, or panel installed.

### Direct Bash installation

Run the following command on your server as **root**:

```bash
curl -fsSL https://raw.githubusercontent.com/Alirezaftt12/NR-PRO-BOT/main/install.sh -o install.sh && bash install.sh
```

An interactive menu will appear:

```
1) Install NR PRO BOT
2) Update NR PRO BOT
3) Remove NR PRO BOT
4) Migrate: Free → Pro (Beta)
5) Renew SSL certificate
6) Help & Parameters
7) Exit
```

➡️ Select **`1`** to install the bot, then follow the prompts.

### Manual installation

Use this method when you need full control over the server, want to review every
command, or already have Apache/MySQL/PHP installed. The manual method does not
replace the interactive installer; it prepares the same runtime directories and
services by hand.

#### 1. Prepare Ubuntu

Use Ubuntu 22.04 or 24.04 and log in as `root` (or prefix every command with
`sudo`). Point a DNS record such as `bot.example.com` to the server first.

```bash
apt update && apt upgrade -y
apt install -y apache2 mysql-server git unzip curl cron certbot \
  python3-certbot-apache php8.2 php8.2-cli php8.2-common php8.2-mysql \
  php8.2-curl php8.2-mbstring php8.2-xml php8.2-gd php8.2-zip composer
systemctl enable --now apache2 mysql cron
a2enmod rewrite headers ssl proxy proxy_http
systemctl restart apache2
```

#### 2. Download the source

```bash
cd /var/www
git clone https://github.com/Alirezaftt12/NR-PRO-BOT.git nrprobot
cd /var/www/nrprobot
composer install --no-dev --optimize-autoloader
```

Do not commit `.env`, private keys, bot tokens, database passwords, or runtime
logs. The public repository intentionally excludes `vendor`; Composer rebuilds
it on the server.

#### 3. Create the database

```bash
mysql_secure_installation
mysql -u root -p
```

```sql
CREATE DATABASE nrprobot CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'nrprobot'@'localhost' IDENTIFIED BY 'CHANGE_THIS_DATABASE_PASSWORD';
GRANT ALL PRIVILEGES ON nrprobot.* TO 'nrprobot'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Copy the project configuration template if your selected release provides one,
then edit `config.php` with the real database DSN, Telegram bot token, admin
ID, panel credentials, domain and payment gateway keys. Placeholder values such
as `{API_KEY}` or `{database_url}` are not production credentials.

```bash
nano /var/www/nrprobot/config.php
chown -R www-data:www-data /var/www/nrprobot
find /var/www/nrprobot -type d -exec chmod 755 {} \;
find /var/www/nrprobot -type f -exec chmod 644 {} \;
```

#### 4. Configure Apache and HTTPS

Create `/etc/apache2/sites-available/nrprobot.conf`:

```apache
<VirtualHost *:80>
    ServerName bot.example.com
    DocumentRoot /var/www/nrprobot

    <Directory /var/www/nrprobot>
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog ${APACHE_LOG_DIR}/nrprobot-error.log
    CustomLog ${APACHE_LOG_DIR}/nrprobot-access.log combined
</VirtualHost>
```

Enable the site and request the certificate:

```bash
a2dissite 000-default.conf
a2ensite nrprobot.conf
apache2ctl configtest
systemctl reload apache2
certbot --apache -d bot.example.com
```

Replace `bot.example.com` with the real domain. Telegram webhooks require a
public HTTPS endpoint; do not use a private IP or a self-signed certificate.

#### 5. Initialize the bot and cron jobs

Open the project panel in the browser, complete the first-run configuration,
then register the Telegram webhook using the URL shown by the panel. Keep the
scheduled jobs active for expiry checks, payment callbacks, backups and reseller
maintenance:

```bash
crontab -u www-data -e
```

Add the project’s required cron entries from `cronbot/` for your release. Test
each command manually as `www-data` before enabling it, then inspect:

```bash
tail -f /var/log/apache2/nrprobot-error.log
systemctl status apache2 mysql cron
```

#### 6. First production checklist

- Send `/start` to the bot and verify the admin menu.
- Add one real VPN panel and create one test product.
- Complete one test purchase and confirm config, subscription link and QR code.
- Test payment callback, renewal, expiry notification and backup restore.
- Restrict MySQL to localhost and open only SSH, HTTP and HTTPS in the firewall.
- Remove test users, tokens and logs before announcing the service publicly.

### Project structure

The repository keeps the application areas visible so deployment and maintenance
are easy to audit:

| مسیر | توضیح |
|------|---------|
| `app/` | سرویس‌های اصلی برنامه و منطق تجاری پروژه |
| `api/` | مسیرهای API، درخواست‌های HTTP و callbackها |
| `config.php` | تنظیمات اجرا؛ مقادیر خصوصی فقط روی سرور وارد شوند |
| `cronbot/` | وظایف زمان‌بندی‌شده برای انقضا، پرداخت، پشتیبان‌گیری و نگهداری |
| `db/` | ابزارهای اتصال به دیتابیس و کدهای مربوط به ساختار جداول |
| `install/` | فایل‌ها و ابزارهای کمکی نصب و راه‌اندازی |
| `lang/` | فایل‌های زبان فارسی، انگلیسی و سایر زبان‌ها |
| `modules/` | ماژول‌های فروشگاه، کیف پول، دعوت دوستان، گزارش‌ها و امکانات جانبی |
| `panel/` | پنل اصلی مدیریت وب و تنظیمات مدیر |
| `panels/` | درایورها و اتصال به پنل‌های مختلف VPN |
| `payment/` | اتصال‌دهنده‌های درگاه پرداخت و پردازش callbackها |
| `reseller/` | داشبورد نمایندگان و عملیات مربوط به فروشندگان |
| `storage/` | فایل‌های اجرایی، فایل‌های تولیدشده و لاگ‌های زمان اجرا |
| `sub/` | مسیرهای ساخت اشتراک و ارسال تنظیمات کانفیگ |
| `vpnbot/` | هسته اجرای ربات تلگرام و قالب ربات‌ها |
| `install.sh` | نصب‌کننده رسمی تعاملی و خط فرمان پروژه |
| `composer.json` | فهرست وابستگی‌های PHP؛ پوشه `vendor/` هنگام نصب ساخته می‌شود |

The repository does not publish runtime secrets or the generated `vendor/`
directory. This keeps the source reviewable while allowing a clean server to
reproduce the complete PHP runtime with Composer.

#### Root files

| فایل | توضیح |
|------|-------------|
| `install.sh` | نصب، به‌روزرسانی، حذف، مهاجرت، تمدید SSL و اجرای دستورات خط فرمان |
| `config.php` | تنظیمات دیتابیس، تلگرام، دامنه و درگاه‌ها؛ مقادیر نمونه فقط روی سرور جایگزین شوند |
| `index.php` | ورودی اصلی وب و راه‌اندازی اولیه برنامه |
| `admin.php` | پردازش درخواست‌های مدیریتی و عملیات محافظت‌شده پنل |
| `botapi.php` | توابع ارتباط با Telegram Bot API و پردازش پاسخ‌ها |
| `function.php` | توابع عمومی و مشترک مورد استفاده بخش‌های مختلف پروژه |
| `panels.php` | انتخاب پنل و ورود به بخش مدیریت پنل‌ها |
| `request.php` | پردازش درخواست‌های وب/API و مسیردهی callbackها |
| `table.php` | تعریف‌ها و ساختارهای مربوط به جداول دیتابیس |
| `keyboard.php` | ساخت کیبوردها و منوهای ربات تلگرام |
| `jdf.php` | توابع تاریخ و زمان شمسی/جلالی |
| `composer.json` | فهرست وابستگی‌های PHP پروژه |
| `composer.lock` | نسخه‌های قفل‌شده برای نصب دقیق و قابل تکرار |
| `.htaccess` | قوانین مسیردهی و دسترسی Apache |
| `.gitignore` | جلوگیری از انتشار فایل‌های موقت، اطلاعات محرمانه و وابستگی‌های تولیدشده |
| `LICENSE` | مجوز AGPL-3.0 پروژه |

### Update

Run the same command and select **`2`**:

```bash
curl -fsSL https://raw.githubusercontent.com/Alirezaftt12/NR-PRO-BOT/main/install.sh -o install.sh && bash install.sh
```

### Remove

Run the same command and select **`3`** to completely remove the bot and its services.

### Non-Interactive (CLI) Usage

You can also drive the installer entirely from the command line — handy for automation and scripted deployments.

**Commands**

| Command | Description |
|---------|-------------|
| `install` | Install NR PRO BOT |
| `update` | Update NR PRO BOT (choose channel / version) |
| `remove` | Remove NR PRO BOT and its services |
| `migrate` | Migrate Free → Pro |
| `renew` | Renew the bot's SSL certificate |
| `menu` | Open the interactive panel (default) |

**Install parameters**

| Parameter | Description |
|-----------|-------------|
| `--name` | Bot username |
| `--token` | Telegram bot token |
| `--admin` | Admin chat ID |
| `--domain` | Domain name (e.g. `bot.example.com`) |
| `--db-user` | Database username |
| `--db-pass` | Database password |
| `--version` | Specific release tag (e.g. `0.1.7`) |
| `--channel` | `beta` · `release` · `auto` |
| `-h`, `--help` | Show CLI help and exit |

**Examples**

```bash
# Auto-pick the best channel
nrprobot install --channel auto

# Fully non-interactive install
nrprobot install --name myvpnbot --token 123:ABC \
              --admin 111 --domain bot.example.com --version 0.1.7

# Update to a specific version or channel
nrprobot update --version 0.1.6
nrprobot update --channel release

# Remove
nrprobot remove
```

---

## 💎 Free vs. Pro

امکانات Pro رایگان نیستند. پروژه تا زمانی که یک لایسنس پرداخت‌شده در
`config/pro.php` فعال نشود، این امکانات را قفل نگه می‌دارد. پنل نمایندگی و ساخت
ربات نماینده هم فقط بعد از فعال‌شدن Pro قابل استفاده هستند؛ مخفی‌کردن دکمه‌ها
به‌تنهایی ملاک امنیت نیست و خود مسیرهای وب و API نیز بررسی می‌شوند.

بعد از پرداخت، لایسنس را فقط روی سرور در `config/pro.php` وارد کنید و آن فایل را
در GitHub عمومی قرار ندهید. مبلغ و لینک پرداخت در بخش `payment` همین فایل برای
درگاه یا فرآیند فروش شما تنظیم می‌شود.

| | Free 🆓 | Pro 💎 |
|---|:---:|:---:|
| Automated VPN sales & config creation | ✅ | ✅ |
| Trial accounts, wallet & service management | ✅ | ✅ |
| All supported panels & payment gateways | ✅ | ✅ |
| پنل نمایندگی و مدیریت مشتریان | — | ✅ پرداختی |
| ساخت و مدیریت ربات نماینده | — | ✅ پرداختی |
| Advanced customization & analytics | — | ✅ |
| Enhanced management & extra modules | — | ✅ |

📌 **Support and purchase guide:** [Contact support »](https://t.me/nr_supports)

---

## 🌍 Languages

NR PRO BOT ships with full translations for:

🇬🇧 English · 🇮🇷 Persian (فارسی) · 🇷🇺 Russian (Русский) · 🇨🇳 Chinese (中文)

---

## 💵 Support the Project

If **NR PRO BOT** helps your business, please consider supporting its development with a crypto donation:

<a href="https://alirezaftt12.github.io/NR-PRO-Donate/">
  <img src="https://img.shields.io/badge/Donate-NR%20PRO-1A1A2E?style=for-the-badge&logo=bitcoin&logoColor=white" alt="Donate to NR PRO"/>
</a>

Your support keeps the updates and improvements coming. Thank you! 🙌

---

## 👥 Contributors

Thanks to everyone who has contributed to making NR PRO BOT better:

<a href="https://github.com/Alirezaftt12/NR-PRO-BOT/graphs/contributors">
  <img src="https://contrib.rocks/image?repo=Alirezaftt12/NR-PRO-BOT" alt="Contributors"/>
</a>

---

<div align="center">

**Made with ❤️ by the NR PRO BOT community**

📖 [Documentation](https://nrprobot.com/docs/) · 💬 [Channel](https://t.me/NR_server) · 👥 [Support](https://t.me/nr_supports) · ⭐ [Star on GitHub](https://github.com/Alirezaftt12/NR-PRO-BOT)

</div>
