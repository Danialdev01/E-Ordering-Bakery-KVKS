<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('custom.login') }}">
            @csrf

            <div class="form-group mb-3">
                <div class="pb-3">
                    <label for="user_id">{{ __('Pilih Nama') }}</label>
                </div>
                <select name="user_id" id="user_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 @error('user_id') is-invalid @enderror" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>

                @error('user_id')
                    {{ $message }}
                @enderror
            </div>

            <div class="form-group mb-6 pt-4">
                <div class="pb-3">
                    <label for="secret_number">{{ __('Masukkan Kod') }}</label>
                </div>
                <input id="secret_number" type="number" 
                        class="form-control @error('secret_number') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="" pattern="^\d{5}(-\d{4})?$" 
                        name="secret_number" required 
                        onkeypress="return isNumberKey(event)"
                        placeholder="Enter your secret number">
                @error('secret_number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group mb-0">
                <button type="submit" class="bg-primary-600 hover:bg-primary-700 text-white font-medium py-3 px-6 rounded-lg text-center transition duration-300 w-full">
                    {{ __('Login') }}
                </button>
            </div>
        </form>

    </div>
</div>

<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>