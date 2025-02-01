@extends('admin.layout.master')

@section('styles')
    <style>
        .min-table {
            width: 100%;
        }
        .min-table td {
            padding: 5px 0;
        }
        .min-table td:first-child {
            padding-right: 20px;
        }
    </style>
@endsection

@section('section')
    <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header-title">
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.home') }}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.feedback.index') }}">Заявки</a></li>
                            <li class="breadcrumb-item"><a href="javascript:">{{ $data->name }}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>{{ $data->phone }}</h5>
                    </div>
                    <div class="card-body">
                        <table class="min-table">
                            <thead>
                                <tr>
                                    <th style="width: 200px"></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Имя</td>
                                    <td>{{ $data->name }}</td>
                                </tr>
                                <tr>
                                    <td>Номер телефон</td>
                                    <td>{{ $data->phone ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <td>Тип</td>
                                    <td>{{ $data->typeLabel }}</td>
                                </tr>
                                @if($data->type == \App\Models\Feedback::TYPE_ORDER)
                                <tr>
                                    <td style="vertical-align: top">Товары</td>
                                    <td>
                                        <div style="white-space: pre-line">{{ $data->message ?? '-' }}</div>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td>Дата создание</td>
                                    <td>{{ $data->created_at->format('d.m.Y / H:i:s') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
