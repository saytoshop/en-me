<x-layout>
    <div class="container">
        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Edit user data</p>
        <div class="card" style="width: 320px; margin: auto">
            <div class="card-body">
                <x-status/>

                <form class="mw-50" action="/update_user" method="POST">
                    @csrf
                    @method('patch')
                    <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example1c">Your Name</label>
                        <input type="text" id="form3Example1c" class="form-control" name="name"
                               value="{{old('name', auth()->user()->name)}}"/>
                        @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example3c">Your Email</label>
                        <p>{{auth()->user()->email}}</p>

                    </div>
                    <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example4c">New password</label>
                        <input type="password" id="form3Example4c" class="form-control" name="password"
                               value="{{old('password')}}"/>
                        @error('password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline flex-fill mb-2">
                        <label class="form-label" for="form3Example4cd">Repeat new password</label>
                        <input type="password" id="form3Example4cd" class="form-control" name="password_repeat"
                               value="{{old('password_repeat')}}"/>
                        @error('password_repeat')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline flex-fill mb-4">
                        <label class="form-label" for="form3Example4c">Current password (fill in, if you want to set new password above)</label>
                        <input type="password" id="form3Example4c" class="form-control" name="current_password"
                               value="{{old('current_password')}}"/>
                        @error('current_password')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center mx-4 mb-1 mb-lg-4">
                        <button type="submit" class="btn btn-primary btn-lg">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>
