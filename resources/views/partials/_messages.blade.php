@if(count($errors) > 0)
   <div class="alert alert-soft-warning alert-dismissible fade show" role="alert">
		<strong>Errors</strong>
      <ul>
         @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
         @endforeach
      </ul>
      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
@endif

@if(Session::has('error'))
   <div class="alert alert-soft-warning alert-dismissible fade show" role="alert">
      {{ Session::get('error') }}
      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
@endif

@if(Session::has('warning'))
   <div class="alert alert-outline-warning d-flex align-items-center" role="alert">
      <span class="fas fa-info-circle text-warning fs-3 me-3"></span>
      <p class="mb-0 flex-1">{{ Session::get('warning') }}</p>
      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(Session::has('success'))
   <div class="alert alert-outline-success d-flex align-items-center" role="alert">
      <span class="fas fa-check-circle text-success fs-3 me-3"></span>
      <p class="mb-0 flex-1">{{ Session::get('success') }}</p>
      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
@endif
