@extends('board.layout.master')

@section('title')
الرئيسيه
@endsection


@section('content')
<div class="row row-deck row-cards">
  <div class="col-12">
    <div class="card">
      <div class="card-header bg-primary ">
        <h3 class="card-title text-white"> عرض كافه الطلاب </h3>
      </div>
      <div class="card-body border-bottom py-3">
        <div class="d-flex">
          <div class="text-muted">
            عرض
            <div class="mx-2 d-inline-block">
              {{-- <input type="text" class="form-control form-control-sm" value="8" size="3" aria-label="Invoices count"> --}}
              <select class="form-control form-select" name="" id="">
                <option value=""> 15 </option>
                <option value=""> 30 </option>
                <option value=""> 50 </option>
                <option value=""> 100 </option>
              </select>
            </div>
            طالب
          </div>
          <div class="ms-auto text-muted">
            Search:
            <div class="ms-2 d-inline-block">
              <input type="text" class="form-control form-control-sm" aria-label="Search invoice">
            </div>
          </div>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table card-table table-vcenter text-nowrap datatable">
          <thead>
            <tr>
              <th class="w-1"><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select all invoices"></th>

              <th> الطالب </th>
              <th> رقم الموبيل </th>
              <th> الجامعه </th>
              <th>الكليه</th>
              <th> عدد الكورسات </th>
              <th> مسجل دخول حاليا ؟ </th>
              <th> هل تم الحظر ؟ </th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @for ($i = 0; $i < 19 ; $i++)
              <tr>
              <td><input class="form-check-input m-0 align-middle" type="checkbox" aria-label="Select invoice"></td>
              <td>
                <div class="d-flex py-1 align-items-center">
                  <span class="avatar me-2" style="background-image: url({{ asset('board_assets/static/avatars/006m.jpg') }})"></span>
                  <div class="flex-fill">
                    <div class="font-weight-medium"> احمد سامى </div>
                    <div class="text-secondary"><a href="#" class="text-reset">lmiona@livejournal.com</a></div>
                  </div>
                </div>
              </td>
              <td><a href="invoice.html" class="text-reset" tabindex="-1"> 01014340346 </a></td>
              <td>
                جامعه المنصوره
              </td>
              <td>
                صيدله
              </td>
              <td>
                5 كورسات
              </td>
              <td>
                <span class="badge bg-success me-1"></span> نعم
              </td>
              <td>
                <span class="badge bg-success me-1"></span> لا
              </td>
              
              <td class="text-end">
                <a href="{{ route('board.users.show') }}" class="btn btn-primary w-100">
                  عرض
                </a>
              </td>
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
      <div class="card-footer d-flex align-items-center">
        <p class="m-0 text-muted">Showing <span>1</span> to <span>8</span> of <span>16</span> entries</p>
        <ul class="pagination m-0 ms-auto">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
              <!-- Download SVG icon from http://tabler-icons.io/i/chevron-left -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M15 6l-6 6l6 6" /></svg>
              prev
            </a>
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item active"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item"><a class="page-link" href="#">4</a></li>
          <li class="page-item"><a class="page-link" href="#">5</a></li>
          <li class="page-item">
            <a class="page-link" href="#">
              next <!-- Download SVG icon from http://tabler-icons.io/i/chevron-right -->
              <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M9 6l6 6l-6 6" /></svg>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</div>
@endsection