@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.certificate.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.id') }}
                        </th>
                        <td>
                            {{ $certificate->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.name') }}
                        </th>
                        <td>
                            {{ $certificate->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.email') }}
                        </th>
                        <td>
                            {{ $certificate->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.phone') }}
                        </th>
                        <td>
                            {{ $certificate->phone }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.certificate.fields.certificate') }}
                        </th>
                        <td>
                            @if($certificate->certificate)
                                <a href="{{ $certificate->certificate->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $certificate->certificate->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.certificates.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection