<table>
    <tr>
      <th colspan="2">Nedre protokoll</th>
    </tr>
    @foreach ($scoreboardLower as $key => $val)
        <tr>
            <td>{!! in_array($key, $scorekeys) || $key == "Summa" ? $key : $key . " &check;" !!}</td>
            <td>{{ $val }}</td>
        </tr>
    @endforeach
</table>