<x-app-layout>

    <div style="padding:20px">

        <h1>Category</h1>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf

            <input type="text" name="category_name" placeholder="Category Name">

            <input type="text" name="description" placeholder="Description">

            <button type="submit">Tambah</button>
        </form>

        <hr>

        <table border="1" cellpadding="10">

            <tr>
                <th>No</th>
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
            </tr>

            @foreach($categories as $category)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $category->category_name }}</td>
                <td>{{ $category->description }}</td>
                <td>

                    <form action="{{ route('categories.destroy', $category->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button type="submit">Delete</button>
                    </form>

                </td>
            </tr>

            @endforeach

        </table>

    </div>

</x-app-layout>
