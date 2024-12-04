@extends('backend.layout.master')
@section('content')
@php
    $skil_id = $skils ? $skils->id : '';
    $skil_name = $skils ? $skils->name : '';
    $skil_description = $skils ? $skils->description : '';
@endphp
<!-- Begin Page Content -->
<div class="container">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Skils</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <span class="font-weight-bold text-primary">Skils Add</span>
            <a href="/admin/skils-view" class="btn btn-primary float-right">All Skils <i class="fa fa-list-alt" aria-hidden="true"></i></a>
        </div>
        
        <div class="card-body">
            <form method="post" action="/admin/skils-create-update">
                @csrf
                <input type="hidden" name="edit_id" value="{{ $skil_id }}">
                <div class="form-group">
                    <label>Enter Name</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name',$skil_name) }}" placeholder="Enter Skil Name">
                    @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name')}}</span>
                    @endif
                </div>

                <div class="form-group">
                    <label>Enter Description</label>
                    <textarea class="form-control" name="description" rows="3" placeholder="Enter Skil description">{{ old('description',$skil_description) }}</textarea>
                    @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description')}}</span>
                    @endif
                </div>
                 <div class=text-center>
                    <button type="submit" class="btn btn-success">Submit <i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                 </div>   
                
            </form>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
 <script>
    $(document).ready(function() {
        @if(Session::has('success'))
            alert('{{ Session::get('success') }}');
        @endif
    });
 </script>

@endsection