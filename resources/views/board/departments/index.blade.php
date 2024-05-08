@extends('board.layout.master')

@section('content')
<div class="page-header d-print-none">
	<div class="container-xl">
		<div class="row g-2 align-items-center">
			<div class="col">
				<!-- Page pre-title -->
				<div class="page-pretitle">
					عرض
				</div>
				<h2 class="page-title">
					الجامعات
				</h2>
			</div>
			<!-- Page title actions -->
			<div class="col-auto ms-auto d-print-none">
				<div class="btn-list">
					@can('departments.create')
					<a href="{{ route('board.departments.create') }}" class="btn btn-primary  d-none d-sm-inline-block" >
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M12 5l0 14"></path>
							<path d="M5 12l14 0"></path>
						</svg>
						إضافه جامعه جديده
					</a>
					@endcan
					<a  class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true">
						<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments-alt" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
							<path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
							<path d="M4 8h4v4h-4z"></path>
							<path d="M6 4l0 4"></path>
							<path d="M6 12l0 8"></path>
							<path d="M10 14h4v4h-4z"></path>
							<path d="M12 4l0 10"></path>
							<path d="M12 18l0 2"></path>
							<path d="M16 5h4v4h-4z"></path>
							<path d="M18 4l0 1"></path>
							<path d="M18 9l0 11"></path>
						</svg>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Page body -->
<div class="page-body">
	<div class="container-xl">
		
		@livewire('board.departments.list-all-departments')
		
	</div>
</div>
@endsection