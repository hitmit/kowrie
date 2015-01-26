@extends('domain::layouts.master')
@section('title')
Domains
@stop
@section('content')
<?php //echo("<pre>");print_r($domains);echo("</pre>"); ?>
<!--To display messages and error if any-->
@if(Session::has('message'))
<div class="alert alert-box alert-success" id="closeAlert">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    {{ Session::get('message') }}
</div>
<br/>
@endif

<div class="form-row">
    <div class="pull-right">
        <a class="btn btn-primary pull-right addProjectModal" data-toggle="modal" data-target="#ProjectModal" href="{{{ URL::to('domains/create') }}}"><i class="fa fa-pencil"></i> Add Project</a>
    </div>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>{{"Name"}}</th>
            <th>{{"Domain"}}</th>
            <th>{{"Id"}}</th>
            <th>{{"Active"}}</th>
            <th>{{"Default"}}</th>
            <th>{{"Operation"}}</th>
        </tr>
        </thead>

        <tbody>
        @if(count($domains)>0)
        @foreach($domains as $domain)
        <tr>
            <td>
                {{$domain->sitename}}
            </td>
            <td>
                {{$domain->subdomain}}
            </td>
            <td>
                {{$domain->domain_id}}
            </td>
            <td>
                {{($domain->valid) ? 'Yes' : 'No'}}
            </td>
            <td>
                {{($domain->is_default) ? 'Yes' : 'No'}}
            </td>
            <td>
                {{'Edit Delete'}}
            </td>
        </tr>
        @endforeach
        @else
        <tr><td colspan="10" class="text-center">{{"No Records Found"}}</td></tr>
        @endif
        </tbody>
    </table>
    <!--Pagination Starts-->
    {{$pagination}}
    <!--Pagination Ends-->
</div>

<!-- Modal -->
<div class="modal fade" id="ProjectModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="frmAddProject"></div>
    </div>
</div>
@stop