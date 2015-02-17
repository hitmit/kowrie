<?php echo("<pre>"); print_r($domain); echo("</pre>");
$http = ($domain->scheme == 'http') ? true : false;
$https = ($domain->scheme == 'https') ? true : false;
$active = false;
$inactive = false;
if($domain->valid) { $active = true; } else { $inactive = true; }
$default = ($domain->is_default ) ? true : false;
$domain_id = $domain->domain_id;
?>
  {{ Form::open(array('url'=>'domains/update', 'class'=>'frmCreateDomain')) }}
<div class="modal-header">
  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
  <h4 class="modal-title" id="myModalLabel">Edit Domain</h4>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-lg-12">
      <div class="form-group">
        {{ Form::label('Domain') }}
        {{ Form::text('subdomain', $domain->subdomain, array('class'=>'form-control', 'placeholder'=>'Domain', 'required' => 'required')) }}
        <p class="help-block">The allowed domain, using the full path.example.com format.</p>
        <p class="help-block">Leave off the http:// and the trailing slash and do not include any paths.</p>
        <p class="help-block">Must contain only dots, lowercase alphanumeric characters, dashes and a colon (if using alternative ports).</p>
      </div>
      <div class="form-group">
        {{ Form::label('Name') }}
        {{ Form::text('sitename', $domain->sitename, array('class'=>'form-control', 'required' => 'required', 'placeholder'=>'Name')) }}
        <p class="help-block">The human-readable name of this domain.</p>
      </div>
      <div class="form-group">
        {{ Form::label('Domain URL scheme') }}
        <p>{{ Form::radio('scheme', 'http', $http); }} http</p>
        <p>{{ Form::radio('scheme', 'https', $https ); }} https</p>
        <p class="help-block">The URL scheme for accessing this domain.</p>
      </div>
      <div class="form-group">
        {{ Form::label('Domain status') }}
        <p>{{ Form::radio('valid', '1', $active); }} Active</p>
        <p>{{ Form::radio('valid', '0', $inactive); }} Inactive</p>
        <p class="help-block">Must be set to "Active" for users to navigate to this domain.</p>
      </div>
      <div class="form-group">
        <p>{{ Form::checkbox('is_default', '1', $default); }} Default domain</p>
        <p class="help-block">If a URL request fails to match a domain record, the settings for this domain will be used.</p>
      </div>
      <div class="form-group">
      {{ Form::hidden('domain_id', $domain_id) }}
      </div>
    </div>
  </div>
</div>
<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
</div>
{{ Form::close() }}
