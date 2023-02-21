@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="service2-wrapper">
            <div class="row  pt-4 pb-4  " data-aos="fade-up">

                <form action="{{ route('languages-update', $language_service->id) }}" method="POST">
                    @csrf
                    <div class="col-md-6 col-sm-12">
                        <div class="current-data shadow">
                            <h2>Add Language:</h2>
                            <table style="width:100%" class="current-data-table">
                                <tr>
                                    <th>LANGUAGE NAME:</th>
                                    <td>
                                        @error('language_name')
                                            {{-- <div class="alert"> --}}
                                            <p class="text-danger">{{ $message }}</p>
                                            {{-- </div> --}}
                                        @enderror
                                        <input type="text" class="@error('language_name') is-invalid @enderror" name="language_name"
                                            value="{{ $language_service->language_name }}"></td>
                                </tr>
                                <tr>
                                    <th>SLUG:</th>
                                    <td>
                                        @error('slug')
                                            {{-- <div class="alert"> --}}
                                            <p class="text-danger">{{ $message }}</p>
                                            {{-- </div> --}}
                                        @enderror
                                        <input type="text" name="slug" class="@error('slug') is-invalid @enderror" value="{{ $language_service->slug }}"></td>
                                </tr>
                                <tr>
                                    <th>DISPLAY ORDER:</th>
                                    <td>
                                        @error('display_order')
                                            {{-- <div class="alert"> --}}
                                            <p class="text-danger">{{ $message }}</p>
                                            {{-- </div> --}}
                                        @enderror
                                        <input type="number" class="@error('display_order') is-invalid @enderror" name="display_order" value="{{ $language_service->display_order }}">
                                    </td>
                                </tr>
                                <th>DEFAULT:</th>
                                <td>
                                    <label class="switch">
                                        <input value="1" type="checkbox" name="default" {{ $language_service->default === 1 ? 'checked' : '' }}>
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <th>STATUS:</th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" name="status" value="1" {{ $language_service->status === 1 ? 'checked' : '' }}>
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
