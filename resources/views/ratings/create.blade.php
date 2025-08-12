<h2>Insert Rating</h2>

<form method="get" action="{{ route('ratings.create') }}">
  <table border="0" align="left">
    <tr>
      <td>Book Author:</td>
      <td>
        <select name="author_id" onchange="this.form.submit()">
          <option value="">-- choose --</option>
          @foreach($authors as $id=>$name)
            <option value="{{ $id }}" {{ $authorId==$id?'selected':'' }}>{{ $name }}</option>
          @endforeach
        </select>
      </td>
    </tr>
  </table>
</form>
<br>
<br>
<br>

<form method="post" action="{{ route('ratings.store') }}">
  @csrf
  <input type="hidden" name="author_id" value="{{ $authorId }}">
  <table border="0" align="left">
    <tr>
      <td>Book Name:</td>
      <td>
        <select name="book_id">
          @foreach($books as $id=>$title)
            <option value="{{ $id }}">{{ $title }}</option>
          @endforeach
        </select>
      </td>
    </tr>
    <tr>
      <td>Rating:</td>
      <td>
        <select name="score">
          @for($i=1;$i<=10;$i++)
            <option>{{ $i }}</option>
          @endfor
        </select>
      </td>
    </tr>
    <tr>
      <td></td>
      <td><button type="submit">SUBMIT</button></td>
    </tr>
  </table>
</form>
