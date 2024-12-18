@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.blog.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blogs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.id') }}
                        </th>
                        <td>
                            {{ $blog->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.name') }}
                        </th>
                        <td>
                            {{ $blog->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.email') }}
                        </th>
                        <td>
                            {{ $blog->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.phone') }}
                        </th>
                        <td>
                            {{ $blog->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.blog.fields.details') }}
                        </th>
                        <td>
                            {{ $blog->details }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.blogs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection