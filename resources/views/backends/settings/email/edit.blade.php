@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="service2-wrapper">
            <div class="row  pt-4 pb-4  " data-aos="fade-up">

                <form action="{{ route('emails-update', $email_service->id) }}" method="POST">
                    @csrf
                    <div class="col-md-8 col-sm-12">
                        <div class="current-data shadow">
                            <h2>Add Coupon:</h2>
                            <table style="width:100%" class="current-data-table">
                                <tr>
                                    <th>For:</th>
                                    <td>
                                        <select name="mail_type" id="">
                                            <option value="1" {{ $email_service->mail_type === '1' ? 'selected' : '' }}>Sign Up </option>
                                            <option value="2"{{ $email_service->mail_type === '2' ? 'selected' : '' }}>Checkout</option>
                                            <option value="3" {{ $email_service->mail_type === '3' ? 'selected' : '' }}>Password Reset</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Subject:</th>
                                    <td>
                                        <input type="text" name="email_subject"
                                            class="@error('email_subject') is-invalid @enderror"
                                            value="{{$email_service->email_subject}}">
                                        @error('email_subject')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>Body:</th>
                                    <td>
                                        <textarea name="email_body" id="" cols="68">{{$email_service->email_body}}</textarea>
                                        @error('email_body')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>

                                </tr>
                                <th>Status:</th>
                                <td>
                                    <label class="switch">
                                        <input value="1" type="checkbox"
                                            {{ $email_service->status === 1 ? 'checked' : '' }} name="status">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                </tr>
                            </table>
                            <div class="tex-insert-btn mt-3">
                                <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i>
                                    Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
