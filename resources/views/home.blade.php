<x-layout title="Home">
    <div class="avatar">
        <!-- Ícone SVG de boas-vindas -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="#6c63ff" viewBox="0 0 24 24" width="120" height="120">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
        </svg>
    </div>

    <h1>Bem-vindo!</h1>

    <div class="flex-col">
        <a href="{{ route('login.form') }}" class="btn">Login</a>
        <a href="{{ route('register.form') }}" class="btn btn-green">Cadastro</a>
    </div>
</x-layout>
