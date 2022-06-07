@extends('layouts.sitelayouts.header')

@section('content')





<form action="{{route('users.update', Auth::user())}}" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">
    @method('PUT')

    @csrf

    <div class="row text-right">
        <div class="col-md-12">
            <div class="main-card mb-1 container card">
                <div class="card-body">
                    <h4 class="card-title">
                        <h4>تغيير الباسوورد</h4>
                    </h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="current_password">الباسوورد القديم</label>
                                <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required
                                    placeholder="Enter current password">
                                @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="new_password ">الباسوورد الجديد</label>
                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                                    placeholder="Enter the new password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mt-3">
                                <label for="confirm_password">تأكيد الباسوورد</label>
                                <input type="password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror"required placeholder="Enter same password">
                                @error('confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>

                                @enderror
                            </div>
                        </div>
                        <div class="d-flex justify-content-first mt-4 ml-2">
                            <button type="submit" class="btn btn-primary"
                                id="formSubmit">تغيير</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>









@endsection
