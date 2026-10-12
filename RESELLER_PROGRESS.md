# Reseller Panel progress

آخرین به‌روزرسانی: 2026-10-12

## وضعیت واقعی

این پروژه PHP 8.2 بدون فریم‌ورک است و از PDO/MySQL، `Schema` برای ساخت جدول‌ها و `ManagePanel`/`PanelRegistry` برای اتصال به پنل‌های VPN استفاده می‌کند. ماژول نمایندگی در `modules/Reseller` اکنون لایه‌ی اجرایی قابل تست، مسیرهای نماینده و اتصال ادمین را دارد؛ اتصال به محیط production و پنل VPN واقعی هنوز تأیید نشده است.

### ادامه‌ی 2026-10-12 — تغییر واقعی لوکیشن

- **تکمیل شد:** permission `can_change_loc` اکنون به route واقعی `configs.change_location` وصل است. مسیر، مالکیت کانفیگ، location/type مجاز، active بودن پنل مقصد و وجود product مقصد را سمت سرور بررسی می‌کند.
- **تکمیل شد:** انتقال از طریق facade واقعی `ManagePanel` انجام می‌شود؛ traffic باقی‌مانده و expiry از پنل مبدا خوانده می‌شود، کانفیگ در مقصد ساخته و سپس مبدا حذف می‌شود. در شکست، cleanup مقصد و refund کیف پول انجام می‌شود و mirror/audit فقط بعد از موفقیت به‌روزرسانی می‌شوند.
- **فایل‌های تغییرکرده:** `modules/Reseller/Services/ProvisioningService.php`، `modules/Reseller/Services/ConfigManagementService.php`، `modules/Reseller/Services/AuditService.php`، `modules/Reseller/Controllers/ConfigsController.php`، `modules/Reseller/Routes/web.php`، `modules/Reseller/Views/configs/index.php`.
- **تست:** lint کامل 222 فایل PHP بدون خطا؛ تست مستقیم fake برای موفقیت انتقال و شکست حذف مبدا/cleanup مقصد نیز موفق شد. این تست یک bug واقعی در تشخیص `['status' => false]` پیدا کرد که در `ProvisioningService` اصلاح شد.
- **تست:** end-to-end سرویس `ConfigManagementService::changeLocation` با MariaDB 10.4 موقت و ManagePanel fake موفق شد: مسیر موفق debit، update mirror و audit را تأیید کرد؛ مسیر شکست حذف مبدا refund، حفظ mirror قبلی و `config_failed` audit را تأیید کرد.
- **محیط تست:** سرور MariaDB موقت و listener متوقف و فایل harness از workspace حذف شد. پوشه دیتای موقت خارج از workspace به‌دلیل ACL فایل‌های MariaDB قابل حذف کامل نبود، اما process/listener فعال باقی نمانده است.
- **بهبود route/form:** فهرست پنل‌ها در `ConfigsController` اکنون با همان `allowed_locations` و `allowed_types` سمت سرور فیلتر می‌شود؛ محدودیت service همچنان مستقل باقی مانده است.
- **قدم بعدی دقیق:** اجرای HTTP smoke جدید برای route انتقال با DB تستی و CSRF/permission واقعی، سپس بازبینی نهایی migration، تنظیمات production و مستندات.
- **سخت‌سازی تکمیلی:** اگر بعد از موفقیت پنل، نوشتن `reseller_configs` یا mirror شکست بخورد، مسیر اکنون rollback دیتابیس، تلاش برای انتقال پنل به مبدا، refund و audit شکست را انجام می‌دهد؛ نتیجه‌ی rollback در log ثبت می‌شود.

### ادامه‌ی 2026-10-12 — ساخت ربات با فقط توکن

