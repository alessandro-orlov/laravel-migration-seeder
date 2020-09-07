<h1>Inserisci un programmatore</h1>

{{-- Validazione degli errori (campi richiesti non compilati) --}}
@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="{{ route('programmers.store')}}" method="post">
  @csrf
  @method('POST')

  <div>
    <label>Nome:</label><br>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Inserisci il nome">
  </div>
  <br>
  <div>
    <label>Cognome:</label><br>
    <input type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Inserisci il Cognome">
  </div>
  <br>
  <div>
    <label>Età:</label><br>
    <input type="text" name="age" value="{{ old('age') }}" placeholder="Inserisci l'eta">
  </div>
  <br>
  <div>
    <label>Tecnologia</label><br>
    <input type="text" name="tecnology" value="{{ old('tecnology') }}" placeholder="Tecnologia">
  </div>
  <br>
  <div>
    <label>Note</label><br>
    <textarea name="note" rows="8" cols="100">{{ old('note') }}</textarea>
  </div>
  <br>
  <input type="submit"value="Salva">
</form>
<br>
<a href="{{ route('programmers.index')}}"> torna indietro </a>
