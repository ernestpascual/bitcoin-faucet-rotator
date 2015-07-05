@extends('app')

@section('content')
    <h1 class="page-heading">Current Faucets</h1>
    @if (Session::has('success_message_delete'))
        <div class="alert alert-success">
            <span class="fa fa-thumbs-o-up fa-2x space-right"></span>
            {{ Session::get('success_message_delete') }}
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped bordered tablesorter" id="faucets_table">
            <thead>
                <th>Faucet Name</th>
                <th>Interval (minutes)</th>
                <th>Minimum Payout (satoshis)</th>
                <th>Maximum Payout (satoshis)</th>
                <th>Payment Processor/s</th>
                <th>Referral Program?</th>
                <th>Ref. Payout %</th>
                <th>Status</th>
            </thead>
            <tbody>
            @foreach($faucets as $faucet)
                <tr>
                    <td>
                        {!! link_to_route('faucets.show', $faucet->name, array($faucet->id)) !!}
                        @if(Auth::check())
                            <br><a class="btn btn-primary btn-width-small" href="/faucets/{{ $faucet->id}}/edit/">
                                <span class="button-font-small">Edit</span>
                            </a>

                            <a class="btn btn-primary btn-width-small" id="confirm" data-toggle="modal" href="#" data-target="#delFaucet{{ $faucet->id}}" data-id="{{ $faucet->id }}">
                                <span class="button-font-small">Delete</span>
                            </a>
                            <?php $id = $faucet->id ?>
                            @include('faucets/partials/_modal_delete_faucet')
                        @endif

                    </td>
                    <td>{{ $faucet->interval_minutes }}</td>
                    <td>{{ $faucet->min_payout }}</td>
                    <td>{{ $faucet->max_payout }}</td>
                    <td>
                        <ul class="faucet-payment-processors">
                            @foreach($faucet->payment_processors as $payment_processor)
                                <li>{!! link_to_route('payment_processors.show', $payment_processor->name, array($payment_processor->id)) !!}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $faucet->hasRefProgram() }}</td>
                    <td>{{ $faucet->ref_payout_percent }}</td>
                    <td>{{ $faucet->status() }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    @if(Auth::check())

    @endif

    <script src="/js/jquery.tablesorter.min.js"></script>
    <script src="/js/tablesorter_custom_code.js"></script>
@endsection