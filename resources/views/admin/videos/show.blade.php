@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.video.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.videos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.id') }}
                        </th>
                        <td>
                            {{ $video->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.name') }}
                        </th>
                        <td>
                            {{ $video->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.email') }}
                        </th>
                        <td>
                            {{ $video->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.phone') }}
                        </th>
                        <td>
                            {{ $video->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.video.fields.video') }}
                        </th>
                        <td>
                            @if($video->video)
                                <a href="{{ $video->video->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.videos.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection