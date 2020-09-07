<h1>Modifica dati</h1>

@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('programmers.update', $programmer) }}" method="post">
    @csrf
    @method('PUT')

    <div>
      <label>Nome:</label><br>
      <input type="text" name="name" value="{{ old('name') ? old('name') : $programmer->name }}">
    </div>
    <br>
    <div>
      <label>Cognome:</label><br>
      <input type="text" name="lastname" value="{{ old('lastname') ? old('lastname') : $programmer->lastname }}">
    </div>
    <br>
    <div>
      <label>Età:</label><br>
      <input type="text" name="age" value="{{ old('age') ? old('age') : $programmer->age }}">
    </div>
    <br>
    <div>
      <label>Tecnologia</label><br>
      <input type="text" name="tecnology" value="{{ old('tecnology') ? old('tecnology') : $programmer->tecnology }}">
    </div>
    <br>
    <div>
      <label>Note</label><br>
      <textarea name="note" rows="8" cols="100">{{ old('note') ? old('note') : $programmer->note }}</textarea>
    </div>
    <br>
    <input type="submit" value="Salva le modifiche">
  </form>
  <br>
  <a href="{{ route('programmers.index')}}"> torna alla lista </a>
