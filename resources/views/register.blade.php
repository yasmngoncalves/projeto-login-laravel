<x-layout title="Cadastro">
    <h1>Cadastro</h1>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}" required>
        <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
        <input type="password" name="password" placeholder="Senha" required>
        <input type="password" name="password_confirmation" placeholder="Confirme a senha" required>
        <button type="submit" class="btn btn-green">Cadastrar</button>
    </form>

    <p class="link">
        Já tem conta? <a href="{{ route('login.form') }}">Faça login</a>
    </p>
</x-layout>
