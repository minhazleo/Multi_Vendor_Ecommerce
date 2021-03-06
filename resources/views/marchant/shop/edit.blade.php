@extends('marchant.layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Create Shop</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Heshelghor</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                            <li class="breadcrumb-item active">Shop List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <a href="{{route('shop.index')}}" class="btn btn-primary mb-2"><i
                                        class="mdi mdi-format-list-bulleted me-1"></i> All Shop List</a>
                            </div>
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="p-2">
                                                    <form method="POST" action="{{route('shop.update', $shop->id)}}" enctype="multipart/form-data" class="form-horizontal" role="form" >
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="old_photo" value="{{$shop->photo}}">
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Shop Name: </label>
                                                            <div class="col-md-10">
                                                                <input name="name" value="{{$shop->name}}" type="text" id="simpleinput" class="form-control @error('name') is-invalid @enderror " placeholder="Name">
                                                                <div class="text-danger">
                                                                    @error('name')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="addressID">Shop Address: </label>
                                                            <div class="col-md-10">
                                                                <input name="address" value="{{$shop->address}}" type="text" id="addressID" class="form-control @error('address') is-invalid @enderror " placeholder="address">
                                                                <div class="text-danger">
                                                                    @error('address')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="example-textarea">Shop Description</label>
                                                            <div class="col-md-10">
                                                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="example-textarea"
                                                                    rows="5" placeholder="Optional">{{$shop->description}}</textarea>
                                                                <div class="text-danger">
                                                                    @error('description')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Division: </label>
                                                            <div class="col-md-10" style="position: relative">
                                                                <select id="division" class="form-select @error('division_id') is-invalid @enderror" name="division_id">
                                                                    <option selected value="">Select</option>
                                                                    @foreach ($divisions as $division)
                                                                        <option value="{{$division->id}}"> {{$division->name}}</option>
                                                                    @endforeach

                                                                </select>
                                                                <div class="text-danger">
                                                                    @error('division_id')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Select District : </label>
                                                            <div class="col-md-10" style="position: relative">
                                                                <select id="district" class="form-select @error('district_id') is-invalid @enderror" name="district_id">
                                                                    <option selected value="">Select</option>
                                                                        @foreach ($districts as $district)
                                                                        <option value="{{$district->id}}"> {{$district->name}}</option>
                                                                        @endforeach

                                                                </select>

                                                                <div class="text-danger">
                                                                    @error('district_id')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="upazila">Select Upazila : </label>
                                                            <div class="col-md-10" style="position: relative">
                                                                <select id="upazila" class="form-select @error('upazila_id') is-invalid @enderror" name="upazila_id">
                                                                    <option selected value=""></option>
                                                                        @foreach ($upazilas as $upazila)
                                                                        <option value="{{$upazila->id}}"> {{$upazila->name}}</option>
                                                                        @endforeach
                                                                </select>

                                                                <div class="text-danger">
                                                                    @error('upazila_id')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>


                                                         <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="tradeLicence">Trade Licence No: </label>
                                                            <div class="col-md-10">
                                                                <input name="trade_license" value="{{$shop->trade_license}}" type="text" id="tradeLicence" class="form-control @error('trade_license') is-invalid @enderror " placeholder="address">
                                                                <div class="text-danger">
                                                                    @error('trade_license')
                                                                    <span>{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="mb-2 row">
                                                            <label class="col-md-2 col-form-label"
                                                                for="simpleinput">Brand Image</label>
                                                            <div class="col-md-10">
                                                                <input name="photo" type="file" id="simpleinput" class="form-control @error('photo') is-invalid @enderror"
                                                                    value="Some text value...">
                                                                    <div class="text-danger">
                                                                        @error('photo')
                                                                        <span>{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <img src="{{asset($shop->photo)}}" style="width: 100px; height:100px" alt="">
                                                            </div>
                                                        </div>

                                                        <button type="submit" class="btn btn-primary"> <i class="mdi mdi-content-save me-1"></i> Create Shop</button>

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- end row -->
                                    </div>
                                </div> <!-- end card -->
                            </div><!-- end col -->
                        </div>
                        <!-- end row -->

                    </div>
                </div>
            </div>
        </div>
        <!-- end row -->


    </div> <!-- container -->

</div> <!-- content -->
@endsection

@push('css')
<!-- third party css -->
<link href="{{ asset('backend') }}/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet"
    type="text/css" />
<link href="{{ asset('backend') }}/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
    rel="stylesheet" type="text/css" />
@endpush
