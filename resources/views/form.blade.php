    <!-- Menampilkan Pesan Error -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Input -->
    <form action="/submit" method="POST">
        @csrf
        <div>
            <label>Nama:</label>
            <input type="text" name="name" value="{{ old('name') }}">
        </div>
        
        <div>
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email') }}">
        </div>

        <div>
            <label>panggilan(opsional):</label>
            <input type="text" name="panggilan" value="{{ old('panggilan') }}">
        </div>

        <div>
        <label>Warna Kesukaan (Boleh pilih lebih dari satu):</label><br>
        <input type="checkbox" name="warna[]" value="merah" 
            {{ (is_array(old('warna')) && in_array('merah', old('warna'))) ? 'checked' : '' }}> 
        Merah <br>

        <input type="checkbox" name="warna[]" value="jinga" 
            {{ (is_array(old('warna')) && in_array('jinga', old('warna'))) ? 'checked' : '' }}> 
        Jinga <br>

        <input type="checkbox" name="warna[]" value="Kuning" 
            {{ (is_array(old('warna')) && in_array('Kuning', old('warna'))) ? 'checked' : '' }}> 
        Kuning <br>

        <input type="checkbox" name="warna[]" value="hijau" 
            {{ (is_array(old('warna')) && in_array('hijau', old('warna'))) ? 'checked' : '' }}> 
        Hijau <br>

        <input type="checkbox" name="warna[]" value="biru" 
            {{ (is_array(old('warna')) && in_array('biru', old('warna'))) ? 'checked' : '' }}> 
        Biru <br>

        <input type="checkbox" name="warna[]" value="nila" 
            {{ (is_array(old('warna')) && in_array('Nila', old('warna'))) ? 'checked' : '' }}> 
        Nila <br>

        <input type="checkbox" name="warna[]" value="ungu" 
            {{ (is_array(old('warna')) && in_array('unngu', old('warna'))) ? 'checked' : '' }}> 
        Ungu <br>

        </div>
        
        <div>
            <label>Password:</label>
            <input type="password" name="password">
        </div>
        
        <div>
            <label>Konfirmasi Password:</label>
            <input type="password" name="password_confirmation">
        </div>

        
        
        <button type="submit">Kirim</button>
    </form>