<h1>Dúvida {{ $support->id }}</h1>

<x-alert/>

<form action="{{ route('supports.update', $support->id) }}" method="POST">
    @method('PUT')
    @include('Admin.supports.partials.form', [
        'support' => $support
    ])
</form>