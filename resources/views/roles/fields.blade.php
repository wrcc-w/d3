<div class="row gx-10 mb-5">
    <div class="col-md-6 mb-5">
        {{ Form::label('display_name', __('messages.common.name').':', ['class' => 'required fs-5 fw-bolder form-label mb-2']) }}
        {{ Form::text('display_name', (isset($selectedPermissions))?$role->display_name:'', ['class' => 'form-control form-control-solid', 'placeholder' => 'Role', 'required']) }}
    </div>
</div>
<div class="row gx-10 mb-5">
    <div class="col-md-6 mb-5">
        <label class="fs-5 fw-bolder form-label mb-2">{{__('messages.role.role_permissions')}}</label>
    </div>
    <div class="col-md-6 mb-5 d-flex justify-content-between px-md-0">
        <label class="form-check form-check-custom form-check-solid fw-bold w-100 qwe123">{{__('messages.role.select_all_permissions')}}
            <input class="form-check-input allPermissionCheck" type="checkbox" value="" id="checkAllPermission"/>
        </label>
    </div>
    <div class="table-responsive">
        <table class="table align-middle table-row-dashed fs-6 gy-5">
            <tbody class="text-gray-600 fw-bold d-flex flex-wrap">
            @foreach($permissions as $permission)
                <tr class="w-md-50 w-100 d-flex justify-content-between">
                    <td class="text-gray-800">{{$permission->display_name}}</td>
                    <td>
                        <label class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20 text-left">
                            <input class="form-check-input permission"
                                   {{isset($selectedPermissions[$permission->id]) == $permission->id ?'checked':''}} type="checkbox"
                                   value="{{$permission->id}}" name="permission_id[]"/>
                        </label>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ Form::submit(__('messages.common.save'),['class' => 'btn btn-primary me-2']) }}
        <a href="{{route('roles.index')}}" type="reset"
           class="btn btn-light btn-active-light-primary">{{__('messages.common.discard')}}</a>
    </div>
</div>
