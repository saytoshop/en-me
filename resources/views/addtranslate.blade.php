<x-layout>
    <h1 class="text-center">
        Add translate
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
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <form method="POST" action="addtranslate">
            @csrf
            <div class="form-group">
                <label for="english">English</label>
                <input type="text" class="form-control" id="english" placeholder="" name="english"
                       value="{{old('english')}}">
                @error('english')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="russian">Russian</label>
                <input type="text" class="form-control" id="russian" placeholder="" name="russian"
                       value="{{old('russian')}}">
                @error('russian')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <div class="form-group">
                <label for="exampleFormControlTextarea1">Example</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="example"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
    </div>
</x-layout>
