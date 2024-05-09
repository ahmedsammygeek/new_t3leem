<div class="row row-deck row-cards">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="mb-0 text-white">عرض كافه المشرفين</h5>
            </div>

            <div class="card-body">
                <div class="d-sm-flex align-items-sm-start">
                    <div class="form-control-feedback form-control-feedback-start flex-grow-1 mb-3 mb-sm-0">
                        <input type="text" wire:model.live.debounce.150ms='search' class="form-control" placeholder="البحث داخل المشرفين">
                        <div class="form-control-feedback-icon">
                            <i class="ph-magnifying-glass"></i>
                        </div>
                    </div>

                    <div class="dropdown ms-sm-3 mb-3 mb-sm-0">
                        <select wire:model='rows' class="form-select">
                            <option value="30">30 صف للعرض</option>
                            <option value="60">60 صف للعرض </option>
                            <option value="90">90 صف للعرض </option>
                            <option value="120">120 صف للعرض </option>
                            <option value="150">150 صف للعرض </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table text-nowrap">
                    <thead>
                        @if (count($teachers))
                        <tr>
                            <th > صوره المشرف </th>
                            <th > اسم المشرف </th>
                            <th>رقم الجوال</th>
                            <th>السماح بدخول النظام</th>
                            <th class="text-center" style="width: 20px;">خصائص</th>
                        </tr>
                        @endif
                    </thead>
                    <tbody>

                        @if (count($teachers))
                        @foreach ($teachers as $teacher)
                        <tr>
                            <td class="pe-0">
                                <a href="{{ Storage::url('teachers/'.$teacher->image) }}" data-fslightbox="gallery">
                                    <img src="{{ Storage::url('teachers/'.$teacher->image) }}" class="avatar avatar-sm">
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('board.teachers.show' , $teacher ) }}" class="d-block fw-semibold">{{ $teacher->name }}</a>
                                <span class="fs-sm text-muted">{{ $teacher->created_at->toFormattedDateString() }}</span>
                            </td>
                            <td>{{ $teacher->mobile }}</td>
                            <td>
                                @switch($teacher->is_blocked )
                                @case(0)
                                <span class="badge bg-primary"> نعم </span>
                                @break
                                @case(1)
                                <span class="badge bg-danger"> لا</span>
                                @break
                                @endswitch
                            </td>


                            <td class="text-center">
                                {{-- @can('admins.show') --}}
                                <a  href="{{ route('board.teachers.show'  , $teacher ) }}"  class="btn  btn-primary  btn-icon ">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-eye"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                </a>
                                {{-- @endcan --}}
                                {{-- @can('admins.edit') --}}
                                <a href="{{ route('board.teachers.edit'  , $teacher ) }}"  class="btn btn-warning  btn-icon">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-edit"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1" /><path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z" /><path d="M16 5l3 3" /></svg>
                                </a>                           
                                {{-- @endcan --}}

                                <a  wire:click="$dispatchTo('board.admins.change-admin-password', 'show-password-change-modal' , { admin_id : {{ $teacher->id }} } )" class="btn btn-info  btn-icon">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-key"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M16.555 3.843l3.602 3.602a2.877 2.877 0 0 1 0 4.069l-2.643 2.643a2.877 2.877 0 0 1 -4.069 0l-.301 -.301l-6.558 6.558a2 2 0 0 1 -1.239 .578l-.175 .008h-1.172a1 1 0 0 1 -.993 -.883l-.007 -.117v-1.172a2 2 0 0 1 .467 -1.284l.119 -.13l.414 -.414h2v-2h2v-2l2.144 -2.144l-.301 -.301a2.877 2.877 0 0 1 0 -4.069l2.643 -2.643a2.877 2.877 0 0 1 4.069 0z" /><path d="M15 9h.01" /></svg>

                                </a>        


                                {{-- @can('admins.delete') --}}
                                <a data-item_id='{{ $teacher->id }}' class="btn btn-danger btn-icon delete_item">
                                    <svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg>
                                </a>
                                {{-- @endcan --}}

                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td class="text-center text-danger" colspan="6"> لا يوجد بيانات  </td>
                        </tr>
                        @endif



                    </tbody>
                </table>
            </div>

            <div class="card-footer d-flex justify-content-end ">
                {{ $teachers->links() }}
            </div>
        </div>
    </div>

    @livewire('board.admins.change-admin-password')

</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('board_assets/dist/libs/fslightbox/index.js') }}" defer></script>
<script>
    $(function() {


        Livewire.on('itemDeleted', () => {
            $.toast({
                heading: 'رسال تاكيد',
                text: 'تم الحذف بنجاح',
                hideAfter: 5000 , 
                icon: 'success'  , 
                position: 'top-right',
                textAlign: 'right' , 
                allowToastClose: false , 
            })
        })




        $(document).on('click', 'a.delete_item', function(event) {
            event.preventDefault();
            var item_id = $(this).attr('data-item_id');
            Swal.fire({
                title: 'تاكيد الحذف',
                text: "هل انت متاكد من رغبتك فى حذف العنصر ؟",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'نعم',
                cancelButtonText: 'تراجع',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-success'
                }
            }).then(function(result) {
                if(result.value) {
                    Livewire.dispatch('deleteItem' , {item_id} );
                }
            });

        });

    });
</script>
@endpush
