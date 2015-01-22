@extends('domain::layouts.master')
@section('title')
Domains
@stop
@section('content')
<?php //echo("<pre>");print_r($domains);echo("</pre>"); ?>
<div class="form-row">
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
    {{--$pagination--}}
    <!--Pagination Ends-->
</div>

@stop