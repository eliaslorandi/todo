@if($type === 'link')
    <a href="{{ $href }}" class="{{ $class }}">{{ $slot }}</a>
@else
    <button type="{{ $type }}" class="{{ $class }}">{{ $slot }}</button>
@endif
