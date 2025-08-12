<p>
<h2 align="center">Top 10 Most Famous Author</h2>

<table border="1" align="center">
    <tr>
        <th>No</th>
        <th>Author Name</th>
        <th>Voter</th>
    </tr>
    @foreach ($authors as $index => $author)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $author->name }}</td>
            <td>{{ number_format($author->voters) }}</td>
        </tr>
    @endforeach
</table>
