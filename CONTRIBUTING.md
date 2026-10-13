# راهنمای مشارکت

از پیشنهادها و Pull Requestهای تمیز و قابل بررسی استقبال می‌کنیم.

1. هدف تغییر را در Issue یا توضیحات PR روشن کنید.
2. تغییر را کوچک و تک‌هدفه نگه دارید.
3. هیچ توکن، رمز، کلید API، license key یا فایل runtime را commit نکنید.
4. برای تغییر دیتابیس migration سازگار با نصب‌های قبلی اضافه کنید.
5. متن‌های قابل نمایش را در فایل‌های `lang/` قرار دهید.

## بررسی محلی

```bash
composer validate --strict
composer install --no-interaction --prefer-dist
find . -path './vendor' -prune -o -name '*.php' -type f -print0 | xargs -0 -n1 php -l
```

تغییرات Pro باید قفل سمت سرور، API و مسیر مستقیم را حفظ کنند و نباید با تغییر
متن یا مخفی‌کردن دکمه دور زده شوند.
