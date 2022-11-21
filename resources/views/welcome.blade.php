<x-layout>
    <main role="main" class="container">

        <div class="starter-template">
            <h1>EN@me - твой словарик с нужными словами</h1>
            @auth()
            @else
            <p class="lead"><a href="/register">Регистрируйся</a> и добавляй слова, которые тебе нужны, делись своими словами с друзьями. </p>
            @endauth
        </div>
        <div class="card">
            <div class="card-header">
                Последние добавленные слова
            </div>
            <div class="card-body">
                <table class="table table-borderless ">
                    <tr>
                        <td>слово</td>
                        <td>перевод</td>
                        <td>пример использования</td>

                    </tr>
                    @foreach($translations as $translate)
                        <tr>
                            <td><a href="{{route('translate', ['id' => $translate['english']])}}">{{$translate['english']}}</a></td>
                            <td>{{$translate['russian']}}</td>
                            <td>{{$translate['example']}}</td>


                        </tr>
                    @endforeach
                </table>
            </div>
        </div>


    </main><!-- /.container -->
</x-layout>
