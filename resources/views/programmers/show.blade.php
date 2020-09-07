<h1>{{$programmer->name}} {{$programmer->lastname}}</h1>
<h2>Esperto in {{$programmer->tecnology}}</h2>
<p>
  Eta: {{$programmer->age}}
</p>
@if (!empty($programmer->note))
  <p>
    <b>Note:</b><br>
    {{$programmer->note}}
  </p>
@endif
<a href="{{ route('index')}}"> torna indietro </a>
