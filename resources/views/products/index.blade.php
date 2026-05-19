<x-app-layout>

    <div style="padding:20px">

        <h1>Product</h1>

        {{-- ERROR VALIDATION --}}
        @if ($errors->any())
            <div style="color:red; margin-bottom:10px;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- SUCCESS MESSAGE --}}
        @if (session('success'))
            <div style="color:green; margin-bottom:10px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('products.store') }}" method="POST">
            @csrf

            <input type="text" name="product_name" placeholder="Product Name" required>

            <input type="number" name="price" placeholder="Price" required>

            <input type="number" name="stock" placeholder="Stock" required>

            <input type="text" name="unit" placeholder="Unit" required>

            {{-- CATEGORY --}}
            <select name="category_id" required>

                <option value="">-- Select Category --</option>

                @foreach($categories as $category)

                    <option value="{{ $category->id }}">
                        {{ $category->category_name }}
                    </option>

                @endforeach

            </select>

            <button type="submit">Tambah</button>

        </form>

        <hr>

        <table border="1" cellpadding="10">

            <tr>
                <th>No</th>
                <th>Product</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Unit</th>
                <th>Category</th>
                <th>Action</th>
            </tr>

            @foreach($products as $product)

            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->unit }}</td>
                <td>{{ $product->category->category_name }}</td>
                <td>

                    <form action="{{ route('products.destroy', $product->id) }}" method="POST">
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
