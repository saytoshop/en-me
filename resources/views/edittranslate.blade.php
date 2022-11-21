<x-layout>
    <h1 class="text-center">
        Edit translation
    </h1>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="/updatetranslate">
            @csrf
            <input type="hidden" name="id" value="{{$translation['id']}}">
            <div class="form-group">
                <label for="english">English</label>
                <input type="text" class="form-control" id="english" placeholder="" name="english"
                       value="{{old('english', $translation['english'])}}">
                @error('english')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="russian">Russian</label>
                <input type="text" class="form-control" id="russian" placeholder="" name="russian"
                       value="{{old('russian', $translation['russian'])}}">
                @error('russian')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"
                          name="example">{{old('example', $translation['example'])}}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
</x-layout>
