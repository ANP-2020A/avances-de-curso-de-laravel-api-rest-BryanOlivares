@component('mail::message')
    # New comment
    Tu artículo ha recibido un nuevo comentario.
    @component('mail::button', ['url' => $url])
        Ver commentario
    @endcomponent

    @component('mail::panel')
        This is the panel content.
    @endcomponent

    @component('mail::table')
        | Laravel      | Table         | Example  |
        | -------------|:-------------:| --------:|
        | Col 2 is     | Centered      | $10      |
        | Col 3 is     | Right-Aligned | $20      |
    @endcomponent
    Gracias,<br>
    {{ config('app.name') }}
@endcomponent
