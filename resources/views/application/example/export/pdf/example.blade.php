<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Contenido</th>
            <th>Estado</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td>{{ $post->id }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->content }}</td>
                <td>
                    @if ($post->status == 'published')
                        Publicado
                    @elseif ($post->status == 'draft')
                        Borrador
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
