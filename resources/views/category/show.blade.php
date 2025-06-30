


@extends('layouts.app');

@section('content');

   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h4>Show Category Details
                       <a href="{{ url('category') }}" class="btn btn-danger float-end">Back</a>
                   </h4>
                   </div>
                   <div class="card-body">

                        <div class="mb-3">
                        <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}">
                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                                <textarea name="description" rows="3" class="form-control">{{ $category->description }}</textarea>
                                @error('description') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        <div class="mb-3">
                            <label for="">Status</label><br>
                            <input type="checkbox" name="status" {{ $category->status == 1 ? 'checked':'' }}> Checked=visible, unchecked=hidden
                            @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                            </div>

                   </div>
               </div>
           </div>
       </div>
   </div>

@endsection