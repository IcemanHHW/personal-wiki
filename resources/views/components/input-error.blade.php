@props(['messages'])

@if ($messages)
    <ul class="text-sm text-red-600 space-y-1 mt-2">
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
