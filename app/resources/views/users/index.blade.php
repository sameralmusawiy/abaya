@if (Auth::user()->role == 'manager')
@extends('layouts.cplayouts.controlPanelLayouts')

@section('content')

<style>
    .card:hover {
       box-shadow: 0 4px 8px 0 rgba(3, 3, 3, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
    .card-title{
        font-family: cairo, arial, helvetica, sans-serif;

    }


</style>



<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
   <h1 class="h2 text-secondary" id="pageTitle">كل الحسابات</h1>
   <div class="btn-toolbar mb-2 mb-md-0">
       <div class="btn-group me-2" >
        <a  type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal" class='btn btn-light text-success shadow'>
            اضافة<i id="create" class="bi bi-plus"></i>
        </a>
       </div>
   </div>
</div>


<div class="table-responsive-md">
    <p class="card-text small"><i>عدد المستخدمين الكلي: ( {{$users->count()}} )</i> </p>
   <table class="table">
       <thead>
         <tr>
           <th scope="col">#</th>
           <th scope="col">الاسم</th>
           <th scope="col">العنوان</th>
           <th scope="col">رقم الهاتف</th>
           <th scope="col">الرتبة</th>

         </tr>
       </thead>
       <tbody>
           @foreach ($users as $user)

         <tr>
           <th scope="row">1</th>
           <td>{{ $user->name }}</td>
           <td>{{ $user->address }}</td>
           <td>{{ $user->phonenumber }}</td>
           <td>
               @if ($user->role == 'admin' && $user->role != 'manager')
                    <button type="button" class="text-white btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModalAdmin">
                        ادمن
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalAdmin" tabindex="-1" aria-labelledby="exampleModalAdminLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalAdminLabel">تغيير الادمن</h5>
                            </div>
                            <div class="modal-body py-5">
                                <i class="bi bi-dash-circle-fill text-danger p-3"></i>   هل انت متأكد من تغيير رتبة الادمن الى مستخدم؟!!
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn text-secondary" data-bs-dismiss="modal">رجوع</button>
                            {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                            <a class="text-dark btn btn-outline-success" href="{{route('users.notAdmin', $user->id)}}">تغيير</a>
                            </div>
                        </div>
                        </div>
                    </div>
                   {{-- <a class="text-white btn btn-success" href="{{route('users.notAdmin', $user->id)}}">ادمن</a> --}}
               @elseif($user->role == 'user')
                    <button type="button" class="text-white btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModalUser">
                        مستخدم
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalUser" tabindex="-1" aria-labelledby="exampleModalUserLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">تغيير المستخدم</h5>
                            </div>
                            <div class="modal-body py-5">
                                <i class="bi bi-dash-circle-fill text-danger p-3"></i>   هل انت متأكد من تغيير رتبة المستخدم الى ادمن؟!!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn text-secondary" data-bs-dismiss="modal">رجوع</button>
                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                <a class="text-dark btn btn-outline-success" href="{{route('users.admin', $user->id)}}">تغيير</a>
                            </div>
                        </div>
                        </div>
                    </div>
               @else
                   <p class='btn btn-danger rounded'>مدير</p>
               @endif
           </td>

         </tr>
         @endforeach

       </tbody>
   </table>
 </div>










 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header" id="modalHead" >
            <h2 class="modal-title text-dark" id="exampleModalLabel" >اضافة مستخدم</h2>
            </div>
        <div class="modal-body px-5 mx-5">
            <form method="POST" action="{{ route('users.custom') }}">
                @csrf
                <div class="form-group">
                    <label for="name" class="col text-md-left">{{ __('الاسم') }}</label>

                    <div class="col">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="email" class="col text-md-left">{{ __('الايميل') }}</label>

                    <div class="col">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="password" class="col text-md-left">{{ __('الباسوورد') }}</label>
                    <div class="col">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="password-confirm" class="col text-md-left">{{ __('تأكيد الباسوورد') }}</label>
                    <div class="col">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <br>
                <div class="form-group">
                    <label for="password" class="col text-md-left">{{ __('البلد') }}</label>
                    <div class="col">
                        <input id="city" type="text" class="form-control " name="country" value="" required >
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="password" class="col text-md-left">{{ __('المدينة') }}</label>
                    <div class="col">
                        <select id="inputState" class="form-select form-control" name='city' >
                        <option selected value='النجف الاشرف' name='city'>النجف الاشرف</option>
                        <option value='كربلاء' name='city'>كربلاء</option>
                        <option value='بغداد' name='city'>بغداد</option>
                        <option value='بابل' name='city'>بابل</option>
                        <option value='الديوانية' name='city'>الديوانية</option>
                        <option value='كوت' name='city'>كوت</option>
                        <option value='ديالى' name='city'>ديالى</option>
                        <option value='ناصرية' name='city'>ناصرية</option>
                        <option value='بصرة' name='city'>بصرة</option>
                        <option value='ميسان' name='city'>ميسان</option>
                        <option value='صلاح الدين' name='city'>صلاح الدين</option>
                        <option value='كركوك' name='city'>كركوك</option>
                        <option value='اربيل' name='city'>اربيل</option>
                        <option value='سليمانية' name='city'>سليمانية</option>
                        <option value='دهوك' name='city'>دهوك</option>
                        <option value='الموصل' name='city'>الموصل</option>
                        <option value='الانبار' name='city'>الانبار</option>
                        </select>
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="password-confirm" class="col text-md-left">{{ __('اسم الحي / المنطقة') }}</label>
                    <div class="col">
                        <input type="text" name='district' class="form-control" id="inputCity" placeholder="">
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="password-confirm" class="col text-md-left">{{ __('العنوان') }}</label>
                    <div class="col">
                        <input id="address" type="text" class="form-control " name="address" value="" required >
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label for="password-confirm" class="col text-md-left">{{ __('رقم الهاتف') }}</label>
                    <div class="col">
                        <input id="phonenumber" type="text" class="form-control " name="phonenumber" value="" required >
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="form-check-label " name='date_of_birth' for="exampleCheck1">تاريخ الميلاد</label>
                    <div class="col ">
                        <input type="date" class="form-control" id="birthday" name="date_of_birth" >
                    </div>
                </div>
                <br>

                <div class="form-group">
                    <label class="form-check-label " name='date_of_birth' for="exampleCheck1">الجنس</label>
                    <div class="col ">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" name="gender" value="ذكر" type="radio"  id="inlineRadio1" >
                            <label class="form-check-label" for="inlineRadio1">ذكر</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" value="انثى" type="radio" name="gender" id="inlineRadio2" value="option2">
                            <label class="form-check-label" for="inlineRadio2">انثى</label>
                        </div>
                    </div>
                </div>
                <br>
                <br>

                <div class="form-group modal-footer">
                  <button type="submit" class="btn btn-info">حفظ</button>
                  <button type="button" class="btn text-danger" data-bs-dismiss="modal">اغلاق</button>
                </div>
              </form>
        </div>
    </div>
    </div>
</div>




@endsection
@else
<style>
    * {
  -webkit-box-sizing: border-box;
          box-sizing: border-box;
}

body {
  padding: 0;
  margin: 0;
}

#notfound {
  position: relative;
  height: 100vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 560px;
  width: 100%;
  padding-left: 160px;
  line-height: 1.1;
}

.notfound .notfound-404 {
  position: absolute;
  left: 0;
  top: 0;
  display: inline-block;
  width: 140px;
  height: 140px;
  background-image: url('/src/photos/pageImage/emoji.png');
  background-size: cover;
}

.notfound .notfound-404:before {
  content: '';
  position: absolute;
  width: 100%;
  height: 100%;
  -webkit-transform: scale(2.4);
      -ms-transform: scale(2.4);
          transform: scale(2.4);
  border-radius: 50%;
  background-color: #f2f5f8;
  z-index: -1;
}

.notfound h1 {
  font-family: 'Nunito', sans-serif;
  font-size: 65px;
  font-weight: 700;
  margin-top: 0px;
  margin-bottom: 10px;
  color: #151723;
  text-transform: uppercase;
}

.notfound h2 {
  font-family: 'Nunito', sans-serif;
  font-size: 21px;
  font-weight: 400;
  margin: 0;
  text-transform: uppercase;
  color: #151723;
}

.notfound p {
  font-family: 'Nunito', sans-serif;
  color: #999fa5;
  font-weight: 400;
}

.notfound a {
  font-family: 'Nunito', sans-serif;
  display: inline-block;
  font-weight: 700;
  border-radius: 40px;
  text-decoration: none;
  color: #388dbc;
}

@media only screen and (max-width: 767px) {
  .notfound .notfound-404 {
    width: 110px;
    height: 110px;
  }
  .notfound {
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 110px;
  }
}

</style>

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404"></div>
        <h1>404</h1>
        <h2>Oops! Page Not Be Found</h2>
        <p>Sorry but the page you are looking for does not exist, have been removed. name changed or is temporarily unavailable</p>
        <a href="/">اذهب الى الصفحة الرئيسية</a>
    </div>
</div>
{{-- <div class="text-center text-danger">
    <h1 class="my-5">Oops !!!!!!!, This Page Not Found</h1>
    <h1><i class="bi bi-emoji-frown rounded-circule text-dark" style="font-size:200px; background-color:yellow; border-radius:50%;"></i></h1>
</div> --}}
@endif
