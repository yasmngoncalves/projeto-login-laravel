<x-layout title="Perfil">
    <div class="avatar">
        <!-- Ícone SVG de perfil editável -->
        <svg xmlns="http://www.w3.org/2000/svg" fill="#10b981" viewBox="0 0 24 24" width="120" height="120">
            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
        </svg>
    </div>

    <h1>Editar Perfil</h1>

    <form action="{{ route('user.update') }}" method="POST" class="flex-col">
        @csrf
        @method('PUT')

        <label for="name" class="font-bold text-left">Nome</label>
        <input type="text" name="name" id="name" value="{{ auth()->user()->name }}" placeholder="Nome">

        <label for="email" class="font-bold text-left">Email</label>
        <input type="email" name="email" id="email" value="{{ auth()->user()->email }}" placeholder="Email">

        <button type="submit" class="btn btn-green">Salvar</button>
    </form>
<br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-red mt-4">Deslogar</button>
    </form>
</x-layout>
