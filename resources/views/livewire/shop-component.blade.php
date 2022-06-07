


                                        <div class="container">
                                            <div class="row">
                                                <div id="sidBar" class="col-6 col-md-3 mt-5">
                                                    <h5 class='mb-4'>نوع القماش</h5>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                        <label class="form-check-label" for="defaultCheck1">كتان</label>
                                                    </div>
                                                    <hr class='divider'>
                                                    <h5 class='mb-3'>اللون</h5>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    </div><div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                                    </div>
                                                    <hr class='divider'>

                                                    <h5 class='mb-3'>السعر</h5>
                                                    <input type="range" class="form-range" min="10.000" max="100.000" id="customRange1">
                                                </div>
                                                <div class="col-md-9">
                                                    <div class="row g-3">
                                                        <div class="col-md-4 mb-2">
                                                            <select id="inputState" name="sorting" class="form-select" wire:model="sorting" style="border:none">
                                                                <option value="default" selected>بدون ترتيب</option>

                                                                <option value="date" >فرز: الاحدث</option>
                                                                <option value="price" >فرز: من الاقل الى الاعلى</option>
                                                                <option value="price-desc" >فرز: من الاعلى الى الاقل</option>

                                                            </select>

                                                        </div>
                                                        <div class="col-md-4">
                                                            {{-- <input type="text" class="form-control" id="inputCity"> --}}
                                                        </div>

                                                          {{-- <div class="col-md-4">
                                                            <label for="inputZip" class="form-label">Zip</label>
                                                            <input type="text" class="form-control" id="inputZip">
                                                          </div> --}}
                                                    </div>
                                                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 g-0">
                                                        @foreach ($products_types as $products_type)
                                                            <div class="col">
                                                                <a href="{!!route ('products_types.show', $products_type->id)!!}" title="Show"  >
                                                                <div class="card h-100 mt-2">
                                                                    @foreach (json_decode($products_type->photo) as $image)
                                                                        @php
                                                                            $new = [];
                                                                            array_push($new, $image)
                                                                        @endphp
                                                                    @endforeach
                                                                   <img id="img" src="{!!URL::asset('/uploads/images/'.$new[0]) !!}" alt="..." class="px-0" style="height: 370px; padding:0px;">
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">{{ $products_type->name }}</h5>
                                                                        <p class="card-text">{{ $products_type->price }}</p>
                                                                        <form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
                                                                            @csrf
                                                                            <div class='hidden'>
                                                                                <input type="hidden" value="{{ $products_type->id }}" name="id">
                                                                                <input type="text" value="{{ $products_type->name }}" name="name">
                                                                                <input type="" value="{{ $products_type->price }}" name="price">
                                                                                <input type="text" value="{{ $products_type->fabric }}" name="fabric">
                                                                                <input type="hidden" value="{{ $products_type->image }}"  name="photo[]">
                                                                                <input type="" value="1" name="quantity">
                                                                            </div>
                                                                            <button class="btn btn-dark py-0 small">اضافة الى السلة <i class="bi bi-cart4"></i></button>

                                                                        </form>
                                                                    </div>
                                                                </div>
                                                                </a>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
