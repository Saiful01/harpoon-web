@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.image.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.images.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.image.fields.id') }}
                        </th>
                        <td>
                            {{ $image->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.image.fields.name') }}
                        </th>
                        <td>
                            {{ $image->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.image.fields.email') }}
                        </th>
                        <td>
                            {{ $image->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.image.fields.phone') }}
                        </th>
                        <td>
                            {{ $image->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.image.fields.image') }}
                        </th>
                        <td>
                            @if($image->image)
                                <a href="{{ $image->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $image->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.images.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection