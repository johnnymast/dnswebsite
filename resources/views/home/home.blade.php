@extends('layout.layout')

@section('content')

    <div class="row">
        <div class="col-sm-12 blog-main">

            <br/>
            <div class="card">
                <div class="card-header">
                    DNS Tool
                </div>
                <div class="card-body">
                    <h4 class="card-title">DNS Tool</h4>
                    <div class="card-text">

                        @notification
                        <notification
                                level="{{ session()->get('flash_message_level') }}">{{ session()->get('flash_message') }}</notification>
                        @endnotification

                        @if ($errors->count())
                            @foreach ($errors->all() as $error)
                                <notification level="danger">{{ $error }}</notification>
                            @endforeach
                        @endif

                        {{ Form::open(['route' => ['lookup.lookup'], 'method' => 'post']) }}

                        <div class="input-group">
                            <span class="input-group-addon" id="basic-addon3">Domein:</span>
                            {{ Form::text('host', '', ['class' => 'form-control', 'placeholder' => 'Voer een domein in']) }}
                            <span class="input-group-btn">
                                {{ Form::submit('Go!', ['class' => 'btn btn-default']) }}
                            </span>
                        </div><!-- /input-group -->

                        <small><a target="_blank" class="github_link"
                                  href="https://github.com/johnnymast/redbox-dns"><img
                                        src="/img/github_16x16.png">https://github.com/johnnymast/redbox-dns</a>
                        </small>
                        @captcha()
                        {{ Form::close() }}
                    </div>
                </div>
            </div>


            @if (count($resolver) > 0)
                <?php $groepen = []; ?>
                <?php foreach ($resolver as $record): ?>
                    <?php if (isset($groepen[$record['type']]) == false) $groepen[$record['type']] = []; ?>
                    <?php $groepen[$record['type']][] = $record; ?>
                <?php endforeach; ?>
                @foreach($groepen as $record_type => $records)
                    @if (count($records) > 0)
                        <?php $headers = array_keys($records[0]); ?>
                        <div class="card">
                            <div class="card-header"><?=$record_type; ?></div>
                            <div class="card-body">
                                <table width="100%" class="table">
                                    <thead>
                                    <tr>
                                        @foreach($headers as $key => $val)
                                            <th><?=ucfirst($val); ?></th>
                                        @endforeach
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($records as $record)
                                        <tr>
                                            @foreach($record as $key => $val)
                                                <td>
                                                    @if (is_array($val))
                                                        {{ implode(',', $val) }}
                                                    @else
                                                        {{ print_r($val, true) }}
                                                    @endif
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
        </div>
    </div>
@endsection