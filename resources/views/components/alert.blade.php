<div  {{ $attributes->class(['alert-dismissible fade show'=>$dismissable])->merge(['class'=> 'alert alert-'.$validtype,
        "role"=> $attributes->prepends('alert')
        ]) }} >
    {{ $message }}
    @if ($dismissable)
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        
    @endif
  </div>