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
        <a class="btn btn-primary pull-right addDomainModal" data-toggle="modal" data-target="#DomainModal" href="{{{ URL::to('domains/create') }}}"><i class="fa fa-pencil"></i> Add Domain</a>
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
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="menu1" data-toggle="dropdown">Actions<span class="caret"></span></button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                        <li role="presentation"><a  role="menuitem" tabindex="-1" data-toggle="modal" data-target="#DomainModal" href="{{{ URL::to('domain/'.$domain->domain_id.'/edit') }}}">Edit</a></li>
                      <li role="presentation"><a  role="menuitem" tabindex="-1" data-toggle="modal" data-target="#DomainModal" href="{{{ URL::to('domain/'.$domain->domain_id.'/theme/edit') }}}">Edit Theme</a></li>
                      <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Delete</a></li>
                    </ul>
                </div>
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
<div class="modal fade" id="DomainModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="frmAddProject"></div>
    </div>
</div>
@stop