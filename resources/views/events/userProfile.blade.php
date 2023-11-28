@extends('layouts.main')
@section('title', 'Profile')


@section('content')

<div class="container">
    <div class="row pt-3">
        <div class="col-md-3">
            <ul class="list-unstyled">
                <li class="my-3">
                    <a class="d-flex align-items-center" href="/userProfile">Minha conta
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </a>
                </li>
                <li class="my-3">
                    <a class="d-flex align-items-center" href="/myproducts">Meus produtos
                        <ion-icon name="bag-check-outline"></ion-icon>
                    </a>
                </li>
                <li class="my-3">
                    <a class="d-flex align-items-center" href="/shoppingList">Minhas compras
                        <ion-icon name="bag-check-outline"></ion-icon>
                    </a>
                </li>
                <li class="my-3">
                    <a class="d-flex align-items-center" href="#">Meus UPS
                        <ion-icon name="chevron-up-circle-outline"></ion-icon>
                    </a>
                </li>
                
            </ul>
        </div>
        <div class="col-md-9">
            <div>
                <h1>
                    Meu Perfil
                </h1>
                <p>
                    Gerenciar e mudar sua conta
                </p>
                <div class="row py-2" style="border-top: 1px solid grey;">
                    <div class="col-md-8">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                        <form action="/update/{{ Auth::id() }}" method="POST" class="w-100" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nome do usuário</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="{{ Auth::user()->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email do usuário</label>
                                <input type="text" name="email" class="form-control" id="email" placeholder="{{ Auth::user()->email }}">
                            </div>
                            <button type="submit" class="btn btn-primary w-100 my-2 d-flex justify-content-center" style="font-size: 15px; padding-left:40px; padding-right: 44px;"><ion-icon name="create-outline" style="font-size: 20px;"></ion-icon>Atualizar perfil</button>
                        </form>
                        <form action="/delete/{{ Auth::id() }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="d-flex justify-content-center btn btn-danger my-2 px-5 w-100" style="font-size: 15px;"><ion-icon name="trash-outline" style="font-size: 20px;"></ion-icon>Deletar perfil</button>
                        </form> 
                    </div>
                    <div class="col-md-4" style="border-left: 1px solid grey;">
                        <form action="/iconUpdate/{{ Auth::id() }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            @php
                                $user = Auth::user();
                            @endphp
                                @if ($user->image!=null)
                                    <img src="/img/icon/{{ $user->image }}" class="w-100" alt="">
                                @else
                                    <ion-icon name="person-outline" class="w-100 text-primary" style="font-size: 200px;"></ion-icon>
                                @endif
                            <label class="w-100 d-flex btn-primary mt-2 file align-items-center justify-content-center" for="image">
                                Selecionar uma foto
                            </label>
                            <input type="file" id="image" name="image" required>
                            <div class="d-flex ">
                                <button type="submit" class="btn btn-primary w-100 d-flex justify-content-center">Atualizar foto</button>
                            </div>
                            <div id="file-name" class="mt-2 text-primary">Nome do arquivo: Nenhum arquivo selecionado</div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById("image");
    const fileNameDisplay = document.getElementById("file-name");

    fileInput.addEventListener("change", function () {
        if (fileInput.files.length > 0) {
            fileNameDisplay.textContent = "Nome do arquivo: " + fileInput.files[0].name;
        } else {
            fileNameDisplay.textContent = "Nome do arquivo: Nenhum arquivo selecionado";
        }
    });
});
</script>
@endsection
@section('footer')
@endsection