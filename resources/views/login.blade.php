<x-layout title="Login">
    <h1>Login</h1>

    @if($errors->any())
        <div class="error">
            @foreach($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit" class="btn">Entrar</button>
    </form>

    <p class="link">
        Não tem conta? <a href="{{ route('register.form') }}">Cadastre-se</a>
    </p>
</x-layout>
