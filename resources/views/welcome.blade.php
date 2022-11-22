<x-layout>
    <main role="main" class="container">

        <div class="starter-template">
            <h1>EN@me - твой словарик с нужными словами</h1>
            @auth()
            @else
                <p class="lead"><a href="/register">Регистрируйся</a> и добавляй слова, которые тебе нужны, делись
                    своими словами с друзьями. </p>
            @endauth
        </div>
        <div class="card">
            <div class="card-header">
                Последние добавленные слова
            </div>
            <div class="card-body">

                @foreach($translations as $translate)
                    <div class="row mb-4">

                            <a class="col-xl-2 col-md-3 col-sm-6 mb-2" href="{{route('translate', ['id' => $translate['english']])}}">{{$translate['english']}}</a>
                            <span class="col-xl-2 col-md-3 col-sm-6 mb-2">{{$translate['russian']}}
                            </span>

                        <div class="col-xl-8 col-md-6 col-sm-12">
                            {{$translate['example']}}
                        </div>
                    </div>

                @endforeach
            </div>
        </div>


    </main><!-- /.container -->
</x-layout>
