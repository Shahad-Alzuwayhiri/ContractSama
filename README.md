# 🚀 ContractSama - Laravel PHP Project# ContractSama



## 📋 نظرة عامةمنصة عقود مع:

- تسجيل/دخول

تم تحويل المشروع بالكامل إلى Laravel PHP مع:- إنشاء عقد من قالب ثابت + معاينة + PDF

- ✅ إزالة جميع ملفات Python- رقم عقد متسلسل من القاعدة (B123-1447-0001…)

- ✅ نظام PDF متكامل بـ PHP- توقيع العميل (لوحة رسم أو رفع صورة)

- ✅ دعم كامل للعربية وRTL  - بحث في العقود

- ✅ بنية Laravel منظمة- نسيت كلمة المرور (إيميل)

- ✅ fallback إلى HTML عند عدم توفر TCPDF- نسخ احتياطي/استعادة (JSON + صور توقيع)

- Bootstrap RTL

## 🛠️ المتطلبات

## المتطلبات

- PHP 8.1 أو أحدث- Python 3.11+

- Composer- pip

- SQLite أو MySQL- (اختياري) PostgreSQL عند النشر



## ⚡ التثبيت السريع## تشغيل محلي

```bash

### 1. تثبيت المكتباتpython -m venv venv

```bashvenv\Scripts\activate  # ويندوز

cd php_apppip install -r requirements.txt

composer install

```# إنشاء ملف .env بناءً على .env.example

# ضع الخط DejaVuSans.ttf و logo.png في مجلد static كما بالهيكلة

### 2. إعداد البيئة

```bashpython app.py

# ستحتاج إلى توليد APP_KEY
php artisan key:generate

# إنشاء قاعدة البيانات
touch database/database.sqlite

# تشغيل الهجرة
php artisan migrate
```

### 3. تشغيل المشروع
```bash
php artisan serve
```

## 🎯 اختبار توليد PDF

### الطريقة 1: مع TCPDF (الأمثل)
```
http://localhost:8000/test-pdf/123
```
- سيولد PDF بالعربية مع TCPDF
- دعم كامل للـ RTL
- تنسيق احترافي

### الطريقة 2: HTML Fallback  
إذا لم تعمل TCPDF:
```
http://localhost:8000/test-pdf/123
```
- سيولد HTML منسق بالعربية
- قابل للطباعة
- نفس المحتوى

## 📁 هيكل المشروع الجديد

```
php_app/
├── app/
│   ├── Http/Controllers/
│   │   └── ContractController.php    # معالج العقود والPDF
│   ├── Models/
│   │   ├── User.php                  # نموذج المستخدم
│   │   └── Contract.php              # نموذج العقد
│   └── Services/
│       └── PdfService.php            # خدمة توليد PDF
├── database/
│   └── migrations/                   # هجرة قاعدة البيانات
├── public/
│   ├── index.php                     # نقطة الدخول
│   └── static/                       # الأصول المنقولة
├── resources/views/                  # القوالب
├── routes/web.php                    # المسارات
└── composer.json                     # التبعيات
```

## 🔧 الميزات المنجزة

### ✅ نظام PDF متكامل
- **PdfService**: خدمة موحدة لتوليد PDF
- **TCPDF Integration**: دعم كامل للعربية
- **HTML Fallback**: يعمل في أي بيئة
- **RTL Support**: اتجاه النص من اليمين لليسار

### ✅ إدارة العقود
- **ContractController**: معالج شامل للعقود
- **Sample Data**: بيانات تجريبية للاختبار
- **PDF Generation**: توليد PDF مباشر
- **Error Handling**: معالجة محسنة للأخطاء

### ✅ قاعدة البيانات
- **User Model**: نموذج المستخدمين مع المصادقة
- **Contract Model**: نموذج العقود بجميع الحقول
- **Migrations**: هجرة منظمة لقاعدة البيانات
- **SQLite Support**: قاعدة بيانات محلية بسيطة

## 📊 البيانات التجريبية

يستخدم النظام البيانات التالية للاختبار:
```php
'contract_number' => 'CT-0123',
'partner_name' => 'أحمد محمد العلي',
'partner_id' => '1234567890', 
'investment_amount' => 100000,
'profit_percent' => 15,
// ... إلخ
```

## 🎨 التخصيص

### إضافة خطوط عربية جديدة:
1. ضع ملف الخط في `public/static/fonts/`
2. عدل `PdfService::setArabicFont()`

### تخصيص تصميم PDF:
عدل الطرق التالية في `PdfService`:
- `generateContent()` - المحتوى الرئيسي
- `buildContractText()` - نص العقد
- `generateHtmlContract()` - النسخة HTML

## 🚀 النشر

### للنشر على خادم:
```bash
# تحسين الأداء
php artisan config:cache
php artisan route:cache
php artisan view:cache

# رفع الملفات مع استثناء:
# - .env (أنشئ جديد)
# - storage/logs/*
# - database/database.sqlite (نسخة محلية)
```

## 🛠️ استكشاف الأخطاء

### إذا لم يعمل TCPDF:
```bash
composer require tecnickcom/tcpdf
```

### إذا واجهت مشاكل بالخطوط:
- تأكد من وجود الخطوط في `public/static/fonts/`
- تحقق من صلاحيات القراءة للملفات

### إذا لم تعمل قاعدة البيانات:
```bash
# تأكد من وجود الملف
touch database/database.sqlite

# أعد تشغيل الهجرة
php artisan migrate:fresh
```

## 📈 الخطوات التالية

1. **تخصيص التصميم**: تحسين شكل PDF
2. **إضافة المصادقة**: Laravel Breeze/Jetstream
3. **واجهة إدارة**: لوحة تحكم كاملة
4. **تحسين الأداء**: caching وoptimization
5. **اختبارات**: unit tests وintegration tests

## 🎉 النتيجة النهائية

✅ **مشروع PHP خالص** - لا توجد تبعيات Python  
✅ **نظام PDF قوي** - دعم كامل للعربية  
✅ **بنية Laravel منظمة** - سهولة التطوير والصيانة  
✅ **جاهز للإنتاج** - يعمل على أي خادم PHP  

**المشروع جاهز للاستخدام والتطوير! 🚀**