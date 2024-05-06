@extends('board.layout.master')

@section('title')
عرض بيانات الطالب
@endsection


@section('content')
<div class="row row-deck row-cards">
  <div class="col-2">
    <div class="row row-cards">
      <div class="col-12">
        <div class="card">
          <div class="card-body p-4 py-5 text-center">
            <img src="{{ asset('board_assets/static/avatars/000m.jpg') }}" alt="">
            <h3 class="mb-0"> احمد سامى </h3>
            <p class="text-secondary"> 28 Aug 2019</p>
          </div>
          <div class=" list-group list-group-flush">
            <a href="{{ route('board.users.show') }}" class="list-group-item list-group-item-action active" aria-current="true">
              <svg class="icon icon-inline me-1" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-info-octagon"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12.802 2.165l5.575 2.389c.48 .206 .863 .589 1.07 1.07l2.388 5.574c.22 .512 .22 1.092 0 1.604l-2.389 5.575c-.206 .48 -.589 .863 -1.07 1.07l-5.574 2.388c-.512 .22 -1.092 .22 -1.604 0l-5.575 -2.389a2.036 2.036 0 0 1 -1.07 -1.07l-2.388 -5.574a2.036 2.036 0 0 1 0 -1.604l2.389 -5.575c.206 -.48 .589 -.863 1.07 -1.07l5.574 -2.388a2.036 2.036 0 0 1 1.604 0z" /><path d="M12 9h.01" /><path d="M11 12h1v4h1" /></svg>
              بيانات الطالب
            </a>

            <a href="{{ route('board.users.courses') }}" class="list-group-item list-group-item-action " aria-current="true">
              <svg  class="icon icon-inline me-1" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-book"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 19a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6a9 9 0 0 1 9 0a9 9 0 0 1 9 0" /><path d="M3 6l0 13" /><path d="M12 6l0 13" /><path d="M21 6l0 13" /></svg>
              الكورسات
            </a>

            <a href="{{ route('board.users.library') }}" class="list-group-item list-group-item-action " aria-current="true">
             <svg  class="icon icon-inline me-1"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-library"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 3m0 2.667a2.667 2.667 0 0 1 2.667 -2.667h8.666a2.667 2.667 0 0 1 2.667 2.667v8.666a2.667 2.667 0 0 1 -2.667 2.667h-8.666a2.667 2.667 0 0 1 -2.667 -2.667z" /><path d="M4.012 7.26a2.005 2.005 0 0 0 -1.012 1.737v10c0 1.1 .9 2 2 2h10c.75 0 1.158 -.385 1.5 -1" /><path d="M11 7h5" /><path d="M11 10h6" /><path d="M11 13h3" /></svg>
             المكتبه
           </a>

           <a href="{{ route('board.users.courses_requests') }}" class="list-group-item list-group-item-action " aria-current="true">
            <svg class="icon icon-inline me-1" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-arrows-sort"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 9l4 -4l4 4m-4 -4v14" /><path d="M21 15l-4 4l-4 -4m4 4v-14" /></svg>
            طلبات الاشتراك
          </a>

          <a href="{{ route('board.users.installments') }}" class="list-group-item list-group-item-action " aria-current="true">
            <svg class="icon icon-inline me-1"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-file-invoice"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M14 3v4a1 1 0 0 0 1 1h4" /><path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" /><path d="M9 7l1 0" /><path d="M9 13l6 0" /><path d="M13 17l2 0" /></svg>
            الاقساط
          </a>

          <a href="{{ route('board.users.transactions') }}" class="list-group-item list-group-item-action " aria-current="true">
            <svg class="icon icon-inline me-1"  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-coin"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" /><path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 1 0 0 4h2a2 2 0 1 1 0 4h-2a2 2 0 0 1 -1.8 -1" /><path d="M12 7v10" /></svg>
            المدفوعات
          </a>

          <a href="{{ route('board.users.notifications') }}" class="list-group-item list-group-item-action " aria-current="true">
            <svg  class="icon icon-inline me-1" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-bell-ringing-2"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M19.364 4.636a2 2 0 0 1 0 2.828a7 7 0 0 1 -1.414 7.072l-2.122 2.12a4 4 0 0 0 -.707 3.536l-11.313 -11.312a4 4 0 0 0 3.535 -.707l2.121 -2.123a7 7 0 0 1 7.072 -1.414a2 2 0 0 1 2.828 0z" /><path d="M7.343 12.414l-.707 .707a3 3 0 0 0 4.243 4.243l.707 -.707" /></svg>
            الاشعارات
          </a>

          <a href="{{ route('board.users.actions') }}" class="list-group-item list-group-item-action " aria-current="true">
            <svg class="icon icon-inline me-1" xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-medical-cross-circle"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M3 12a9 9 0 1 0 18 0a9 9 0 0 0 -18 0" /><path d="M12 8v8" /><path d="M15.5 10l-7 4" /><path d="M15.5 14l-7 -4" /></svg>
            اجراءات
          </a>

        </div>
      </div>
    </div>
  </div>
</div>
<div class="col-10">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        بيانات الطالب
      </h3>
      <div class="card-actions">
        <a href="#">
          تعديل
          <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
        </a>
      </div>
    </div>
    <div class="card-body">
      <dl class="row ">
        <dd class="col-6"> تاريخ الانضمام :</dd>
        <dd class="col-6">2020-01-05 16:42:29 </dd>
        <dd class="col-6">الاسم:</dd>
        <dd class="col-6">احمد سامى</dd>
        <dd class="col-6">البريد الاكترونى:</dd>
        <dd class="col-6">ahmed@yahoo.com</dd>
        <dd class="col-6">الرقم القومى:</dd>
        <dd class="col-6">29874154784547</dd>
        <dd class="col-6">رقم الموبيل:</dd>
        <dd class="col-6">01014340346</dd>
        <dd class="col-6">اسم السنتر:</dd>
        <dd class="col-6">ايفيرست</dd>
        <dd class="col-6">رقم ولى الامر:</dd>
        <dd class="col-6">لم يتم تحديده بعد</dd>
        <dd class="col-6">الجامعه:</dd>
        <dd class="col-6"> جامعه المنصوره </dd>
        <dd class="col-6"> الكليه </dd>
        <dd class="col-6"> صيدله </dd>
        <dd class="col-6"> القسم </dd>
        <dd class="col-6"> كلينيكال </dd>
        <dd class="col-6"> السنه الدراسيه </dd>
        <dd class="col-6"> 1 </dd>
        <dd class="col-6"> تم الاضافه بواسطه</dd>
        <dd class="col-6"> قام بالاشتراك بنفسه </dd>
        <dd class="col-6"> المنصه:</dd>
        <dd class="col-6"> اندرويد </dd>
        <dd class="col-6"> ملاحظات:</dd>
        <dd class="col-6"> لم لتم التحديد </dd>
      </dl>
    </div>
  </div>
</div>
</div>

@endsection