- **پیاده‌سازی شد:** جریان موجود ساخت ربات نماینده در `admin.php` دیگر `admin_id` جداگانه نمی‌پرسد؛ `from_id` درخواست‌دهنده/پرداخت‌کننده به‌عنوان مدیر اولیه در `botsaz.admin_ids` ثبت می‌شود.
- **پیاده‌سازی شد:** `provisionAgentBot()` در `function.php` از runtime واقعی `vpnbot/Default`، جدول موجود `botsaz` و webhook موجود استفاده می‌کند؛ تنظیمات هر ربات در `botsaz.setting` جدا ذخیره می‌شود.
- **امنیت:** token با `getMe` و regex اعتبارسنجی می‌شود، در پیام موفقیت دوباره نمایش داده نمی‌شود، در log خطا وارد نمی‌شود و در شکست provisioning، runtime و webhook پاک‌سازی می‌شوند.
- **فایل‌های تغییرکرده:** `function.php`، `admin.php`، `lang/fa.php`، `lang/en.php`، `lang/ru.php`، `lang/zh.php`، `README.md`.
- **تست فعلی:** lint هدفمند همه‌ی فایل‌های تغییرکرده موفق است؛ تست واقعی Telegram webhook به token و domain production نیاز دارد.

این قابلیت به مسیر موجود ربات نماینده مربوط است و به‌صورت مستقل از قابلیت‌های اصلی Reseller ثبت شد؛ payment gateway فعلی پروژه هنوز gate اختصاصی ساخت bot ندارد، بنابراین مالک اولیه از `from_id` درخواست‌دهنده‌ی مجاز گرفته می‌شود و ادعای تأیید پرداخت جدیدی اضافه نشده است.

## مرحله‌ها

| مرحله | وضعیت | شواهد |
|---|---|---|
| 1. بررسی پروژه و تعیین وضعیت | تکمیل بررسی، مستندسازی ادامه دارد | ساختار پروژه، سرویس‌های موجود و موتور `ManagePanel` بررسی شد؛ این فایل ایجاد شد. |
| 2. دیتابیس و migrationها | پایه پیاده شده و smoke-tested | شش جدول، ستون‌های mirror و migration شماره 014 موجود است؛ ساخت schema تازه با MariaDB موقت تست شد و ستون‌های `user.reseller_id`/`invoice.reseller_id` نیز برای fresh install اصلاح شدند. |
| 3. احراز هویت و مجوز نمایندگی | پیاده‌سازی و تست ایزوله‌شده | `AuthService`، `PermissionService`، session fingerprint، session hardening و CSRF middleware؛ login موفق و رد CSRF در HTTP تست شد. |
| 4. مدیریت نمایندگان در ادمین | پیاده‌سازی و تست HTTP ایزوله | `panel/resellers.php` به پنل ادمین واقعی متصل شد؛ ساخت، ویرایش، status، reset password، permission و top-up را انجام می‌دهد. ورود administrator، نمایش صفحه و ساخت نماینده با mirror user/permission در HTTP تست شدند. |
| 5. پنل نماینده و داشبورد | پیاده‌سازی و تست HTTP ایزوله | login/dashboard، CRUD مشتری، ساخت کانفیگ، فهرست، حذف، تمدید، extra volume/time و toggle اضافه شده‌اند؛ login و dashboard در HTTP تست شدند. |
| 6. اتصال واقعی ساخت کانفیگ | lifecycle پایه و تغییر لوکیشن transaction-tested | `ConfigPurchaseService` و `ConfigManagementService` به `ManagePanel` وصل‌اند؛ success, mirror, debit, refund, delete/renew/extra/toggle، owner-scope و change-location با MariaDB/ManagePanel fake تست شده‌اند. پنل VPN واقعی هنوز لازم است. |
| 7. سهمیه و محدودیت‌ها | پیاده‌سازی سمت‌سرور، نیازمند تست نهایی | `QuotaService`، rate limit و guard مشترک ساخت/renew/extra در endpointهای عملیاتی استفاده می‌شوند. |
| 8. تست یکپارچگی و امنیت | ناقص اما شواهد runtime قوی دارد | PHP lint، migration smoke، Composer autoload، QR generation، wallet ledger، login rejection/success، owner-scope، create success/refund/renew و change-location debit/refund/mirror/audit روی MariaDB موقت تست شدند؛ پنل واقعی و HTTP route جدید هنوز تست نشده است. |
| 9. مستندات نصب و تنظیمات | پایه تکمیل شده | راهنمای مسیرهای ادمین/نماینده، composer و cron به README اضافه شد؛ راهنمای migration smoke باقی است. |

