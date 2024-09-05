    @extends('layouts.app')

    @section('content')
    <div class="container">
        @if(Session::has('Success'))
        <p class="alert alert-info mb-0">{{ Session::get('Success')}}</p>
    @endif
        <h2 class="col d-flex justify-content-center mx-auto mb-2 mt-4 text-uppercase">Daftar Produk</h2>

    </div>


    <div class="container">

        <div class="row shadow-sm p-4 mb-5 bg-body rounded">
            <div class="d-flex mb-3 p-0">
                <a class="btn btn-success text-white shadow-sm" href="{{ 'create' }}"><ion-icon name="add-circle-outline"></ion-icon> Tambah Produk</a> <br>

            </div>

            <table class="table align-middle mb-0 text-center">
                <thead style="background-color: teal; color:white">
                    <th>No</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Action</th>
                </thead>
                @foreach ($productData as $index => $product)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $product->nama }}</td>
                    <td>{{ $product->status ? 'Tersedia' : 'Tidak Tersedia' }}</td>
                    <td>{{ $product->stok}}</td>
                    <td>{{ $product->harga }}</td>
                    <td>
                        <a class="btn btn-warning btn-rounded  shadow-sm" href="{{ 'edit/' . $product->id }}"><ion-icon name="pencil-outline"></ion-icon> Edit</a>
                        <a class="btn btn-danger text-white shadow-sm" href="{{ 'delete/' . $product->id }}" onclick="return confirmDelete(event)"><ion-icon name="trash-outline"></ion-icon> Hapus</a>
                        <script>
                            function confirmDelete(event) {
                                event.preventDefault();
                                swal({
                                    title: "Konfirmasi Hapus Data",
                                    text: "Apakah Anda yakin ingin menghapus data ini?",
                                    icon: "warning",
                                    buttons: ["Batal", "Hapus"],
                                    dangerMode: true,
                                }).then((willDelete) => {
                                    if (willDelete) {
                                        window.location.href = event.target.getAttribute("href");
                                    } else {
                                        return false;
                                    }
                                });
                            }
                            </script>

                </td>
                </tr>

                @endforeach
            </table>
        </div>
    </div>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    @endsection
