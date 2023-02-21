@extends('layouts.master')
@section('content')
    <div class="main-content-inner pt-4">
        <div class="service2-wrapper">
            <div class="row  pt-4 pb-4  " data-aos="fade-up">

                <form action="{{ route('languages-submit') }}" method="POST">
                    @csrf
                    <div class="col-md-6 col-sm-12">
                        <div class="current-data shadow">
                            <h2>Add Language:</h2>
                            <table style="width:100%" class="current-data-table">
                                <tr>
                                    <th>LANGUAGE NAME:</th>
                                    <td>

                                        <input type="text" class="@error('language_name') is-invalid @enderror"
                                            name="language_name" value="{{ old('language_name') }}">
                                        @error('language_name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>SLUG:</th>
                                    <td>

                                        <input type="text" class="@error('slug') is-invalid @enderror" name="slug"
                                            value="{{ old('slug') }}">
                                        @error('slug')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <tr>
                                    <th>DISPLAY ORDER:</th>
                                    <td>
                                        <input type="number" class="@error('display_order') is-invalid @enderror"
                                            name="display_order" value="{{ old('display_order') }}">
                                        @error('display_order')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                </tr>
                                <th>DEFAULT:</th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" name="default">
                                        <span class="slider round"></span>
                                    </label>
                                </td>
                                <th>STATUS:</th>
                                <td>
                                    <label class="switch">
                                        <input type="checkbox" name="status">
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
