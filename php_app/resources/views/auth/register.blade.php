@extends('layouts.app')
@section('title', 'إنشاء حساب')

@php $auth_page = true; @endphp

@section('content')
<div class="auth-page">
  <div class="auth-split">
    <div class="auth-left">
      <div class="logo-circle">🏠</div>
      <h2>أنشئ حسابًا جديدًا</h2>
      <p>سجّل الآن لتبدأ بإنشاء وإدارة عقودك وعقاراتك بسهولة.</p>
      <div style="margin-top:14px">
        <a href="{{ route('login') }}" class="btn btn-ghost" style="color:var(--neutral-white);border-color:rgba(255,255,255,0.15)">لديك حساب؟ سجل دخول</a>
      </div>
      <svg class="hero-illustration" viewBox="0 0 120 80" xmlns="http://www.w3.org/2000/svg">
        <rect x="10" y="30" width="30" height="40" rx="3" fill="#FFFFFF"/>
        <rect x="45" y="20" width="25" height="50" rx="3" fill="#FFFFFF"/>
        <rect x="75" y="10" width="30" height="60" rx="3" fill="#FFFFFF"/>
      </svg>
    </div>

    <div class="auth-right">
      <div class="auth-card">
        <h3 style="margin:0 0 8px 0;color:var(--primary-blue)">إنشاء حساب</h3>
        
        @if ($errors->any())
          <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
              <p>{{ $error }}</p>
            @endforeach
          </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
          @csrf
          <div class="form-row">
            <label for="name">الاسم الكامل</label>
            <input id="name" name="name" type="text" placeholder="الاسم" required value="{{ old('name') }}">
          </div>
          <div class="form-row">
            <label for="email">البريد الإلكتروني</label>
            <input id="email" name="email" type="email" placeholder="email@example.com" required value="{{ old('email') }}">
          </div>
          <div class="form-row">
            <label for="password">كلمة المرور</label>
            <input id="password" name="password" type="password" placeholder="********" required>
          </div>
          <div class="form-row">
            <label for="password_confirmation">تأكيد كلمة المرور</label>
            <input id="password_confirmation" name="password_confirmation" type="password" placeholder="********" required>
          </div>
          <div class="form-row">
            <label for="invite_code">رمز الدعوة (إن وُجد)</label>
            <input id="invite_code" name="invite_code" type="text" placeholder="رمز خاص بالتسجيل كمدير (اختياري)">
          </div>
          <div style="margin-top:18px;display:flex;gap:12px;justify-content:flex-end">
            <button type="submit" class="btn btn-cta">تسجيل</button>
            <a href="{{ route('login') }}" class="btn btn-ghost">إلغاء</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection