@extends('board.layout.master')

@section('content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					عرض تفاصيل
				</div>
				<h2 class="page-title">
					المشرفين
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">

					<a href="{{ route('board.admins.index') }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
							<path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
							<path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
						</svg>
						عرض كافه المشرفين
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		<div class="row row-deck row-cards">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<table class="table table-responsive table-bordered">
							<tbody>
								<tr>
									<th> تاريخ الاضافه </th>
									<td> {{ $admin->created_at }} <span class="text-muted"> {{ $admin->created_at->diffForHumans() }} </span> </td>
								</tr>
								<tr>
									<th> وقت اخر تسجيل دخول </th>
									<td> {{ $admin->last_logged_in }} <span class="text-muted"> {{ $admin->last_logged_in->diffForHumans() }} </span> </td>
								</tr>
								<tr>
									<th> تم الاضافه بواسطه </th>
									<td> {{ $admin->addedBy?->name }}  </td>
								</tr>
								<tr>
									<th> الاسم </th>
									<td> {{ $admin->name }}  </td>
								</tr>
								<tr>
									<th> البريد الاكترونى </th>
									<td> {{ $admin->email }} </td>
								</tr>

								<tr>
									<th> رقم الموبيل </th>
									<td> {{ $admin->mobile }} </td>
								</tr>

								<tr>
									<th> الملاحظات </th>
									<td> {{ $admin->notes }} </td>
								</tr>



								<tr>
									<th> الصوره الشخصيه </th>
									<td> 
										<ul>
											@foreach ( $admin->permissions()->pluck('label')->toArray() as $label)
											<li> {{ $label }} </li>
											@endforeach
										</ul>
									</td>
								</tr>

								<tr>
									<th> الصوره الشخصيه </th>
									<td>
										<a href="{{ Storage::url('admins/'.$admin->image) }}" data-fslightbox="gallery">
											<img src="{{ Storage::url('admins/'.$admin->image) }}" class="avatar avatar-sm">
										</a>
									</td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection



@push('scripts')
<script src="{{ asset('board_assets/dist/libs/fslightbox/index.js') }}" defer></script>
@endpush