## قابلیت‌های موجود که نباید بی‌دلیل بازنویسی شوند

- repositoryها و modelهای `modules/Reseller`
- سرویس‌های `AuthService`, `PermissionService`, `QuotaService`, `WalletService`, `AuditService`, `MirrorService`, `ProvisioningService`
- جدول‌ها و indexهای reseller در `db/tables` و `db/indexes.php`
- موتور واقعی ساخت کانفیگ در `ManagePanel` و driverهای `panels/`

## تغییرات این نوبت

- ایجاد front controller در `reseller/index.php`
- ایجاد middlewareهای authentication و CSRF
- ایجاد controllerهای login، dashboard، customers و configs
- ایجاد routeهای web و viewهای اولیه
- ایجاد این فایل وضعیت
- ایجاد `panel/resellers.php` روی همان احراز هویت و layout پنل ادمین
- اتصال واقعی فرم ساخت کانفیگ به `ManagePanel` از طریق `ConfigPurchaseService`
- تکمیل lifecycle عملیات حذف، تمدید، افزایش حجم/زمان، تغییر وضعیت و QR endpoint
- افزودن `cronbot/reseller.php` و ثبت آن در dispatcher برای expiry، stale pending refund و log retention
- افزودن راهنمای فعال‌سازی به `README.md`
- اصلاح fresh-install schema برای `reseller_id` در `user` و `invoice`
- اصلاح return value repositoryهای scoped تا update خارج از مالکیت موفق گزارش نشود
- اعمال CSRF روی تمام POSTهای ماژول، شامل login عمومی
- اصلاح fresh-install ستون `product.status_product`
- اصلاح `AuditService` برای actor تهی در مسیرهای بدون session
- اعمال سقف‌های عملیاتی به renewal و extra volume/time از طریق `QuotaService::assertCanExtend`
- سخت‌سازی تنظیمات نشست در bootstrap: `session.use_strict_mode`، فقط کوکی و `HttpOnly`
- اصلاح امضای `reseller_require_csrf` برای پذیرش ورودی تهی و تبدیل خطای TypeError به پاسخ واقعی 403
- اصلاح bypass سهمیه‌ی تمدید: `QuotaService::assertCanExtend` اکنون مدت/حجم فعلی کانفیگ را همراه با مقدار افزوده‌شده در کنترل سقف لحاظ می‌کند.

## تست‌های اجراشده

- بررسی استاتیک وجود فایل‌های کلاس‌های استفاده‌شده: موفق
- بررسی مسیرهای route/view/autoloader: موفق
- بررسی استاتیک resolve شدن class referenceهای ماژول پس از افزودن workflow: موفق
- `php -l` روی همه‌ی 222 فایل PHP: موفق، 0 خطای syntax
- `php -l` هدفمند روی controller/service/route/view ادمین و نماینده: موفق
- migration smoke روی MariaDB 10.4 موقت با 35 جدول: موفق؛ `product.status_product`، `user.reseller_id`، `invoice.reseller_id`، `resellers` و `reseller_configs` در fresh schema تأیید شدند.
- Composer install با PHP 8.2 و extensionهای GD/ZIP فعال‌شده برای CLI: موفق؛ QR autoload و تولید PNG واقعی: موفق.
- wallet credit/debit و ledger: موفق؛ موجودی نهایی 97,500 و 2 ledger row تأیید شد.
- auth: رمز اشتباه رد و رمز صحیح پذیرفته شد؛ session reseller ساخته شد.
- owner scope: خواندن و update cross-reseller رد شد.
- regression مربوط به `rowCount()` در updateهای scoped: موفق؛ update مالک دیگر `false` گزارش می‌شود.
- `ConfigPurchaseService` با ManagePanel harness: success به active + invoice/sub-link، failure به failed + refund؛ موفق.
- `ConfigManagementService::renew` با ManagePanel harness: debit و به‌روزرسانی volume/days/invoice؛ موفق.
- اجرای ManagePanel با پنل VPN واقعی و تست HTTP پنل: انجام نشده و نیازمند credentials/environment واقعی است.
- lint کامل پس از سخت‌سازی نشست: 222 فایل PHP، صفر خطای syntax.
- افزودن گزارش واقعی ادمین در panel/resellers.php: موجودی live از user.Balance، آمار کانفیگ، حجم، فروش فعال و فهرست کانفیگ‌های نماینده از دیتابیس خوانده می‌شود.
- تکمیل راهنمای فعال‌سازی production در README: config واقعی، Composer/extensions، مسیرهای ادمین/نماینده، cron و چک‌لیست تست قبل از انتشار.
- ثبت رویدادهای حساس پنل ادمین پس از commit: ساخت نماینده، ویرایش سهمیه/دسترسی، تغییر status و reset رمز؛ top-up پیش‌تر از مسیر WalletService ثبت می‌شد.
- اصلاح مجوز حذف مشتری: endpoint اکنون مانند create به \`can_manage_users\` نیاز دارد و حذف خارج از مالکیت/شناسه ناموجود audit موفق تولید نمی‌کند.
- تکمیل فرم ادمین برای تنظیم \`allowed_types\` در کنار locationهای مجاز؛ مقدار از همان PermissionService موجود ذخیره و decode می‌شود.
- اتمیک‌سازی recovery reservationهای stale: تغییر pending به failed، refund کیف پول و audit اکنون در یک تراکنش انجام می‌شود؛ claim شرطی از refund دوباره در رقابت cron/تکمیل جلوگیری می‌کند.
- تکمیل ویرایش username نماینده در پنل ادمین با بررسی uniqueness سمت‌سرور و ثبت وضعیت تغییر در audit؛ ادمین اکنون username را هم می‌تواند تغییر دهد و رمز را reset کند.
- بهبود مدیریت خطای پنل نماینده: خطاهای دامنه به پیام ترجمه‌شده و امن تبدیل می‌شوند، عملیات delete/extra/toggle به‌جای 500 کنترل‌شده redirect می‌شوند و flashهای success/error در layout نمایش داده می‌شوند.
- اعمال واقعی permission \`can_view_reports\` در dashboard: quota، موجودی و کانفیگ‌های خود نماینده مستقل باقی می‌مانند، اما ledger و گزارش عملکرد/location فقط با این مجوز query و نمایش داده می‌شوند.
- محدودکردن subscription link و QR به کانفیگ‌های \`active\`: کانفیگ حذف‌شده/ناموفق دیگر از UI لینک نمی‌دهد و endpoint QR نیز 404 می‌دهد.
- افزودن گزارش read-only رویدادهای اخیر نماینده در جزئیات پنل ادمین؛ گزارش با \`reseller_id\` همان نماینده scope شده و secret/details حساس نمایش نمی‌دهد.
- اصلاح ترتیب audit top-up: ثبت رویداد کیف پول بعد از commit transaction انجام می‌شود تا شکست commit لاگ فایل موفقیت کاذب نسازد.
- اتصال permission `can_change_loc` به عملیات واقعی انتقال کانفیگ؛ route جدید owner-scoped است و destination/type/product را سمت سرور کنترل می‌کند.
- انتقال لوکیشن از `ManagePanel` موجود استفاده می‌کند، مصرف باقی‌مانده/expiry را حفظ می‌کند، در شکست مقصد را best-effort پاک و مبلغ را refund می‌کند، سپس mirror و audit را ثبت می‌کند.
- lint هدفمند و کامل پس از این تغییر: 222 فایل PHP، صفر خطای syntax.
- تکمیل installer preflight برای Reseller Panel: وجود پوشه module، ورودی \`reseller/index.php\`، bootstrap، config و \`composer.lock\` اکنون validate می‌شود.
- جلوگیری از truncation خاموش bcrypt: \`AuthService\` اکنون رمزهای بیش از سقف hard-limit برابر ۷۲ بایت را رد می‌کند؛ مقدار config هیچ‌وقت نمی‌تواند این سقف را دور بزند.
- افزودن idle timeout سمت‌سرور برای نشست نماینده: \`last_seen\` در هر request فعال به‌روزرسانی و پس از \`security.session_idle_minutes\` نشست invalidate می‌شود.
- اجرای bootstrap مستقل برای تست runtime به placeholderهای `{database_url}` در `config.php` برخورد کرد؛ بنابراین تست HTTP واقعی در محیط فعلی قابل ادعا نیست.
- `composer.json`/`composer.lock` و Composer autoload بررسی شدند؛ 9 بسته lock شده و کلاس QR در vendor قابل بارگذاری است.
- لاگ تست محلی حذف شد و `modules/Reseller/Logs/*.log` به `.gitignore` اضافه شد تا لاگ runtime وارد سورس نشود.
- تست HTTP ایزوله با PHP built-in server و MariaDB موقت: صفحه login با CSRF، login موفق با redirect، dashboard محافظت‌شده و رد POST بدون CSRF با HTTP 403 تأیید شد؛ دیتابیس و سرور تست پس از آن متوقف و پاک‌سازی شدند.
- تست HTTP ایزوله پنل ادمین با PHP built-in server و MariaDB موقت: login administrator، نمایش `panel/resellers.php`، ساخت نماینده با رمز bcrypt، ساخت `user` mirror، ساخت permission defaults و رد POST بدون CSRF با HTTP 403 تأیید شد؛ محیط تست متوقف و پاک‌سازی شد.
- تست منطقی quota با PDO SQLite: تمدید از 80 به 100 روز با سقف 90 رد شد و تمدید از 80 به 85 روز پذیرفته شد.
- تست summaryByReseller با PDO SQLite: شمارش active/pending/failed، حجم committed و فروش active برای چند نماینده درست محاسبه شد.
- lint هدفمند پس از گزارش‌گیری ادمین: repository و صفحه ادمین بدون خطای syntax.
- lint هدفمند پس از audit ادمین: AuditService و صفحه ادمین بدون خطای syntax؛ actionهای admin در کد به رویدادهای audit متصل‌اند.
- تست AuditService با PDO SQLite: رویداد reset رمز ادمین با actor، target و action صحیح در جدول audit ثبت شد.
- lint هدفمند UsersController: بدون خطای syntax؛ بررسی استاتیک نشان داد guard حذف و audit فقط پس از delete واقعی اجرا می‌شوند.
- lint هدفمند صفحه ادمین پس از افزودن allowed_types: موفق.
- تست repository recovery با PDO SQLite: اولین claim موفق و claim تکراری false شد؛ وضعیت نهایی فقط یک‌بار failed شد.
- تست uniqueness repository با PDO SQLite: username خود نماینده مجاز، username نماینده‌ی دیگر رد و username جدید پذیرفته شد.
- lint هدفمند bootstrap، controllerهای نماینده و layout پس از اصلاح مدیریت خطا: موفق.
- lint هدفمند dashboard controller/view پس از اعمال \`can_view_reports\`: موفق.
- lint هدفمند ConfigsController و view کانفیگ پس از محدودکردن QR/link: موفق.
- lint هدفمند صفحه ادمین پس از افزودن گزارش audit: موفق.
- lint هدفمند WalletService و صفحه ادمین پس از اصلاح ترتیب top-up audit: موفق.
- تست installer checks: کلیدهای directory/file مربوط به Reseller و composer lock شناسایی شدند؛ lint \`install/checks.php\` موفق.
- تست رمز: رمز معتبر پذیرفته و رمز ۷۳ بایتی رد شد؛ lint AuthService و config موفق.
- lint کامل پس از hardening رمز: 222 فایل PHP، صفر خطای syntax.
- lint هدفمند AuthService و config پس از idle timeout: موفق.
- smoke مستقیم `ProvisioningService::changeLocation`: موفقیت و source-delete failure cleanup؛ اصلاح تشخیص پاسخ boolean false.
- end-to-end `ConfigManagementService::changeLocation` با MariaDB موقت: debit/mirror/audit در موفقیت و refund/mirror preservation/audit در شکست؛ موفق.
- lint کامل پس از سخت‌سازی rollback انتقال لوکیشن: 222 فایل PHP، صفر خطای syntax.
- lint هدفمند پس از فیلتر policy پنل‌ها در controller/view: موفق.
- بازبرندسازی لینک‌ها و ارجاع‌های عمومی: لینک‌های README، installer، صفحه ورود، زبان‌ها و endpoint نرخ به `NR PRO`/`nrprobot` تبدیل شدند؛ ارجاع‌های legacy مربوط به مهاجرت (`NRPRObotconfig`، دیتابیس قدیمی، `NRPRO_agent`) عمداً حفظ شدند تا نصب‌های قبلی خراب نشوند.
- نشان بصری پنل ورود و layout از `M` به `N` تغییر کرد تا با برند `NR PRO` یکدست باشد.
- cleanup فایل‌های runtime در `table.php` از نام‌های قدیمی پنل پاک شد؛ فایل فعال همچنان `panels/Api/nr_agent.php` و driver فعال `panels/Drivers/NrAgent.php` است.
- لینک‌های واقعی مالک پروژه اعمال شدند: کانال `@NR_server`، گروه پشتیبانی `@nr_supports`، گزارش مشکلات `@nr_supports/6`، پشتیبان `@Owner_nr` و دونیت `alirezaftt12.github.io/NR-PRO-Donate`. installer امکان override با `NRPRO_CHANNEL_URL` و `NRPRO_SUPPORT_URL` دارد.
- README اکنون بخش رسمی لینک‌ها را به دو زبان فارسی و انگلیسی دارد و لینک کانال، پشتیبانی، گزارش مشکلات، تماس مستقیم و دونیت را نمایش می‌دهد.
- audit محلی نهایی: lint همه‌ی 222 فایل PHP موفق شد؛ `composer.json` و `composer.lock` معتبرند؛ اسکن placeholder/secret فقط تنظیمات نمونه‌ی مورد انتظار (`config.php` و قالب BotFather) را نشان داد.

## مشکلات بازمانده و قدم بعدی دقیق

1. تست HTTP پنل ادمین و reseller با دیتابیس production؛ credentials و domain معتبر لازم است. تست ایزوله‌ی هر دو مسیر انجام شده است.
2. تست driver واقعی VPN و رفتار subscription link/QR روی هر نوع panel فعال.
3. فعال‌سازی GD/ZIP در PHP production و اجرای `composer install` بدون `--ignore-platform-reqs`.
4. پس از قرار دادن تنظیمات واقعی دیتابیس/پنل، اجرای تست HTTP با PHP built-in server و تست end-to-end روی ManagePanel واقعی.
5. اجرای HTTP smoke برای route `configs.change_location` با CSRF و permission واقعی، سپس تست انتقال روی دو panel واقعی؛ این مورد به محیط/credential پروژه نیاز دارد.
6. تأیید مالکیت و فعال‌بودن مقصدهای عمومی برند جدید (`nrprobot.com` و کانال‌های `nrprobot`)؛ این لینک‌ها در سورس جایگزین شده‌اند اما بررسی DNS/Telegram به محیط بیرونی نیاز دارد.
7. انتشار GitHub انجام نشده: پوشه‌ی فعلی Git repository/remote ندارد و `gh` با حساب `Alirezaftt12` توکن معتبر ندارد؛ بعد از احراز هویت و مشخص‌شدن repository مقصد، commit/push و بررسی نهایی انجام شود.
