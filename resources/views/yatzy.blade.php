@include('header')

@php

$message = $message ?? null;
$checkbox = $checkbox ?? null;
$action = $action ?? null;
$playlabel = $playlabel ?? null;
$name = $name ?? null;
$present = $present ?? null;
$scoreboardUpper = $scoreboardUpper ?? null;
$scoreboardLower = $scoreboardLower ?? null;
$scorekeys = $scorekeys ?? null;
$round = $round ?? null;
$rolls = $rolls ?? null;
$disabled = $disabled ?? null;
$playername = $playername ?? null;
$arr = $arr ?? null;

@endphp

<div class="yatzy">
<div class="width40 flex-end">
    <h1>Yatzy</h1>
    <form method="POST" action={{ $action }} class="dicecheck fullwidth">
    @csrf
        <div class="dice">
            {!! $present !!}
            {!! $checkbox !!}
        </div>
        <div class="space"></div>
        <input type="text" name="playername" placeholder="Ange namn" maxlength=10 required {{ $disabled }} value='{{ $playername }}'>
        <br>
        <input type="submit" value='{{ $playlabel }}'>
        <br> 

        @if ($rolls == 3)
            <select name="scoreindex" required>
                    <option value="">Välj poängplats</option>
                @foreach ($scorekeys as $key)
                    <option value='{{ $key}}'>{{$key}}</option>
                @endforeach
            </select>
        @endif
        <p>{{ $flash ?? null }}</p>
    </form>
</div>

<div class="width80 flex-start">
@include('upperscore')
@include('lowerscore')
</div>

</div>

@include('footer')