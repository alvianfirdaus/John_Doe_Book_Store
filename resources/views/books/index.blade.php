<!-- Navigasi -->
<p>
  <a href="{{ route('authors.top') }}">Top 10 most famous</a> |
  <a href="{{ route('ratings.create') }}">Input Rating</a>
</p>

<!-- Form Filter -->
<form method="get">
  <table border="0" cellpadding="4">
    <tr>
      <td>List shown :</td>
      <td>
        <select name="limit" onchange="this.form.submit()">
          @for($i=10;$i<=100;$i+=10)
            <option value="{{ $i }}" {{ $limit==$i?'selected':'' }}>{{ $i }}</option>
          @endfor
        </select>
      </td>
    </tr>
    <tr>
      <td>Search :</td>
      <td>
        <input type="text" name="q" value="{{ $q }}">
      </td>
    </tr>
    <tr>
      <td></td>
      <td>
        <button type="submit">SUBMIT</button>
      </td>
    </tr>
  </table>
</form>

<!-- Tabel -->
<table border="1" cellpadding="6">
  <tr>
    <th>No</th>
    <th>Book Name</th>
    <th>Category Name</th>
    <th>Author Name</th>
    <th>Average Rating</th>
    <th>Voter</th>
  </tr>
  @foreach($books as $i=>$b)
  <tr>
    <td>{{ $i+1 }}</td>
    <td>{{ $b->title }}</td>
    <td>{{ $b->category->name ?? '-' }}</td>
    <td>{{ $b->author->name ?? '-' }}</td>
    <td>{{ number_format($b->avg_rating,2) }}</td>
    <td>{{ $b->voters }}</td>
  </tr>
  @endforeach
</table>
