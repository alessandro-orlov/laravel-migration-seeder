<h1>Lista programmatori</h1>
<a href="{{ route('programmers.create') }}">Inserisci un programmatore</a>
@foreach ($programmers as $programmer)
  <ul>
    <li>
      <a href="{{ route('programmers.show', $programmer) }}"><b>{{$programmer->name}} {{$programmer->lastname}}</b> ({{$programmer->tecnology}})</a>
      <a href="{{ route('programmers.edit', $programmer) }}">Modifica</a>
      <form action="{{ route('programmers.destroy', $programmer) }}" method="post">
        @csrf
        @method('DELETE')

        <input type="submit" value="Elimina">
      </form>
    </li>
  </ul>
@endforeach
