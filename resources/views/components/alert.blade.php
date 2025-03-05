<div  {{ $attributes->class(['alert-dismissible fade show'=>$dismissable])->merge(['class'=> 'alert alert-'.$validtype,
        "role"=> $attributes->prepends('alert')
        ]) }} >
        @isset($title)
        <h4 {{ $title->attributes->class(['alert-heading']) }} >{{ $title }}</h4>
        <hr>
        @endisset
        @if ($slot->isEmpty())
          <p>For Empty Slog</p>
        @else
        {{ $slot }}
        @endif
      @if ($dismissable)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      @endif
  </div>