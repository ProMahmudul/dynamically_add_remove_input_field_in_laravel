@extends('master')

@section('main-content')
    <div class="container">
        <div class="col-md-12 col-sm-12">
            <div class="card card-body">
                <h4 class="text-center card-text">Laravel Add/Remove multiple input fields dynamically with jquery</h4>
            </div>
            <form action="{{ route('addmoreProduct') }}" method="post">
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Brand</th>
                        <th>Model</th>
                        <th>Price</th>
                        <th class="text-center">
                            <a href="#" class="btn btn-info addRow">+</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <select name="addmore[0][brand_id]" id="brand_id" class="form-control">
                                <option value="">Select</option>
                                <option value="1">Sony</option>
                                <option value="2">Samsung</option>
                                <option value="3">Huawei</option>
                            </select>
                        </td>
                        <td><input type="text" name="addmore[0][model]" class="form-control"></td>
                        <td><input type="text" name="addmore[0][price]" class="form-control"></td>
                        <td class="text-center"><a href="#" class="btn btn-danger">-</a></td>
                    </tr>
                    </tbody>
                </table>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>

        var i = 0;

        $('.addRow').on('click', function () {
            addRow();
        });

        function addRow() {
            ++i;
            var tr = '<tr>' +
                '<td>' +
                '<select name="addmore['+i+'][brand_id]" id="brand_id" class="form-control">' +
                '<option value="">Select</option>' +
                '<option value="1">Sony</option>' +
                '<option value="2">Samsung</option>' +
                '<option value="3">Huawei</option>' +
                '</select>' +
                '</td>' +
                '<td><input type="text" name="addmore['+i+'][model]" class="form-control"></td>' +
                '<td><input type="text" name="addmore['+i+'][price]" class="form-control"></td>' +
                '<td class="text-center"><a href="#" class="btn btn-danger remove">-</a></td>' +
                '</tr>';
            $('tbody').append(tr);
        }

        $('tbody').on('click', '.remove', function () {
            $(this).parent().parent().remove();
        });
    </script>
@endsection