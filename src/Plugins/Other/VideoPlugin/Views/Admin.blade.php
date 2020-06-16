@extends('admin.layout')

@section('main')
<div class="row">

<div class="col-md-12">

  <div class="box box-primary">
    <div class="box-header with-border">
      <h2 class="box-title">{{ $title_description??'' }}</h2>
    </div>

    <div class="box-body table-responsive no-padding box-primary">
     <table class="table table-hover table-bordered">
       <thead>
         <tr>
           <th>{{ trans('store_info.admin.field') }}</th>
           <th>{{ trans('store_info.admin.value') }}</th>
         </tr>
       </thead>
       <tbody>

        <tr>
            <th width="40%">{{ trans($pathPlugin.'::lang.VideoPluginConfigPath') }}</th>
            <td><a href="#" class="updateData_can_empty editable editable-click" 
                  data-name="VideoPluginConfigPath" 
                  data-type="text" 
                  data-pk="VideoPluginConfigPath" 
                  data-url="{{ route('admin_setting.update') }}" 
                  data-value="{{ sc_config('VideoPluginConfigPath') }}" 
                  data-title="{{ trans($pathPlugin.'::lang.VideoPluginConfigPath') }}">
            </a></td>
          </tr>

          <tr>
            <th width="40%">{{ trans($pathPlugin.'::lang.VideoPluginConfigFiles') }}</th>
            <td><a href="#" class="fied-required editable editable-click" 
                  data-name="VideoPluginConfigFiles" 
                  data-type="select" 
                  data-tpl="<select size=10></select>" 
                  data-pk="VideoPluginConfigFiles" 
                  data-source="{{ $jsonFiles }}" 
                  data-value="{{ sc_config('VideoPluginConfigFiles') }}" 
                  data-url="{{ route('admin_setting.update') }}" 
                  data-title="{{ trans($pathPlugin.'::lang.VideoPluginConfigFiles') }}"></a></td>
          </tr>
             

  </td>
</tr>


  </tbody>
     </table>
    </div>
  </div>
</div>

</div>
@endsection

@push('styles')
<!-- Ediable -->
<link rel="stylesheet" href="{{ asset('admin/plugin/bootstrap-editable.css')}}">
<style type="text/css">
  #maintain_content img{
    max-width: 100%;
  }
</style>
@endpush

@push('scripts')
<!-- Ediable -->
<script src="{{ asset('admin/plugin/bootstrap-editable.min.js')}}"></script>

<script type="text/javascript">
  // Editable
$(document).ready(function() {

      $.fn.editable.defaults.params = function (params) {
        params._token = "{{ csrf_token() }}";
        return params;
      };
        $('.fied-required').editable({
        validate: function(value) {
            if (value == '') {
                return '{{  trans('admin.not_empty') }}';
            }
        },
        success: function(data) {
          if(data.error == 0){
            alertJs('success', '{{ trans('admin.msg_change_success') }}');
          } else {
            alertJs('error', data.msg);
          }
      }
    });

    $('.updateData_can_empty').editable({
        success: function(data) {
          console.log(data);
          if(data.error == 0){
            alertJs('success', '{{ trans('admin.msg_change_success') }}');
          } else {
            alertJs('error', data.msg);
          }
      }
    });

});
</script>
@endpush
