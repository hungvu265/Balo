@extends('admin.layout')
@section('main-content')
    @if(session()->has('message') && session()->get('status') == 'success')
        <div class="alert alert-success alert-dismissible" role="alert">
            {{ session()->get('message') }}
        </div>
    @endif
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="row mb-3">
                        <div class="col-12">
                            <form action="{{ route('slider.upload') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div>
                                    <input type="file" name="image" required>
                                    <button class="btn btn-primary">Upload image</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <form action="{{ route('slider.store') }}" method="post">
                        @csrf
                        <table class="table">
                            <thead class="thead-default">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Hành động</th>
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                    @foreach ($sliders as $slider)
                                    <tr>
                                        <input type="hidden" name="id[]" value="{{ $slider->id }}">
                                        <td>
                                            <span class="ui-icon ui-icon-arrowthick-2-n-s"></span>
                                        </td>
                                        <td>
                                            <img style="width: 50px" src="{{ asset('images').'/'.$slider->image }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('slider.delete', $slider->id) }}"
                                               onclick="return confirm('Bạn có chắc chắn muốn xoá không?');"
                                               class="btn btn-danger">Xoá</a>
                                        </td>
                                    </tr>
                                    @endforeach
                            </tbody>
                        </table>
                        <div>
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>

                <div id="change-pass" class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered dialogExport">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title mt-0">Đổi mật khẩu</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-css')
<style>
    .eyes {
        float: right;
        margin-top: -24px;
        padding-right: 8px;
        opacity: 0.8;
    }
</style>
@endsection

@section('page-js')
@endsection

@section('page-custom-js')
<script type="text/javascript">
    $(document).ready(function() {
        $( function() {
            $( "#sortable" ).sortable();
        } );
    });
</script>
@endsection
