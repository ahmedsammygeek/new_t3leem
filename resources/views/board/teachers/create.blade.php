@extends('board.layout.master')

@section('content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					إضافه
				</div>
				<h2 class="page-title">
					الدكاتره
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					<a href="{{ route('board.teachers.index') }}" class="btn btn-primary d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users-group" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M10 13a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M8 21v-1a2 2 0 0 1 2 -2h4a2 2 0 0 1 2 2v1"></path>
							<path d="M15 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M17 10h2a2 2 0 0 1 2 2v1"></path>
							<path d="M5 5a2 2 0 1 0 4 0a2 2 0 0 0 -4 0"></path>
							<path d="M3 13v-1a2 2 0 0 1 2 -2h2"></path>
						</svg>
						عرض كافه الدكاتره
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
				<form class="card" method='POST' action='{{ route('board.teachers.store') }}' enctype="multipart/form-data" >
					@csrf
					<div class="card-header bg-primary">
						<h3 class="card-title text-white"> إضافه دكتور  جديد </h3>
					</div>
					<div class="card-body">
						<div class="row row-cards">
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label required"> الاسم </label>
									<div>
										<input type="text" class="form-control @error('name') is-invalid @enderror " name='name' value="{{ old('name') }}" >
										@error('name')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label required"> رقم الموبيل </label>
									<div>
										<input type="text" class="form-control @error('mobile') is-invalid @enderror " name='mobile' value="{{ old('mobile') }}" >
										@error('mobile')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label required"> كلمه المرور </label>
									<div>
										<input type="password" class="form-control @error('password') is-invalid @enderror " name='password'>
										@error('password')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label required"> تاكيد كلمه المرور </label>
									<div>
										<input type="password" class="form-control @error('password_confirmation') is-invalid @enderror " name='password_confirmation'  >
										@error('password_confirmation')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-6">
								<div class="mb-3">
									<label class="form-label"> صوره الشخصيه </label>
									<div>
										<input type="file" class="form-control @error('image') is-invalid @enderror " name='image'  >
										@error('image')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3 row">
									<label class="form-label"> خصائص </label>
									<div class="col-md-6">
										<div>
											<label class="form-check">
												<input class="form-check-input" name='is_active' type="checkbox" checked>
												<span class="form-check-label"> السماح بدخول النظام </span>
											</label>
										</div>
									</div>
								</div>
							</div>

							<div class="col-md-12">
								<div class="mb-3">
									<label class="form-label"> ملاحظات </label>
									<div>
										<input type="text" class="form-control @error('notes') is-invalid @enderror " name='notes' value="{{ old('notes') }}"  >
										@error('notes')
										<small class="form-hint text-danger"> {{ $message }} </small>
										@enderror
									</div>
								</div>
							</div>

							<div class="col-md-12 ">
								<div class="row">
									<legend class="form-label"> الصلاحيات </legend>
									@error('permissions')
									<p class='text-danger' > {{ $message }} </p>
									@enderror
									@foreach ($permissions as $permission)
									<div class="col-md-3">
										<div class="mb-3">
											<div class="form-label text-primary "> {{ $permission->first()->group_name_label }} </div>
											<div>
												@foreach ($permission as $collection => $item )
												<label class="form-check">
													<input class="form-check-input permissions" name='permissions[]' value='{{ $item->name }}' type="checkbox">
													<span class="form-check-label"> {{ $item->label }} </span>
												</label>
												@endforeach
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							
						</div>										
					</div>
					<div class="card-footer text-end">
						<div class='d-flex' >
							<a href="{{ route('board.teachers.index') }}" class="btn btn-link"> تراجع </a>
							<button type="submit" class="btn btn-primary ms-auto">إضافه</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@push('scripts')

<script>
	$(function() {

		$('input.is_super_admin').on('click', function(event) {

			if ($(this).is(":checked")) {
				$('input.permissions').attr("checked", true);
				$('input.permissions').attr("disabled", true);
			} else {
				$('input.permissions').attr("checked" , false);
				$('input.permissions').removeAttr("disabled");
			}
		});
	});
	
</script>
@endpush