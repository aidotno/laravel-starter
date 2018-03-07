@extends ('backend.layouts.app')

<?php $module_name_singular = str_singular($module_name); ?>

@section ('title', __("labels.backend.$module_name.".strtolower($module_action).".title") . " - " . __("labels.backend.$module_name.".strtolower($module_action).".action"))

@section('content')
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-5">
                <h4 class="card-title mb-0">
                    {{ __("labels.backend.$module_name.index.title") }}
                    <small class="text-muted">{{ __("labels.backend.$module_name.index.action") }} </small>
                </h4>
                <div class="small text-muted">
                    {{ __("labels.backend.$module_name.index.sub-title") }}
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-7">
                <div class="btn-toolbar float-right" role="toolbar" aria-label="Toolbar with button groups">
                    <a href="{{route("backend.$module_name.create")}}" class="btn btn-success ml-1" data-toggle="tooltip" title="Create New"><i class="fa fa-plus-circle"></i></a>
                </div>
            </div>
            <!--/.col-->
        </div>
        <!--/.row-->

        <div class="row mt-4">
            <div class="col">
                <table class="table table-responsive">
                    <thead>
                        <tr>
                            <th>{{ __("labels.backend.$module_name.fields.name") }}</th>
                            <th>{{ __("labels.backend.$module_name.fields.permissions") }}</th>
                            <th class="text-right">{{ __("labels.backend.action") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($$module_name as $module_name_singular)
                        <tr>
                            <td>{{ $module_name_singular->name }}</td>
                            <td>
                                @foreach ($module_name_singular->permissions as $permission)
                                <li>{{ $permission->name }}</li>
                                @endforeach
                            </td>
                            <td class="text-right">
                                <a href="{{route("backend.$module_name.show", $module_name_singular)}}" class="btn btn-success"><i class="fas fa-desktop" data-toggle="tooltip" title="{{__('labels.backend.show')}}"></i></a>
                                <a href="{{route("backend.$module_name.edit", $module_name_singular)}}" class="btn btn-primary"><i class="fas fa-pencil-alt" data-toggle="tooltip" title="{{__('labels.backend.edit')}}"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-7">
                <div class="float-left">
                    {!! $$module_name->total() !!} {{ __('labels.backend.total') }}
                </div>
            </div>
            <div class="col-5">
                <div class="float-right">
                    {!! $$module_name->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
