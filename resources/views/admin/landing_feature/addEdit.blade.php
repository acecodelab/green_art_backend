@extends('admin.master', ['menu' => 'landing_setting', 'sub_menu' => 'feature'])
@section('title', isset($title) ? $title : '')
@section('style')
@endsection
@section('content')
    <!-- breadcrumb -->
    <div class="custom-breadcrumb">
        <div class="row">
            <div class="col-12">
                <ul>
                    <li>{{ __('Landing Settings') }}</li>
                    <li class="active-item">{{ $title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /breadcrumb -->

    <!-- User Management -->
    <div class="user-management add-custom-page custom-box-shadow">
        <div class="row">
            <div class="col-12">
                <div class="header-bar">
                    <div class="table-title">
                        <h3>{{ $title }}</h3>
                    </div>
                </div>
                <div class="profile-info-form">
                    <form action="{{ route('adminFeatureSave') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Feature Title') }}</label>
                                    <input type="text" name="feature_title" class="form-control"
                                        @if (isset($item)) value="{{ $item->feature_title }}" @else value="{{ old('feature_title') }}" @endif>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Feature Url') }}</label>
                                    <input type="text" name="feature_url" class="form-control"
                                        @if (isset($item)) value="{{ $item->feature_url }}" @else value="{{ old('feature_url') }}" @endif>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="#">{{ __('Feature Image') }}</label>
                                    <div id="file-upload" class="section-width">
                                        <input type="file" placeholder="0.00" name="feature_icon" value=""
                                            id="file" ref="file" class="dropify"
                                            @if (isset($item) && !empty($item->feature_icon)) data-default-file="{{ asset(path_image() . $item->feature_icon) }}" @endif />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Details') }}</label>
                                    <textarea class="form-control textarea" name="description">
                                        @if (isset($item))
                                            {{ $item->description }}@else{{ old('description') }}
                                        @endif
                                    </textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>{{ __('Activation Status') }}</label>
                                    <div class="cp-select-area">
                                        <select name="status" class="form-control wide">
                                            @foreach (status() as $key => $value)
                                                <option
                                                    @if (isset($item) && $item->status == $key) selected
                                                    @elseif(old('status') != null && old('status') == $key) @endif
                                                    value="{{ $key }}">{!! $value !!}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    @if (isset($item))
                                        <input type="hidden" name="edit_id" value="{{ $item->id }}">
                                    @endif
                                    <button type="submit" class="button-primary theme-btn">{{ $button_title }}</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /User Management -->
@endsection
@section('script')
@endsection
