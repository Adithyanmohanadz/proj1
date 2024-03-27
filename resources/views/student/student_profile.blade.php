@extends('student.common.student_layout')
@section('page_content_body')
<div class="container-fluid  mb-6">
    <div class="row">
        <div class="col-12">
            <div class="row pt-4">
                <div class="col-12 col-lg-11 m-auto ">
                    <div class="card">
                        <div class="card-body">
                            <form id="studentProfileForm" data-route="{{route('student.profileUpdate')}}">
                                <div class="  border-radius-xl bg-white ">
                                    <h5 class="font-weight-bolder mb-2">{{$page_title}}</h5>
                                    <div class="mt-2">
                                        <div class="row mt-3">
                                            <div class="col-12  ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">School Name</label>
                                                    <input class="  form-control" value="{{auth()->user()->school->school_name}}" disabled type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label"> Product</label>
                                                    <input class=" form-control" value="{{auth()->user()->product->product_name}}" disabled type="text" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Level </label>
                                                    <input class=" form-control" value="{{$currentLevel}}" disabled type="email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6 ">
                                            <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Class</label>
                                                    <input value="{{ auth()->user()->class->class }}" class="form-control" disabled type=" " />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-dynamic">
                                                    <label class="form-label"> Name</label>
                                                    <input class=" form-control" name="student_name" value="{{auth()->user()->student_name}}" type="text" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Username</label>
                                                    <input class=" form-control" name="student_username" disabled type="text" value="{{auth()->user()->student_username}}" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Mobile  </label>
                                                    <input class=" form-control" name="mobile" type="tel" value="{{auth()->user()->mobile}}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                            <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Email </label>
                                                    <input name="email" class=" form-control" type="email" value="{{auth()->user()->email}}" />
                                                </div>
                                            </div>
                                            {{-- <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                            <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Password</label>
                                                    <input class="  form-control" type="password" id="password" />
                                                    <i id="icon" class="far fa-eye pasw z-index-5"></i>
                                                </div>
                                            </div> --}}
                                        </div>
                                        <div class="row mt-3">
                                            {{-- <div class="col-12 col-sm-6 ">
                                            <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Conform Password</label>
                                                    <input class="  form-control" type="password" id="c-password" />
                                                    <i id="c-icon" class="far fa-eye pasw z-index-5"></i>
                                                </div>
                                            </div> --}}
                                            <div class="col-12 col-sm-12 mt-3 mt-sm-0 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Address</label>
                                                    <input name="address" class=" form-control" type="text" value="{{auth()->user()->address}}" />
                                                </div>
                                            </div>
                                        </div> 
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6 ">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Parent Name</label>
                                                    <input name="parent_name" value="{{auth()->user()->parent_name}}" class="  form-control" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Parent Email </label>
                                                    <input name="parent_email" value="{{auth()->user()->parent_email}}" class="  form-control" type="email" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row mt-3">
                                            <div class="col-12 col-sm-6">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Parent Mobile  </label>
                                                    <input name="parent_mobile" value="{{auth()->user()->parent_mobile}}" class="  form-control" type="tel" />
                                                </div>
                                            </div> 
                                            <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                                                <div class="input-group input-group-dynamic">
                                                    <label class="form-label">Parent Occupation </label>
                                                    <input name="parent_occupation" value="{{auth()->user()->parent_occupation}}" class="  form-control" type="text" />
                                                </div>
                                            </div
                                        </div>
                                    </div>
                                    <div class="button-row d-flex mt-4">
                                        <button class="ms-auto mb-0 px-6 btn bg-gradient-dark" type="submit" title="submit">save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('js/plugins/choices.min.js') }}"></script>
<script>
    if (document.getElementById('choices-product')) {
        var element = document.getElementById('choices-product');
        const example = new Choices(element, {
            searchEnabled: false,
            shouldSort: false,
        });
    }; 
    if (document.getElementById('choices-level')) {
        var element = document.getElementById('choices-level');
        const example = new Choices(element, {
            searchEnabled: false,
            shouldSort: false,
        });
    };
    if (document.getElementById('choices-class')) {
        var element = document.getElementById('choices-class');
        const example = new Choices(element, {
            searchEnabled: false,
            shouldSort: false,
        });
    }; 
</script>
@endsection
