<ol class="breadcrumb p-2 bg-mute ">
  <li class="breadcrumb-item">
    <a href="{{ route('admin.dashboard') }}">Home</a>
  </li>
  @if (isset($breadcrumbs))
    @foreach ($breadcrumbs as $breadcrumb)
      @if ($breadcrumb['route'] && !$loop->last)
        <li class="breadcrumb-item">
          <a href="@if(!isset($breadcrumb['params'])){{ route($breadcrumb['route']) }}@else{{ route($breadcrumb['route'], $breadcrumb['params']) }}@endif">
            {{ $breadcrumb['title'] }}
          </a>
        </li>
      @else
        <li class="breadcrumb-item active">{{ $breadcrumb['title'] }}</li>
      @endif
    @endforeach
  @endif
</ol>
