<div>
  <div class="modal modal-blur fade" id="change-password-modal" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self>
    <form wire:submit="save">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title  text-white "> تعديل كلمه المرور  </h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label"> كلمه المرور الخاص بك (لتاكيد الهويه) </label>
              <input type="password" class="form-control @error('current_password') is-invalid @enderror" wire:model.live.debounce.150ms="current_password"  placeholder="كلمه المرو الحاليه الخاصه بك">
              @error('current_password')
              <small class="form-hint text-danger"> {{ $message }} </small>
              @enderror
            </div>

            <hr>
            <div class="mb-3">
              <label class="form-label"> كلمه المرور الجديده للمشرف </label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" wire:model.live.debounce.150ms="password"  placeholder="كلمه المرور الجديده">
              @error('password')
              <small class="form-hint text-danger"> {{ $message }} </small>
              @enderror
            </div>

            <div class="mb-3">
              <label class="form-label"> تاكيد المرور الجديده للمشرف </label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" wire:model.live.debounce.150ms="password_confirmation"  placeholder="تاكيد المرور الجديده">
              @error('password_confirmation')
              <small class="form-hint text-danger"> {{ $message }} </small>
              @enderror
            </div>
          </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
              تراجع
            </a>
            <button type='submit' class="btn btn-primary ms-auto" >
              تاكيد
            </button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>


@push('scripts')
<script>
  $(function() {

    Livewire.on('openModal' ,  () => {
      $('#change-password-modal').modal('show');
    });


    Livewire.on('passwordChanged' ,  () => {
      $('#change-password-modal').modal('hide');
      $.toast({
        heading: 'رسال تاكيد',
        text: 'تم تغير كلمه المرور بنجاح',
        hideAfter: 5000 , 
        icon: 'success'  , 
        position: 'top-right',
        textAlign: 'right' , 
        allowToastClose: false , 
      })
    });


    
  });
        // alert('hh');
</script>
@endpush