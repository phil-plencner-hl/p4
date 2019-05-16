<div class='book cf'>
    <a href='/events/{{ $event->id }}'><h3>{{ $event->name }}</h3></a>
    <ul>
        <li>Category: {{ $event->type->type }}</li>
        <li>Date: {{ $event->month }}/{{ $event->day }}/{{ $event->year }}</li>
        <li>Added {{ $event->created_at->format('m/d/Y g:ia') }}</li>
    </ul>
</div>