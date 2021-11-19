@include('header')

<div class="center">
    </table>
    <table class="scoretable">
        <tr>
            <th>Placering</th>
            <th>Poäng</th>
            <th>Namn</th>
            <th>Tidpunkt</th>
        </tr>
    @for ($i = 0; $i < count($score); $i++)
        <tr>
        <td>{{ $i + 1 }}</td>
        <td>{{ $score[$i]->score }}</td>
        <td>{{ $score[$i]->name ?? 'Okänd' }}</td>
        <td>{{ $score[$i]->created_at }}</td>
        </tr>
    @endfor
    
    </table>
</div>

@include('footer')