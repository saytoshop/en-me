<x-layout>
    <div class="container">
        {{$english}} - {{$translates['russian']}}
        <div>
            {{$translates['example']}}
        </div>
    </div>
    <a href="{{route('edit_translation', ['id'=>$translates['id']])}}">Edit translation</a>

</x-layout>
