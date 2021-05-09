<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="https://pngimg.com/uploads/rubber_duck/rubber_duck_PNG33.png" class="logo" alt="Milesy Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
