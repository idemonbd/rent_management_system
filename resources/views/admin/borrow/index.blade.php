@extends('layouts.dashboard')

@section('content')


<div class="col-12">
    <div class="section-block">
        <h2 class="section-title">Borrows</h2>
    </div>
    <div class="simple-card">
        <ul class="nav nav-tabs" id="myTab5" role="tablist">
            <li class="nav-item">
                <a class="nav-link border-left-0 active show" id="home-tab-simple" data-toggle="tab" href="#home-simple"
                    role="tab" aria-controls="home" aria-selected="true">List</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab-simple" data-toggle="tab" href="#profile-simple" role="tab"
                    aria-controls="profile" aria-selected="false">Add</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent5">
            <div class="tab-pane fade active show" id="home-simple" role="tabpanel" aria-labelledby="home-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive ">
                            <table id="example" class="table table-striped table-bordered second" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Borrower</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($borrows as $borrow)
                                    <tr>
                                        <th scope="row">{{$borrow->id}}</th>
                                        <td>{{$borrow->name}}</td>
                                        <td>{{ $borrow->created_at->format('d-m-Y') }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('borrow.edit', $borrow->id)}}" class="btn btn-sm btn-warning"><i
                                                    class="fas fa-edit"></i></a>
                                            <form class="d-inline" action="{{route('borrow.destroy', $type->id)}}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash-alt"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile-simple" role="tabpanel" aria-labelledby="profile-tab-simple">
                <div class="card">
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="form-group col-3">
                                    <label class="col-form-label">Brower</label>
                                    <select class="form-control">
                                        <option value="">Select User</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
    
                                <div class="form-group col-3">
                                    <label class="col-form-label">Amount</label>
                                    <input type="number" class="form-control">
                                </div>
                                
                                <div class="form-group col-3">
                                    <label class="col-form-label">Entry Date</label>
                                    <input type="date" class="form-control" value="{{ date("Y-m-d") }}">
                                </div>
                                <div class="form-group col-3">
                                    <label class="col-form-label">Enter by</label>
                                    <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                                </div>
                            </div>
            
                            <div class="form-group">
                                <label for="textarea">Description</label>
                                <textarea class="form-control" id="textarea" rows="3"></textarea>
                            </div>
            
                            <div class="form-group text-right mt-4">
                                <button type="submit" class="btn btn-primary">Add New</button>
                            </div>
            
                            
            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection