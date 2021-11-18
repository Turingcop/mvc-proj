<table>
    <tr>
      <th colspan="2">Övre protokoll</th>
    </tr>
    @foreach ($scoreboardUpper as $key => $val)
    <tr>
        <td>{!! in_array($key, $scorekeys) || $key == "Summa" || $key == "Bonus" ? $key : $key . " &check;" !!}</td>
        <td>{{ $val }}</td>
    </tr>
@endforeach
</table>